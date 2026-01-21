<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title')->default('LeafChain');
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image_path')->nullable();
            $table->string('rwa_title')->default('Tea as a Real World Asset (RWA)');
            $table->longText('rwa_body')->nullable();
            $table->string('rwa_image_path')->nullable();
            $table->string('cta_text')->default('Get Started');
            $table->string('cta_link')->default('/register');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_page_settings');
    }
};

