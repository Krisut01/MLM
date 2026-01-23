<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'name' => 'Starter',
                'price' => 25.00,  // Corrected from technical document
                'points' => 1,
                'max_daily_pairs' => 12,
                'pairing_bonus' => 3.75,
                'royalty_bonus' => 0.90,
                'buy_basket_percent' => 20,
                'buy_basket_cost' => 5.00,     // 20% of $25
                'basket_capacity' => 250,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 7.50,  // 30% of $25
                'leafx_tokens_loaded' => 2.50,  // $7.50 / $3 per token
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bronze',
                'price' => 50.00,  // Corrected from technical document
                'points' => 2,
                'max_daily_pairs' => 18,
                'pairing_bonus' => 7.20,
                'royalty_bonus' => 2.40,
                'buy_basket_percent' => 20,
                'buy_basket_cost' => 10.00,    // 20% of $50
                'basket_capacity' => 500,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 15.00, // 30% of $50
                'leafx_tokens_loaded' => 5.00,  // $15 / $3 per token
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold',
                'price' => 160.00, // Corrected from technical document
                'points' => 6,
                'max_daily_pairs' => 36,
                'pairing_bonus' => 21.00,
                'royalty_bonus' => 7.20,
                'buy_basket_percent' => 30,      // Higher percentage for Gold
                'buy_basket_cost' => 48.00,      // 30% of $160
                'basket_capacity' => 1600,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 112.00, // 70% of $160 (as per document)
                'leafx_tokens_loaded' => 37.33,  // $112 / $3 per token
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile',
                'price' => 1000.00, // Corrected from technical document
                'points' => 62,
                'max_daily_pairs' => 96,
                'pairing_bonus' => 150.00,
                'royalty_bonus' => 65.00,
                'buy_basket_percent' => 20,
                'buy_basket_cost' => 200.00,     // 20% of $1000
                'basket_capacity' => 10000,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 800.00, // 80% of $1000 (as per document)
                'leafx_tokens_loaded' => 266.67, // $800 / $3 per token
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}