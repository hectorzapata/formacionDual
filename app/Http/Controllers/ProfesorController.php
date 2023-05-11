<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profesor;
use Barryvdh\DomPDF\Facade\Pdf;

class ProfesorController extends Controller{
    public function index($mensaje = false){
        $data['profesores'] = Profesor::where('activo', 1)->get();
        if ( $mensaje ) {
            $data['mensaje'] = $mensaje;
        }
        return view('profesor')->with($data);
    }
    public function store(Request $request){
        try {
            $profesor = Profesor::create( $request->all() );
            if ( $request->cv ) {
                $ruta = \Storage::disk('public')->put('', $request->cv);
                $profesor->cv = $ruta;
                $profesor->save();
            }
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
            if ( $request->cv ) {
                $ruta = \Storage::disk('public')->put('', $request->cv);
                $profesor->cv = $ruta;
                $profesor->save();
            }
            return $this->index('Profesor actualizado con éxito');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function gafete($id){
        try {
            $profesor = Profesor::find($id);
            // return view('gafete')->with('profesor', $profesor);
            $pdf = Pdf::loadView('gafete', ["profesor" => $profesor]);
            return $pdf->stream('gafete.pdf');
            dd($profesor);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
