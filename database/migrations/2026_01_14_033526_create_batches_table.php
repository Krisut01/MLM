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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_id')->unique(); // Unique batch identifier
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->foreignId('transaction_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->json('batch_data'); // Store QR code data
            $table->text('qr_code')->nullable(); // Base64 encoded QR image
            $table->string('blockchain_hash')->nullable(); // Optional blockchain storage
            $table->enum('status', ['active', 'verified', 'expired'])->default('active');
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();

            $table->index(['batch_id', 'status']);
            $table->index(['user_id', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
