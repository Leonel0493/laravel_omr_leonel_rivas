<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombres', 
        'apellidos',
        'id_pais',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
