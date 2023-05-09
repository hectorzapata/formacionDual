<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profesor;

class HomeController extends Controller{
    public function index(){
        $data = [
            "totalProfesores" => 20
        ];
        $data["profesoresRegistrados"] = Profesor::where('activo', 1)->count();
        return view('dashboard')->with($data);
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
    public function create(){
        return view('profesorCreate');
    }
    public function destroy(Request $request){
        try {
            $profesor = Profesor::find($request->id);
            $profesor->update(['activo' => 0]);
            return array(
            	"exito" => true,
                "mensaje" => "Profesor eliminado con éxito"
            );
        } catch (\Throwable $th) {
            return array(
            	"exito" => false,
                "mensaje" => "Ocurrió un error al eliminar el profesor"
            );
        }
    }
    public function edit($id){
        $profesor = Profesor::find($id);
        return view('profesorCreate')->with('profesor', $profesor);
    }
    public function update(Request $request){
        try {
            $profesor = Profesor::find($request->id);
            $profesor->update($request->all());
            return $this->index('Profesor actualizado con éxito');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
