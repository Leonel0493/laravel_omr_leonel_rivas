<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias_Cursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_materia',
        'id_curso',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
