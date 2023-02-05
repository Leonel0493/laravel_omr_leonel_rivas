<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesores extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_persona',
        'email',
        'created_by', 
        'modified_by',
        'enabled',
    ];
}
