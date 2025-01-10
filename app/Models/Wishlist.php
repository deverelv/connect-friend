<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable = ['user_id', 'liked_id', 'state'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likedUser()
    {
        return $this->belongsTo(User::class, 'liked_id');
    }
}
