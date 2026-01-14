<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Globe Amaranth, Carnation, Marigold, etc.
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('health_benefits'); // Health benefits from requirements
            $table->decimal('price', 10, 2); // Individual product pricing
            $table->string('image_url')->nullable(); // Placeholder URL
            $table->foreignId('category_id')->nullable()->constrained('product_categories')->onDelete('set null');
            $table->boolean('is_active')->default(true);
            $table->json('metadata')->nullable(); // Extra data (weight, quantity, etc.)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
