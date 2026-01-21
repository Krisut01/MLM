<?php

namespace App\Services;

use App\Models\FarmingLog;
use App\Models\Transaction;
use App\Services\CommissionService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

/**
 * Farming Service
 * 
 * Handles farming rewards processing:
 * - Daily reward calculation (0.50% daily)
 * - 3X cap enforcement
 * - 500-day limit
 * 
 * From binaryextracted.md:
 * - Daily rate: 0.50%
 * - Duration: 500 days
 * - Cap: 3X package value
 * - Recharge required after cap
 */
class FarmingService
{
    /**
     * Process daily farming rewards for all active packages
     * 
     * Should be run daily via cron job:
     * php artisan schedule:run
     *
     * @return array
     */
    public function processDailyRewards()
    {
        $today = Carbon::today();
        
        $activeLogs = FarmingLog::where('status', 'active')
            ->where(function($query) use ($today) {
                $query->whereNull('last_reward_at')
                      ->orWhereDate('last_reward_at', '<', $today);
            })
            ->get();
        
        $processed = 0;
        $totalRewards = 0;
        $cappedUsers = 0;
        $completedUsers = 0;
        
        foreach ($activeLogs as $log) {
            $result = $this->processSingleFarmingLog($log, $today);
            
            if ($result['success']) {
                $processed++;
                $totalRewards += $result['reward'];
                
                if ($result['status'] === 'capped') {
                    $cappedUsers++;
                } elseif ($result['status'] === 'completed') {
                    $completedUsers++;
                }
            }
        }
        
        Log::info('Daily farming rewards processed', [
            'date' => $today->format('Y-m-d'),
            'processed' => $processed,
            'total_rewards' => $totalRewards,
            'capped' => $cappedUsers,
            'completed' => $completedUsers
        ]);
        
        return [
            'processed' => $processed,
            'total_rewards' => $totalRewards,
            'capped' => $cappedUsers,
            'completed' => $completedUsers
        ];
    }
    
    /**
     * Process a single farming log
     *
     * @param FarmingLog $log
     * @param Carbon $date
     * @return array
     */
    private function processSingleFarmingLog(FarmingLog $log, Carbon $date)
    {
        $commissionService = new CommissionService();

        // Calculate daily reward (0.50%)
        $dailyReward = $log->package_value * $log->daily_rate;
        
        // Check 3X cap
        $capLimit = $log->package_value * 3;
        $newTotal = $log->total_earned + $dailyReward;
        
        if ($newTotal >= $capLimit) {
            // Cap reached - mark as completed
            $finalReward = $capLimit - $log->total_earned;
            
            $log->update([
                'total_earned' => $capLimit,
                'days_run' => $log->days_run + 1,
                'status' => 'completed',
                'last_reward_at' => $date
            ]);
            
            if ($finalReward > 0) {
                Transaction::create([
                    'user_id' => $log->user_id,
                    'type' => 'farming_reward',
                    'amount' => $finalReward,
                    'currency' => 'LEAFX',
                    'status' => 'completed',
                    'description' => "Final farming reward - 3X cap reached",
                    'metadata' => [
                        'farming_log_id' => $log->id,
                        'package_id' => $log->package_id,
                        'day' => $log->days_run,
                        'cap_reached' => true,
                        'cap_limit' => $capLimit
                    ]
                ]);

                // Leadership bonus on final reward
                $commissionService->processLeadershipBonus($log->user_id, $finalReward);
            }
            
            Log::info('Farming cap reached', [
                'user_id' => $log->user_id,
                'package_id' => $log->package_id,
                'total_earned' => $capLimit,
                'days_run' => $log->days_run
            ]);
            
            return [
                'success' => true,
                'reward' => $finalReward,
                'status' => 'capped'
            ];
        } else {
            // Normal reward
            $log->update([
                'total_earned' => $newTotal,
                'days_run' => $log->days_run + 1,
                'last_reward_at' => $date
            ]);
            
            Transaction::create([
                'user_id' => $log->user_id,
                'type' => 'farming_reward',
                'amount' => $dailyReward,
                'currency' => 'LEAFX',
                'status' => 'completed',
                'description' => "Daily farming reward - Day {$log->days_run}",
                'metadata' => [
                    'farming_log_id' => $log->id,
                    'package_id' => $log->package_id,
                    'day' => $log->days_run,
                    'daily_rate' => $log->daily_rate,
                    'remaining_to_cap' => $capLimit - $newTotal
                ]
            ]);

            // Leadership bonus on daily reward
            $commissionService->processLeadershipBonus($log->user_id, $dailyReward);
            
            // Check 500-day limit
            if ($log->days_run >= 500) {
                $log->update(['status' => 'completed']);
                
                Log::info('Farming 500-day limit reached', [
                    'user_id' => $log->user_id,
                    'package_id' => $log->package_id,
                    'total_earned' => $newTotal
                ]);
                
                return [
                    'success' => true,
                    'reward' => $dailyReward,
                    'status' => 'completed'
                ];
            }
            
            return [
                'success' => true,
                'reward' => $dailyReward,
                'status' => 'active'
            ];
        }
    }
    
    /**
     * Get farming statistics for a user
     *
     * @param int $userId
     * @return array
     */
    public function getUserFarmingStats($userId)
    {
        $farmingLogs = FarmingLog::where('user_id', $userId)->get();
        
        $stats = [
            'active_count' => 0,
            'completed_count' => 0,
            'total_earned' => 0,
            'total_invested' => 0,
            'active_packages' => []
        ];
        
        foreach ($farmingLogs as $log) {
            if ($log->status === 'active') {
                $stats['active_count']++;
                $stats['active_packages'][] = [
                    'package_id' => $log->package_id,
                    'days_run' => $log->days_run,
                    'total_earned' => $log->total_earned,
                    'package_value' => $log->package_value,
                    'cap_limit' => $log->package_value * 3,
                    'progress_percentage' => ($log->total_earned / ($log->package_value * 3)) * 100
                ];
            } else {
                $stats['completed_count']++;
            }
            
            $stats['total_earned'] += $log->total_earned;
            $stats['total_invested'] += $log->package_value;
        }
        
        $stats['roi_percentage'] = $stats['total_invested'] > 0
            ? ($stats['total_earned'] / $stats['total_invested']) * 100
            : 0;
        
        return $stats;
    }
}
