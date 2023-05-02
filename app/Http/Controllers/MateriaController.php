<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Materia;
use \App\Models\Profesor;

class MateriaController extends Controller{
    public function index($mensaje = false){
        $materias = Materia::where('activo', 1)->get();
        $profesores = Profesor::where('activo', 1)->get();
        return view('materia')->with( compact('materias', 'profesores', 'mensaje') );
    }
    public function store(Request $request){
        try {
            $materia = Materia::create( $request->all() );
            $materias = Materia::where('activo', 1)->get();
            $mensaje = 'Materia registrada con éxito';
            $profesores = Profesor::where('activo', 1)->get();
            return view('materia')->with( compact('materias', 'mensaje', 'profesores') );
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function edit($id){
        try {
            $materia = Materia::find($id);
            $profesores = Profesor::where('activo', 1)->get();
            return view('materia')->with( compact('materia', 'profesores') );
            dd($id, $materia);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function update(Request $request){
        try {
            $materia = Materia::find($request->id);
            $materia->update($request->all());
            return $this->index("Materia actualizada con éxito");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function destroy($id)
    {
        try {
            $materia = Materia::find($id);
            $materia->update([
                "activo" => 0
            ]);
            return $this->index("Materia eliminada con éxito");
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
