<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
    ];
    protected $table = 'social_medias';
    /**
     * The users that belong to the social media provider.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_social_medias')
                    ->withPivot('link')
                    ->withTimestamps();
    }
}
