<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'description',
        'discount_values',
        'time_used',
        'max_usage',
        'start_date',
        'end_date'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_coupons');
    }
}
