<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LandingPageSetting;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        LandingPageSetting::firstOrCreate(
            ['id' => 1],
            [
                'hero_title' => 'LeafChain',
                'hero_subtitle' => 'A blockchain-powered botanical marketplace. Scan, verify, and earn rewards backed by real Flower Tea.',
                'rwa_title' => 'Tea as a Real World Asset (RWA)',
                'rwa_body' => "Turn physical tea products and tea operations into tokenised, trackable, and investable assets that support growth, transparency and funding.\n\nConsumers verify origin. Growers get paid fairly. The community earns LeafX rewards for participation.",
                'cta_text' => 'Create your account',
                'cta_link' => '/register',
            ]
        );
    }
}

