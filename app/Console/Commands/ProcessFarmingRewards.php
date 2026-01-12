<?php

namespace App\Console\Commands;

use App\Services\FarmingService;
use Illuminate\Console\Command;

class ProcessFarmingRewards extends Command
{
    protected $signature = 'farming:rewards {--date=? : Process rewards for specific date}';
    protected $description = 'Process daily farming rewards for active packages';

    public function handle()
    {
        $this->info("🌱 Processing daily farming rewards...");
        $this->newLine();

        // ⭐ NEW: Use FarmingService for all logic
        $farmingService = new FarmingService();
        $result = $farmingService->processDailyRewards();

        // Display results
        $this->info("✅ Processing complete!");
        $this->newLine();
        
        $this->line("📊 Summary:");
        $this->table(
            ['Metric', 'Value'],
            [
                ['Packages Processed', $result['processed']],
                ['Total Rewards', '$' . number_format($result['total_rewards'], 2)],
                ['Users Capped (3X)', $result['capped']],
                ['Users Completed (500 days)', $result['completed']]
            ]
        );

        if ($result['processed'] > 0) {
            $this->info("💰 Total distributed: $" . number_format($result['total_rewards'], 2) . " LEAFX");
        } else {
            $this->warn("⚠️  No active farming packages found");
        }

        return Command::SUCCESS;
    }
}