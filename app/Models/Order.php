<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable = [
       'user_id',
       'user_name',
       'user_email',
       'user_address',
       'user_mobile',
       'type',
       'status',
       'service_name',
       'service_start_date',
       'service_end_date',
       'service_period',
       'service_price',
       'service_description',
       'quantity',
        'total'
    ];
}
