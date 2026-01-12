<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinaryTree extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sponsor_id',
        'upline_id',
        'position',
        'left_volume',
        'right_volume',
        'left_carry',
        'right_carry',
        'pairs_today',
        'last_pair_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sponsor()
    {
        return $this->belongsTo(User::class, 'sponsor_id');
    }

    public function upline()
    {
        return $this->belongsTo(User::class, 'upline_id');
    }
}