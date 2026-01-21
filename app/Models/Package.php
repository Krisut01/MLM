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
        'royalty_bonus',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'pairing_bonus' => 'decimal:2',
        'royalty_bonus' => 'decimal:2',
    ];

    public function farmingLogs()
    {
        return $this->hasMany(FarmingLog::class);
    }

    /**
     * Get the products included in this package
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'package_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}