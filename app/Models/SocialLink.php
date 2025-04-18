<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    protected $fillable = ['user_id', 'platform', 'url', 'username'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
