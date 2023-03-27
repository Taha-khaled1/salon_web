<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;
class Article extends Model
{
    use HasFactory;
    protected $table='articles';
    protected $guarded = [
       
    ];

    public function departement()
    {
        return $this->belongsTo(Department::class,'departement_id','id');
    }

    public function days()
    {
        return $this->hasMany(ArticleDay::class);
    }
}
