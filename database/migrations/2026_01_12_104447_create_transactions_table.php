<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('type', ['purchase', 'referral_bonus', 'pairing_bonus', 'leadership_bonus', 'farming_reward', 'withdrawal']);
            $table->decimal('amount', 15, 2);
            $table->string('currency')->default('USD'); // USD, LEAFX, USDT
            $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
            $table->text('description')->nullable();
            $table->json('metadata')->nullable(); // Store additional data like tx_hash for blockchain
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};