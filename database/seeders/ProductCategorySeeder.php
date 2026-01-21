<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Categories from binaryextacted.md requirements
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => '100% Purely Organic',
                'slug' => 'organic',
                'description' => 'Pure, organic flower teas with no additives or preservatives',
                'icon' => '🌿',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Detox & Slimming',
                'slug' => 'detox-slimming',
                'description' => 'Natural detoxification and weight management support',
                'icon' => '🧘',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Sleep & Relaxation',
                'slug' => 'sleep-relaxation',
                'description' => 'Calming blends for better sleep and stress relief',
                'icon' => '😴',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Beauty & Skin Glow',
                'slug' => 'beauty-skin-glow',
                'description' => 'Radiant skin and natural beauty enhancement',
                'icon' => '✨',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Immunity Boost',
                'slug' => 'immunity-boost',
                'description' => 'Strengthen your immune system naturally',
                'icon' => '💪',
                'sort_order' => 5,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
