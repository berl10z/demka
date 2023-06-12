<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function carts(){
        return $this->belongsToMany(Cart::class, 'order_carts');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getStatus() {
        return [
        0 => 'Новый',
        1 => 'Подтверждённый',
        2 => 'Отменённый',
        ][$this->status];
    }

}
