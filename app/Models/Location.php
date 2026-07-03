<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'address', 'phone', 'latitude', 'longitude', 'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
