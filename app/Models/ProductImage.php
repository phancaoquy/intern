<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id",
        "image_url",
        "is_thumb",
        "display_order"
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
