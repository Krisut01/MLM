<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Starter, Bronze, Gold, Mobile
            $table->decimal('price', 10, 2); // 50.00, 100.00, 320.00, 2000.00
            $table->integer('points'); // 1, 3, 10, 62
            $table->integer('max_daily_pairs'); // 12, 18, 36, 96
            $table->decimal('pairing_bonus', 8, 2); // 3.75, 7.20, 21.00, 150.00
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};