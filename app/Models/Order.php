<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'status',
    ];

    public function moneyTotal(): string
    {
        return number_format($this->total, 0, '', ' ');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
