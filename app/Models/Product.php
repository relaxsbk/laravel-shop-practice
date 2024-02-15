<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'rating',
        'provider_id'
    ];

    public function money(): string
    {
        return number_format($this->price, 0, '', ' ');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
