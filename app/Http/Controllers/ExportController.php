<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\Colaborador;
use App\Models\GrupoEconomico;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function exportColaborador()
    {
        return (new FastExcel(Colaborador::all()))->download('colaboradores.xlsx');
    }

    public function exportUnidade()
    {
        return (new FastExcel(Unidade::all()))->download('unidades.xlsx');
    }

    public function exportBandeira()
    {
        return (new FastExcel(Bandeira::all()))->download('bandeiras.xlsx');
    }

    public function exportGrupoEconomico()
    {
        return (new FastExcel(GrupoEconomico::all()))->download('grupos_economicos.xlsx');
    }
    
}

