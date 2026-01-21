<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // Digital basket + farming allocation (from details/binaryextacted.md)
            $table->unsignedTinyInteger('buy_basket_percent')->default(0)->after('royalty_bonus'); // 20/20/15/10
            $table->decimal('buy_basket_cost', 10, 2)->default(0)->after('buy_basket_percent');   // $10 / $20 / $48 / $200
            $table->integer('basket_capacity')->default(0)->after('buy_basket_cost');             // 250 / 500 / 1600 / 10000
            $table->decimal('harvest_multiplier', 4, 2)->default(3.00)->after('basket_capacity'); // X3
            $table->decimal('farming_load_amount', 10, 2)->default(0)->after('harvest_multiplier'); // $15 / $30 / $112 / $800
            $table->decimal('leafx_tokens_loaded', 10, 2)->default(0)->after('farming_load_amount'); // 5 / 10 / 37.3 / 533.3
            $table->decimal('leafx_token_value', 6, 2)->default(3.00)->after('leafx_tokens_loaded'); // $3 per token
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn([
                'buy_basket_percent',
                'buy_basket_cost',
                'basket_capacity',
                'harvest_multiplier',
                'farming_load_amount',
                'leafx_tokens_loaded',
                'leafx_token_value',
            ]);
        });
    }
};

