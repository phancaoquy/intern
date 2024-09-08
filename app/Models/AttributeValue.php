<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'atr_id',
        'atr_value'
    ];

    public function attribute()
    {
        return $this->belongsTo(AttributeValue::class, 'atr_id');
    }
    public function variants()
    {
        return $this->hasMany(Variant::class, 'attribute_values_id');
    }
}
