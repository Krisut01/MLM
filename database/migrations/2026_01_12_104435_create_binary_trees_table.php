<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('binary_trees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('sponsor_id')->nullable()->constrained('users');
            $table->foreignId('upline_id')->nullable()->constrained('users');
            $table->enum('position', ['left', 'right']);
            $table->integer('left_volume')->default(0);
            $table->integer('right_volume')->default(0);
            $table->integer('left_carry')->default(0);
            $table->integer('right_carry')->default(0);
            $table->integer('pairs_today')->default(0);
            $table->date('last_pair_date')->nullable();
            $table->timestamps();

            $table->unique(['upline_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('binary_trees');
    }
};