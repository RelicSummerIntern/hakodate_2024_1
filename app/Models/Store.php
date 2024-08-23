<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'storesname', 'address', 'phone_number', 'opentime', 'closetime',
        'homepage_url', 'genre', 'photo'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'stores_tags', 'stores_id', 'tags_id');
    }

    public function closeddays()
    {
        return $this->belongsToMany(Closedday::class, 'stores_closeddays', 'stores_id', 'closeddays_id');
    }
}
