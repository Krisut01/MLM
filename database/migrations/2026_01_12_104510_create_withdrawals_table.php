<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('amount', 15, 2);
            $table->decimal('fee', 8, 2)->default(0); // 5% withdrawal fee
            $table->decimal('final_amount', 15, 2); // Amount after fee
            $table->string('wallet_address')->nullable(); // For crypto withdrawals
            $table->enum('method', ['bank', 'usdt_trc20', 'usdt_erc20', 'leafx'])->default('bank');
            $table->enum('status', ['pending', 'processing', 'completed', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};