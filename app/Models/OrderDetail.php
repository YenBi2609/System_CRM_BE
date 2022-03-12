<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public function orders()
    {
        return $this->belongsTo(Order::class,'idOrder');
    }
    public function products()
    {
        return $this->belongsTo(Product::class,'idProduct');
    }
}
