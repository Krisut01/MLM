<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            // Phase 1: MLM Packages
            PackageSeeder::class,           // ⭐ Creates MLM packages FIRST
            
            // Phase 2: Product Catalog
            ProductCategorySeeder::class,   // 🌿 Creates product categories
            ProductSeeder::class,           // 🌸 Creates 9 flower tea products
            PackageProductSeeder::class,    // 🔗 Links products to packages
            
            // Test Data
            TestUsersSeeder::class,         // Then creates test users with purchases
        ]);
    }
}