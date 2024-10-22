<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Characteristic extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'characteristic_name'
    ];

    protected $casts = [
        'characteristic_name' => 'string'
    ];

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
