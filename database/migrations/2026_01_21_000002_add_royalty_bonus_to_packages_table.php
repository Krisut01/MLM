<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            // From details/binaryextacted.md (fixed per package tier)
            $table->decimal('royalty_bonus', 10, 2)->default(0)->after('pairing_bonus');
        });
    }

    public function down(): void
    {
        Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('royalty_bonus');
        });
    }
};

