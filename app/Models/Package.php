<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'points',
        'max_daily_pairs',
        'pairing_bonus',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'pairing_bonus' => 'decimal:2',
    ];

    public function farmingLogs()
    {
        return $this->hasMany(FarmingLog::class);
    }
}