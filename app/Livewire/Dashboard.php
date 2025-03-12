<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $cards = [];

    public function mount()
    {
        $this->cards = [
            ['rota' => 'relatorios.index', 'icone' => 'bi-file-earmark-text', 'titulo' => 'Relatórios', 'descricao' => 'Visualizar e exportar relatórios', 'cor' => 'text-primary'],
            ['rota' => 'unidades.index', 'icone' => 'bi-building', 'titulo' => 'Gerenciar Unidades', 'descricao' => 'Visualizar e gerenciar unidades', 'cor' => 'text-success'],
            ['rota' => 'grupo_economicos.index', 'icone' => 'bi-bank', 'titulo' => 'Grupos Econômicos', 'descricao' => 'Visualizar e gerenciar grupos', 'cor' => 'text-warning'],
            ['rota' => 'auditoria.index', 'icone' => 'bi-file-earmark-text', 'titulo' => 'Auditoria', 'descricao' => 'Consultar logs do sistema', 'cor' => 'text-danger'],
            ['rota' => 'bandeiras.index', 'icone' => 'bi-flag', 'titulo' => 'Gerenciar Bandeiras', 'descricao' => 'Visualizar e gerenciar bandeiras', 'cor' => 'text-info'],
            ['rota' => 'colaborador.index', 'icone' => 'bi-person-badge', 'titulo' => 'Colaboradores', 'descricao' => 'Visualizar e gerenciar funcionários', 'cor' => 'text-secondary'],
            ['rota' => 'colaborador.index', 'icone' => 'bi-truck', 'titulo' => 'Estoque e Logística', 'descricao' => 'Gestão de estoques e logística', 'cor' => 'text-dark'],
            ['rota' => 'colaborador.index', 'icone' => 'bi-cash-coin', 'titulo' => 'Financeiro', 'descricao' => 'Gestão Financeira', 'cor' => 'text-success']
            // add more cards here
        ];
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
