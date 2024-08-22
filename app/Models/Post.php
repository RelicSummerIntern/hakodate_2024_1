<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['storesname', 'address', 'author_name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



