<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model{
    protected $table = "alumno";
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'curp',
        'telefono',
        'activo'
    ];
}
