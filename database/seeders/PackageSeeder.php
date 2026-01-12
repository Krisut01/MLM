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
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bronze',
                'price' => 100.00,
                'points' => 3,
                'max_daily_pairs' => 18,
                'pairing_bonus' => 7.20,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gold',
                'price' => 320.00,
                'points' => 10,
                'max_daily_pairs' => 36,
                'pairing_bonus' => 21.00,
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
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}