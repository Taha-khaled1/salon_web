<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class Department extends Model
{
    use HasFactory;
    protected $table='departments';
    //this to eager load articles
    protected $with = ['articles'];
    protected $fillable = [
        'department_fatherid',
        'department_title_ar',
        'department_title_en',
        'department_isactive',
        'department_isbranch',
        'department_showdate',
        'department_image',
        'categories'
    ];

    public function articles(){
        return $this->hasMany(Article::class,"departement_id","id");
    }
}
