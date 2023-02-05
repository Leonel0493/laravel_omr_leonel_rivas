<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'evaluacion',
        'porcentaje',
        'id_materia_curso',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
