<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartOrder extends Model
{
    use HasFactory;
    protected $table='cart_orders';

    protected $fillable=[
        'user_id',
        'user_name',
        'user_email',
        'user_address',
        'user_mobile',
        'product_name',
        'quantity',
        'price',
        'total',
        'status'
    ];
}
