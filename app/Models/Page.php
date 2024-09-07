<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'banner_url',
        'alt'
    ];
    protected $table = 'pages';
    public function banner(){
        return $this->belongToMany(Banner::class);
    }
}
