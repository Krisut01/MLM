<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farming_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('package_id')->constrained();
            $table->decimal('daily_rate', 5, 4)->default(0.0050); // 0.50%
            $table->integer('days_run')->default(0);
            $table->decimal('total_earned', 15, 2)->default(0);
            $table->decimal('package_value', 10, 2);
            $table->enum('status', ['active', 'completed', 'paused'])->default('active');
            $table->timestamp('last_reward_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farming_logs');
    }
};