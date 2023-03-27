<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copoun extends Model
{
    use HasFactory;
    protected $table='copouns';
    protected $fillable = [
        'copoun_name',
        'copoun_value',
        'status'
    ];
}
