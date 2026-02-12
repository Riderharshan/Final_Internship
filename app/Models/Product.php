<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'image', 'bike_brand', 'category_id', 'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function ratings()
{
    return $this->hasMany(Rating::class);
}

// Product.php

public function reviews()
{
    return $this->hasMany(Review::class);
}

public function averageRating()
{
    return round($this->reviews()->avg('rating'), 1);
}
}
