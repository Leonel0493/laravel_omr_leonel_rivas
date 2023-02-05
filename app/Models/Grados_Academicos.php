<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grados_Academicos extends Model
{
    use HasFactory;
    protected $fillable = [
        'grado',
        'seccion',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
