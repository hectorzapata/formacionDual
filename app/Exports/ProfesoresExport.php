<?php

namespace App\Exports;

use App\Models\Profesor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProfesoresExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Profesor::where('activo', 1)->select(['nombre', 'paterno', 'materno', 'telefono', 'titulo'])->get();
    }
}
