<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmingLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'package_id',
        'daily_rate',
        'days_run',
        'total_earned',
        'package_value',
        'status',
        'last_reward_at',
    ];

    protected $casts = [
        'daily_rate' => 'decimal:4',
        'total_earned' => 'decimal:2',
        'package_value' => 'decimal:2',
        'last_reward_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}