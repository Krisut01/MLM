<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Links flower tea products to MLM packages
     * Each package includes different quantities and varieties of teas
     */
    public function run(): void
    {
        // Get all packages and products
        $starter = Package::where('name', 'Starter')->first();
        $bronze = Package::where('name', 'Bronze')->first();
        $gold = Package::where('name', 'Gold')->first();
        $mobile = Package::where('name', 'Mobile')->first();

        $globeAmaranth = Product::where('slug', 'globe-amaranth-tea')->first();
        $carnation = Product::where('slug', 'carnation-tea')->first();
        $marigold = Product::where('slug', 'marigold-tea')->first();
        $rose = Product::where('slug', 'rose-tea')->first();
        $jasmine = Product::where('slug', 'jasmine-tea')->first();
        $lily = Product::where('slug', 'lily-tea')->first();
        $lavender = Product::where('slug', 'lavender-tea')->first();
        $chrysanthemum = Product::where('slug', 'chrysanthemum-tea')->first();
        $greenTea = Product::where('slug', 'green-tea')->first();

        // 🌟 STARTER PACKAGE ($50) - 17 pcs assorted teas
        // Basic wellness collection
        $starter->products()->attach([
            $globeAmaranth->id => ['quantity' => 2],
            $carnation->id => ['quantity' => 2],
            $rose->id => ['quantity' => 3],
            $greenTea->id => ['quantity' => 4],
            $chrysanthemum->id => ['quantity' => 2],
            $lavender->id => ['quantity' => 2],
            $jasmine->id => ['quantity' => 2],
        ]);

        // 🥉 BRONZE PACKAGE ($100) - 34 pcs assorted teas
        // Enhanced wellness collection
        $bronze->products()->attach([
            $globeAmaranth->id => ['quantity' => 4],
            $carnation->id => ['quantity' => 4],
            $marigold->id => ['quantity' => 4],
            $rose->id => ['quantity' => 5],
            $jasmine->id => ['quantity' => 4],
            $lily->id => ['quantity' => 3],
            $lavender->id => ['quantity' => 4],
            $chrysanthemum->id => ['quantity' => 3],
            $greenTea->id => ['quantity' => 3],
        ]);

        // 🥇 GOLD PACKAGE ($320) - 120 pcs premium collection
        // Complete wellness package
        $gold->products()->attach([
            $globeAmaranth->id => ['quantity' => 15],
            $carnation->id => ['quantity' => 15],
            $marigold->id => ['quantity' => 15],
            $rose->id => ['quantity' => 15],
            $jasmine->id => ['quantity' => 15],
            $lily->id => ['quantity' => 10],
            $lavender->id => ['quantity' => 15],
            $chrysanthemum->id => ['quantity' => 10],
            $greenTea->id => ['quantity' => 10],
        ]);

        // 📱 MOBILE PACKAGE ($2000) - 500 pcs deluxe collection
        // Ultimate business starter package
        $mobile->products()->attach([
            $globeAmaranth->id => ['quantity' => 60],
            $carnation->id => ['quantity' => 60],
            $marigold->id => ['quantity' => 60],
            $rose->id => ['quantity' => 60],
            $jasmine->id => ['quantity' => 60],
            $lily->id => ['quantity' => 50],
            $lavender->id => ['quantity' => 60],
            $chrysanthemum->id => ['quantity' => 50],
            $greenTea->id => ['quantity' => 40],
        ]);
    }
}
