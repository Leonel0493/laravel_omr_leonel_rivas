<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_grado_academico',
        'seccion',
        'anio',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
