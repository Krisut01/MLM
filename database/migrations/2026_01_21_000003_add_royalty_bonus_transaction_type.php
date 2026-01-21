<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // transactions.type is an ENUM in MySQL. We need to add 'royalty_bonus'.
        // For SQLite, Laravel typically stores enum as TEXT (no-op).
        if (!Schema::hasTable('transactions')) {
            return;
        }

        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            DB::statement(
                "ALTER TABLE `transactions` MODIFY `type` ENUM(" .
                "'purchase'," .
                "'referral_bonus'," .
                "'royalty_bonus'," .
                "'pairing_bonus'," .
                "'leadership_bonus'," .
                "'farming_reward'," .
                "'withdrawal'" .
                ") NOT NULL"
            );
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('transactions')) {
            return;
        }

        $driver = DB::getDriverName();

        if ($driver === 'mysql') {
            // Remove 'royalty_bonus' from ENUM list.
            DB::statement(
                "ALTER TABLE `transactions` MODIFY `type` ENUM(" .
                "'purchase'," .
                "'referral_bonus'," .
                "'pairing_bonus'," .
                "'leadership_bonus'," .
                "'farming_reward'," .
                "'withdrawal'" .
                ") NOT NULL"
            );
        }
    }
};

