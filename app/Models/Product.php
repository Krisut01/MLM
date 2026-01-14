<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'health_benefits',
        'price',
        'image_url',
        'category_id',
        'is_active',
        'metadata',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
        'metadata' => 'array',
    ];

    /**
     * Get the category this product belongs to
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * Get the packages that include this product
     */
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'package_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Get the batches for this product
     */
    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    /**
     * Scope to get only active products
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
