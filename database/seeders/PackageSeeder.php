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
                'price' => 50.00,
                'points' => 1,
                'max_daily_pairs' => 12,
                'pairing_bonus' => 3.75,
                'royalty_bonus' => 0.90,
                'buy_basket_percent' => 20,
                'buy_basket_cost' => 10.00,
                'basket_capacity' => 250,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 15.00,
                'leafx_tokens_loaded' => 5.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bronze',
                'price' => 100.00,
                'points' => 2,
                'max_daily_pairs' => 18,
                'pairing_bonus' => 7.20,
                'royalty_bonus' => 2.40,
                'buy_basket_percent' => 20,
                'buy_basket_cost' => 20.00,
                'basket_capacity' => 500,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 30.00,
                'leafx_tokens_loaded' => 10.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold',
                'price' => 320.00,
                'points' => 6,
                'max_daily_pairs' => 36,
                'pairing_bonus' => 21.00,
                'royalty_bonus' => 7.20,
                'buy_basket_percent' => 15,
                'buy_basket_cost' => 48.00,
                'basket_capacity' => 1600,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 112.00,
                'leafx_tokens_loaded' => 37.30,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile',
                'price' => 2000.00,
                'points' => 62,
                'max_daily_pairs' => 96,
                'pairing_bonus' => 150.00,
                'royalty_bonus' => 65.00,
                'buy_basket_percent' => 10,
                'buy_basket_cost' => 200.00,
                'basket_capacity' => 10000,
                'harvest_multiplier' => 3.00,
                'farming_load_amount' => 800.00,
                'leafx_tokens_loaded' => 533.30,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}