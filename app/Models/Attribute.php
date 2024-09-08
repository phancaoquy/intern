<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['atr_name'];
    protected $table = 'attributes';
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'atr_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_attributes');
    }
}
