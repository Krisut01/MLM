<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Align package points with details/binaryextacted.md:
        // Starter = 1, Bronze = 2, Gold = 6, Mobile = 62
        DB::table('packages')->where('name', 'Starter')->update(['points' => 1]);
        DB::table('packages')->where('name', 'Bronze')->update(['points' => 2]);
        DB::table('packages')->where('name', 'Gold')->update(['points' => 6]);
        DB::table('packages')->where('name', 'Mobile')->update(['points' => 62]);
    }

    public function down(): void
    {
        // Best-effort rollback to previous seeded values in this repo.
        DB::table('packages')->where('name', 'Starter')->update(['points' => 1]);
        DB::table('packages')->where('name', 'Bronze')->update(['points' => 3]);
        DB::table('packages')->where('name', 'Gold')->update(['points' => 10]);
        DB::table('packages')->where('name', 'Mobile')->update(['points' => 62]);
    }
};

