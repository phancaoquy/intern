<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'social_media_id',
        'link',
    ];
    protected $table = 'user_social_medias';
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
