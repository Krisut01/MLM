<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image_path',
        'rwa_title',
        'rwa_body',
        'rwa_image_path',
        'cta_text',
        'cta_link',
        'updated_by',
    ];

    protected $casts = [
        'updated_by' => 'integer',
    ];
}

