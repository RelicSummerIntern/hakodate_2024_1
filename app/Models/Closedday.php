<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Closedday extends Model
{
    use HasFactory;

    protected $fillable = ['week'];

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
