<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profesor;

class ProfesorController extends Controller{
    public function index(){
        $profesores = Profesor::where('activo', 1)->get();
        return view('profesor')->with('profesores', $profesores);
    }
    public function store(Request $request){
        try {
            $profesor = Profesor::create( $request->all() );
            $profesores = Profesor::where('activo', 1)->get();
            $mensaje = 'Profesor registrado con éxito';
            return view('profesor')->with( compact('profesores', 'mensaje') );
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
