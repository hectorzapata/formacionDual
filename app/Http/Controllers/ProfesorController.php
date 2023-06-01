<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Profesor;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\Datatables\Datatables;
use \App\Exports\ProfesoresExport;

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
    public function tabla(Request $request){
        $profesores = Profesor::where('activo', 1);
        $datatable = DataTables::of($profesores)->make(true);
        $data = $datatable->getData();
        foreach ($data->data as $key => $value) {
            $value->acciones = "<div class='btn-group' role='group'>
            <button id='btnGroupVerticalDrop1' type='button' class='btn btn-secondary dropdown-toggle waves-effect waves-light' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Acciones <i class='mdi mdi-chevron-down'></i>
            </button>";
            $value->acciones .= "<div class='dropdown-menu' aria-labelledby='btnGroupVerticalDrop1'>
                <a class='dropdown-item waves-effect waves-light' href='/profesor/$value->id/gafete'>Gafete</a>
                <a class='dropdown-item waves-effect waves-light' href='/profesor/$value->id/edit'>Editar</a>
                <a class='dropdown-item waves-effect waves-light' href='javascript:void(0);' onclick='setCurrent($value->id, this)' data-toggle='modal' data-target='#exampleModal'>Eliminar</a>";
                if (!is_null($value->cv)) {
                    $value->acciones .= "<a class='dropdown-item waves-effect waves-light' href='/storage/$value->cv'>Ver CV</a>";
                }
            $value->acciones .= "</div></div>";
        }
        $datatable->setData($data);
        return $datatable;
        // dd($request->all());
    }
    public function excel(){
        // $export = new InvoicesExport([
        //     [1, 2, 3],
        //     [4, 5, 6]
        // ]);
        // return Excel::download($export, 'invoices.xlsx');
        return \Excel::download(new ProfesoresExport, 'listadoprofesores.xlsx');
        // return \Excel::download(new ProfesoresExport, 'listadoprofesores.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function mapa(Request $request){
        dd($request->all());
    }
}
