<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Models\Bandeira;
use App\Models\GrupoEconomico;

class Relatorios extends Component
{
    public $filtroUnidade = '';
    public $filtroBandeira = '';
    public $filtroGrupo = '';

    public function render()
    {
        $dados = [
            'totalColaboradores' => Colaborador::count(),
            'totalBandeiras' => Bandeira::count(),
            'totalUnidades' => Unidade::count(),
            'totalGruposEconomicos' => GrupoEconomico::count(),

            'colaboradoresPorUnidade' => Colaborador::when($this->filtroUnidade, fn ($q) => $q->where('unidade_id', $this->filtroUnidade))->groupBy('unidade_id')->selectRaw('unidade_id, count(*) as total')->get(),
            'unidadesPorBandeira' => Unidade::when($this->filtroBandeira, fn ($q) => $q->where('bandeira_id', $this->filtroBandeira))->groupBy('bandeira_id')->selectRaw('bandeira_id, count(*) as total')->get(),
            'bandeirasPorGrupoEconomico' => Bandeira::when($this->filtroGrupo, fn ($q) => $q->where('grupo_economico_id', $this->filtroGrupo))->groupBy('grupo_economico_id')->selectRaw('grupo_economico_id, count(*) as total')->get(),
            
            'unidades' => Unidade::all(),
            'bandeiras' => Bandeira::all(),
            'grupos' => GrupoEconomico::all(),
        ];

        return view('livewire.relatorios', compact('dados'));
    }
}
