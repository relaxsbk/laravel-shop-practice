<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'model',
        'brand_id',
        'description',
        'img',
        'price',
        'quantity',
        'rating',
        'provider_id',
        'is_public'
    ];

    public function money(): string
    {
        return number_format($this->price, 0, '', ' ');
    }

    public function reviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function characteristics(): HasOne
    {
        return $this->hasOne(Characteristic::class);
    }

    public function category_characteristics(): HasMany
    {
        return $this->hasMany(Category_Characteristic::class);
    }

    public function product_images(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
