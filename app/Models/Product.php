<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'SKU',
        'listed_price',
        'selling_price',
        'quantity',
        'description',
        'slug',
    ];
    public function caetegories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class);
    }
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'product_coupons');
    }
}
