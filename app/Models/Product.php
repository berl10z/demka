<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'count',
        'category_id',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
