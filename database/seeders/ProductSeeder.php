<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * 9 Flower Tea Products from binaryextacted.md requirements
     * Using placeholder images until actual product photos are available
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Globe Amaranth Tea',
                'slug' => 'globe-amaranth-tea',
                'description' => 'Also known as Gomphrena globosa, is not just a vibrant flower but also a powerhouse of health benefits, especially when brewed as tea.',
                'health_benefits' => 'Rich in Antioxidants • Supports Eye Health • Detoxifies the body • Anti-inflammatory properties • Boost immunity • Promotes relaxation and better sleep',
                'price' => 15.00,
                'category_id' => 5, // Immunity Boost
                'image_url' => 'https://placehold.co/600x400/10b981/white?text=Globe+Amaranth+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '3-5 minutes',
                ],
            ],
            [
                'name' => 'Carnation Tea',
                'slug' => 'carnation-tea',
                'description' => 'Discover the soothing essence of Carnation tea, a blend that combines natural beauty and wellness benefits. Perfect for revitalizing your body and mind!',
                'health_benefits' => 'Maintain Beauty • Keep you young • Soothe the nerves • Remedy for motion sickness • Promotes metabolism • Clears the throat and nourishes the lungs • Help improve blood Circulation',
                'price' => 12.00,
                'category_id' => 4, // Beauty & Skin Glow
                'image_url' => 'https://placehold.co/600x400/ec4899/white?text=Carnation+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '3-5 minutes',
                ],
            ],
            [
                'name' => 'Marigold Tea',
                'slug' => 'marigold-tea',
                'description' => 'Marigold Tea helps reduce inflammation, supports digestion, and promotes healthy skin.',
                'health_benefits' => 'Packed with antioxidants • Promote wound and skin ulcer healing • Combat certain cancer cells • Have anti fungal and antimicrobial properties • Improve visual acuity • Improves skin health • Promotes better digestion',
                'price' => 14.00,
                'category_id' => 4, // Beauty & Skin Glow
                'image_url' => 'https://placehold.co/600x400/f59e0b/white?text=Marigold+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '4-6 minutes',
                ],
            ],
            [
                'name' => 'Rose Tea',
                'slug' => 'rose-tea',
                'description' => 'Indulge in the delicate charm of Rose Tea, a fragrant elixir that blends beauty with health. This soothing brew offers a wealth of benefits in every sip.',
                'health_benefits' => 'Soothe anxiety and reduce stress • May alleviate menstrual pain • Rich in antioxidants • Hydration and weight loss benefits • Aid digestion • Reducing inflammation • Invigorate the circulation of blood',
                'price' => 13.00,
                'category_id' => 4, // Beauty & Skin Glow
                'image_url' => 'https://placehold.co/600x400/f43f5e/white?text=Rose+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '3-5 minutes',
                ],
            ],
            [
                'name' => 'Jasmine Tea',
                'slug' => 'jasmine-tea',
                'description' => 'Enjoy the soothing power of Jasmine tea! It helps reduce inflammation, supports digestion, and promotes healthy, glowing skin.',
                'health_benefits' => 'Get naturally glowing skin • May reduce your risk of certain cancers • Improve your gut health • Keeps the cardiovascular cells healthy • Manage blood sugar levels • Promotes good oral health • Prevents insomnia • May aid weight loss • Provides healthy hair',
                'price' => 15.00,
                'category_id' => 4, // Beauty & Skin Glow
                'image_url' => 'https://placehold.co/600x400/8b5cf6/white?text=Jasmine+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '2-4 minutes',
                ],
            ],
            [
                'name' => 'Lily Tea',
                'slug' => 'lily-tea',
                'description' => 'Experience the gentle embrace of Lily tea, a soothing infusion crafted to nourish your body and calm your mind. Perfect for moments of relaxation and rejuvenation!',
                'health_benefits' => 'Firm the skin • Lower body heat • Moisturize the lung • Alleviate cough • Soothe the nerves • Cure for insomnia and dizziness',
                'price' => 16.00,
                'category_id' => 3, // Sleep & Relaxation
                'image_url' => 'https://placehold.co/600x400/06b6d4/white?text=Lily+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '3-5 minutes',
                ],
            ],
            [
                'name' => 'Lavender Tea',
                'slug' => 'lavender-tea',
                'description' => 'Lavender Flower Tea - your new bedtime ritual. Just one cup helps calm the mind, relax the body, and prepare you for deep sleep.',
                'health_benefits' => 'Reduce stress and anxiety • Improve sleep quality • Soothe digestion & bloating • Ease headaches and tension • Support overall wellness',
                'price' => 14.00,
                'category_id' => 3, // Sleep & Relaxation
                'image_url' => 'https://placehold.co/600x400/a855f7/white?text=Lavender+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '5-7 minutes',
                ],
            ],
            [
                'name' => 'Chrysanthemum Tea',
                'slug' => 'chrysanthemum-tea',
                'description' => 'Chrysanthemum tea - a refreshing herbal drink known for soothing tired eyes, calming the body, and helping you feel lighter and relaxed.',
                'health_benefits' => 'Relieve eye strain • Reduce stress • Cool down the body • Support throat & wellness',
                'price' => 13.00,
                'category_id' => 3, // Sleep & Relaxation
                'image_url' => 'https://placehold.co/600x400/eab308/white?text=Chrysanthemum+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '3-5 minutes',
                ],
            ],
            [
                'name' => 'Green Tea',
                'slug' => 'green-tea',
                'description' => 'Discover the timeless benefits of Green tea, a powerhouse of antioxidants and a ritual of health and balance. Every sip is a step toward vitality and rejuvenation.',
                'health_benefits' => 'Provides antioxidants • Boost metabolism • Reduces cancer risk • Improves brain function • Promotes heart health • Improves oral health • Enhances skin health • Aids Digestion',
                'price' => 10.00,
                'category_id' => 1, // 100% Purely Organic
                'image_url' => 'https://placehold.co/600x400/22c55e/white?text=Green+Tea&font=raleway',
                'is_active' => true,
                'metadata' => [
                    'weight' => '50g',
                    'serving_size' => '1-2 teaspoons',
                    'brew_time' => '2-3 minutes',
                ],
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
