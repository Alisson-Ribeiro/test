<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colaborador;
use App\Models\Bandeira;
use App\Models\Unidade;
use App\Models\GrupoEconomico;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function index()
    {
        $dados = [
            'totalColaboradores' => Colaborador::count(),
            'totalBandeiras' => Bandeira::count(),
            'totalUnidades' => Unidade::count(),
            'totalGruposEconomicos' => GrupoEconomico::count(),

            'colaboradoresPorUnidade' => Colaborador::select('unidade_id', DB::raw('count(*) as total'))
            ->groupBy('unidade_id')
            ->get(),

            'unidadesPorBandeira' => Unidade::select('bandeira_id', DB::raw('count(*) as total'))
            ->groupBy('bandeira_id')
            ->get(),

            'bandeirasPorGrupoEconomico' => Bandeira::select('grupo_economico_id', DB::raw('count(*) as total'))
            ->groupBy('grupo_economico_id')
            ->get(),
        ];

        return view('relatorios.index', compact('dados'));
    }
}
