<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Correct package prices and distribution to match ExtractedTechnical.md specifications
     */
    public function up(): void
    {
        // Correct package prices and distribution values to match technical document

        // Starter Package: $25 (was $50)
        DB::table('packages')->where('name', 'Starter')->update([
            'price' => 25.00,
            'buy_basket_cost' => 5.00,    // 20% of $25
            'farming_load_amount' => 7.50, // 30% of $25
            'leafx_tokens_loaded' => 2.50,  // $7.50 / $3 per token
        ]);

        // Bronze Package: $50 (was $100)
        DB::table('packages')->where('name', 'Bronze')->update([
            'price' => 50.00,
            'buy_basket_cost' => 10.00,   // 20% of $50
            'farming_load_amount' => 15.00, // 30% of $50
            'leafx_tokens_loaded' => 5.00,   // $15 / $3 per token
        ]);

        // Gold Package: $160 (was $320)
        DB::table('packages')->where('name', 'Gold')->update([
            'price' => 160.00,
            'buy_basket_percent' => 30,       // Document shows higher percentage for Gold
            'buy_basket_cost' => 48.00,       // 30% of $160
            'farming_load_amount' => 112.00,  // 70% of $160 (document shows 112)
            'leafx_tokens_loaded' => 37.33,   // $112 / $3 per token
        ]);

        // Mobile Package: $1000 (was $2000)
        DB::table('packages')->where('name', 'Mobile')->update([
            'price' => 1000.00,
            'buy_basket_cost' => 200.00,      // 20% of $1000
            'farming_load_amount' => 800.00,  // 80% of $1000 (document shows 800)
            'leafx_tokens_loaded' => 266.67,  // $800 / $3 per token
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to previous (incorrect) values
        DB::table('packages')->where('name', 'Starter')->update([
            'price' => 50.00,
            'buy_basket_cost' => 10.00,
            'farming_load_amount' => 15.00,
            'leafx_tokens_loaded' => 5.00,
        ]);

        DB::table('packages')->where('name', 'Bronze')->update([
            'price' => 100.00,
            'buy_basket_cost' => 20.00,
            'farming_load_amount' => 30.00,
            'leafx_tokens_loaded' => 10.00,
        ]);

        DB::table('packages')->where('name', 'Gold')->update([
            'price' => 320.00,
            'buy_basket_percent' => 15,
            'buy_basket_cost' => 48.00,
            'farming_load_amount' => 112.00,
            'leafx_tokens_loaded' => 37.30,
        ]);

        DB::table('packages')->where('name', 'Mobile')->update([
            'price' => 2000.00,
            'buy_basket_cost' => 200.00,
            'farming_load_amount' => 800.00,
            'leafx_tokens_loaded' => 533.30,
        ]);
    }
};
