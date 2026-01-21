<?php

namespace App\Services;

use App\Models\BinaryTree;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Package;
use App\Models\FarmingLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Commission Service
 * 
 * Handles all commission calculations:
 * - Direct referral bonus (5%)
 * - Pairing bonus (binary matching)
 * - Leadership bonus (unilevel)
 * 
 * Based on LeafChain compensation plan from binaryextracted.md
 */
class CommissionService
{
    /**
     * Process royalty bonus
     *
     * From details/binaryextacted.md (fixed per package tier):
     * - Starter: $0.90
     * - Bronze: $2.40
     * - Gold: $7.20
     * - Mobile: $65.00
     *
     * NOTE: The document does not fully define who receives "royalty".
     * For now, we credit it to the immediate sponsor (same recipient as direct referral),
     * which matches the existing sponsor-based payout pipeline.
     *
     * @param int|null $sponsorId
     * @param Package $package
     * @param int $fromUserId
     * @return Transaction|null
     */
    public function processRoyaltyBonus($sponsorId, Package $package, $fromUserId)
    {
        if (!$sponsorId) {
            return null;
        }

        $amount = (float) ($package->royalty_bonus ?? 0);
        if ($amount <= 0) {
            return null;
        }

        $transaction = Transaction::create([
            'user_id' => $sponsorId,
            'type' => 'royalty_bonus',
            'amount' => $amount,
            'currency' => 'USD',
            'status' => 'completed',
            'description' => "Royalty bonus for {$package->name} package purchase",
            'metadata' => [
                'package_id' => $package->id,
                'package_name' => $package->name,
                'from_user' => $fromUserId,
            ],
        ]);

        Log::info('Royalty bonus credited', [
            'sponsor_id' => $sponsorId,
            'from_user' => $fromUserId,
            'package_id' => $package->id,
            'amount' => $amount,
        ]);

        return $transaction;
    }

    /**
     * Process direct referral bonus
     * 
     * When a user purchases a package, their sponsor gets a direct bonus.
     * 
     * From binaryextracted.md:
     * - Starter: $2.50 (5% of $50)
     * - Bronze: $5.00 (5% of $100)
     * - Gold: $16.00 (5% of $320)
     * - Mobile: $100.00 (5% of $2000)
     *
     * @param int $sponsorId
     * @param float $packagePrice
     * @return Transaction|null
     */
    public function processDirectReferralBonus($sponsorId, $packagePrice)
    {
        if (!$sponsorId) {
            return null;
        }
        
        // Per binaryextacted.md package table, this aligns to 5% of package price.
        $bonusAmount = $packagePrice * 0.05; // 5% direct bonus
        
        $transaction = Transaction::create([
            'user_id' => $sponsorId,
            'type' => 'referral_bonus',
            'amount' => $bonusAmount,
            'currency' => 'USD',
            'status' => 'completed',
            'description' => "Direct referral bonus (5% of $" . number_format($packagePrice, 2) . ")",
            'metadata' => [
                'package_price' => $packagePrice,
                'percentage' => 5
            ]
        ]);
        
        Log::info('Direct referral bonus credited', [
            'sponsor_id' => $sponsorId,
            'amount' => $bonusAmount,
            'package_price' => $packagePrice
        ]);
        
        return $transaction;
    }
    
    /**
     * Process pairing bonuses for uplines
     * 
     * When volumes are updated, calculate matched pairs and credit bonuses
     * 
     * From binaryextracted.md:
     * - Matched pairs = min(left_volume, right_volume)
     * - Safety net: Max pairs per day (12, 18, 36, or 96)
     * - Bonus per pair: $3.75, $7.20, $21.00, or $150.00
     *
     * @param int $userId
     * @return array
     */
    public function processPairingBonuses($userId)
    {
        $tree = BinaryTree::where('user_id', $userId)->first();
        $bonuses = [];
        
        if (!$tree) {
            return $bonuses;
        }
        
        // Traverse up the tree
        while ($tree && $tree->upline_id) {
            $uplineTree = BinaryTree::where('user_id', $tree->upline_id)->first();
            
            if (!$uplineTree) {
                break;
            }
            
            $uplineUser = User::find($uplineTree->user_id);
            
            // Get user's active package for bonus rate
            $farmingLog = FarmingLog::where('user_id', $uplineUser->id)
                ->where('status', 'active')
                ->first();
                
            if (!$farmingLog) {
                $tree = $uplineTree;
                continue;
            }
            
            $package = Package::find($farmingLog->package_id);
            
            // Calculate matched pairs
            $matchedPairs = min($uplineTree->left_volume, $uplineTree->right_volume);
            
            if ($matchedPairs <= 0) {
                $tree = $uplineTree;
                continue;
            }
            
            // Apply safety net (max pairs per day)
            $today = Carbon::today();
            if ($uplineTree->last_pair_date != $today) {
                $uplineTree->update([
                    'pairs_today' => 0,
                    'last_pair_date' => $today
                ]);
            }
            
            $remainingPairs = $package->max_daily_pairs - $uplineTree->pairs_today;
            $pairsToProcess = min($matchedPairs, $remainingPairs);
            
            if ($pairsToProcess > 0) {
                // Calculate bonus
                $bonusAmount = $pairsToProcess * $package->pairing_bonus;
                
                // Create transaction
                $transaction = Transaction::create([
                    'user_id' => $uplineUser->id,
                    'type' => 'pairing_bonus',
                    'amount' => $bonusAmount,
                    'currency' => 'USD',
                    'status' => 'completed',
                    'description' => "Pairing bonus: {$pairsToProcess} pairs matched",
                    'metadata' => [
                        'pairs' => $pairsToProcess,
                        'bonus_per_pair' => $package->pairing_bonus,
                        'from_user' => $userId,
                        'left_volume_before' => $uplineTree->left_volume,
                        'right_volume_before' => $uplineTree->right_volume
                    ]
                ]);
                
                // Flush matched pairs
                $uplineTree->decrement('left_volume', $pairsToProcess);
                $uplineTree->decrement('right_volume', $pairsToProcess);
                $uplineTree->increment('pairs_today', $pairsToProcess);
                
                $bonuses[] = [
                    'user_id' => $uplineUser->id,
                    'pairs' => $pairsToProcess,
                    'amount' => $bonusAmount,
                    'transaction_id' => $transaction->id
                ];
                
                Log::info('Pairing bonus credited', [
                    'upline_id' => $uplineUser->id,
                    'pairs' => $pairsToProcess,
                    'amount' => $bonusAmount,
                    'remaining_left' => $uplineTree->left_volume - $pairsToProcess,
                    'remaining_right' => $uplineTree->right_volume - $pairsToProcess
                ]);
            } else {
                Log::info('Pairing bonus skipped - safety net', [
                    'upline_id' => $uplineUser->id,
                    'pairs_today' => $uplineTree->pairs_today,
                    'max_daily_pairs' => $package->max_daily_pairs
                ]);
            }
            
            // Move to next upline
            $tree = $uplineTree;
        }
        
        return $bonuses;
    }
    
    /**
     * Process leadership bonus (unilevel)
     * 
     * From binaryextracted.md:
     * L1: 50% (1 direct required)
     * L2: 30% - 10% (2 directs required)
     * L3-L5: 5% (3 directs required)
     * L6-L10: 3% (5 directs required)
     * L11-L30: 2% (10 directs required)
     * L31-L50: 1% (15 directs required)
     * 
     * NOTE: This is a placeholder for future implementation
     *
     * @param int $userId
     * @param float $farmingReward
     * @return array
     */
    public function processLeadershipBonus($userId, $farmingReward)
    {
        // TODO: Implement leadership bonus system
        // This requires:
        // 1. Unilevel genealogy tracking
        // 2. Qualification checking (direct business, direct count)
        // 3. Percentage calculation based on level
        
        return [];
    }
    
    /**
     * Check if user qualifies for leadership bonus
     *
     * @param int $userId
     * @param int $level
     * @return bool
     */
    private function checkLeadershipQualification($userId, $level)
    {
        // TODO: Implement qualification checking
        // Requirements from binaryextracted.md:
        // - Direct business $3000 within 30 days
        // - Minimum number of directs based on level
        
        return false;
    }
}
