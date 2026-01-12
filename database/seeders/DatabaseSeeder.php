<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PackageSeeder::class,     // ⭐ Creates packages FIRST
            TestUsersSeeder::class,  // Then creates test users with purchases
        ]);
    }
}