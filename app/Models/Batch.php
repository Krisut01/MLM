<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_id',
        'package_id',
        'transaction_id',
        'user_id',
        'batch_data',
        'qr_code',
        'blockchain_hash',
        'status',
        'verified_at'
    ];

    protected $casts = [
        'batch_data' => 'array',
        'verified_at' => 'datetime'
    ];

    // Relationships
    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods
    public function getBatchDataAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setBatchDataAttribute($value)
    {
        $this->attributes['batch_data'] = json_encode($value);
    }

    public function markAsVerified()
    {
        $this->update([
            'status' => 'verified',
            'verified_at' => now()
        ]);
    }

    public function isVerified()
    {
        return $this->status === 'verified' && $this->verified_at !== null;
    }
}
