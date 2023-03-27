<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable = [
        'user_id',
        'product_id',
        'qty',
        'image',
        'price',
        
    ];

    public function product(){
        return $this->hasOne(Article::class,"product_id","id");
    }

    // public function articles(){
    //     return $this->hasMany(Article::class,"departement_id","id");
    // }

}
