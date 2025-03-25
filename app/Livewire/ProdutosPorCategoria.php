<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produto;
use App\Models\Categoria;
use Livewire\WithPagination;

class ProdutosPorCategoria extends Component
{
    use WithPagination;

    public $categorias;
    public $categoriaSelecionada;
    public $produtoSelecionado;
    public $modalAberto = false;

    public $busca = '';
    public $ordenacao = 'asc';
    public $precoMin = null;
    public $precoMax = null;
    public $somenteEstoque = false;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->categorias = Categoria::all();
        $this->categoriaSelecionada = $this->categorias->random()->id ?? null;
    }

    public function updated($property)
    {
        if (in_array($property, ['categoriaSelecionada', 'busca', 'ordenacao', 'precoMin', 'precoMax', 'somenteEstoque'])) {
            $this->resetPage();
        }
    }

    public function abrirModal($produtoId)
    {
        $this->produtoSelecionado = Produto::findOrFail($produtoId);
        $this->modalAberto = true;
    }

    public function fecharModal()
    {
        $this->modalAberto = false;
        $this->produtoSelecionado = null;
    }

    public function render()
    {
        $produtos = Produto::query()
            ->where('categoria_id', $this->categoriaSelecionada)
            ->when($this->busca, fn($q) => $q->where('nome', 'like', '%' . $this->busca . '%'))
            ->when($this->precoMin, fn($q) => $q->where('preco', '>=', $this->precoMin))
            ->when($this->precoMax, fn($q) => $q->where('preco', '<=', $this->precoMax))
            ->when($this->somenteEstoque, fn($q) => $q->where('estoque', '>', 0))
            ->orderBy('preco', $this->ordenacao)
            ->paginate(6);

        return view('livewire.produtos-por-categoria', compact('produtos'));
    }
}
