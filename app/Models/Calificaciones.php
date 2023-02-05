<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'calificacion',
        'id_evaluacion',
        'id_alumno',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
