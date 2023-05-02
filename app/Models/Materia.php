<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model{
    protected $table = "materia";
    protected $fillable = [
        'nombre',
        'profesor_id',
        'activo'
    ];
    public function Profesor(){
        return $this->hasOne('\App\Models\Profesor', 'id', 'profesor_id');
    }
}
