<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model{
    protected $table = "profesor";
    protected $fillable = [
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'titulo',
        'activo'
    ];
}
