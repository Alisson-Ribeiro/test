<div>
    <div class="container">
        {{-- Filtros --}}
        <div class="row mb-4 mt-4">
            <div class="col-md-3">
                <label class="form-label">Categoria:</label>
                <select wire:model="categoriaSelecionada" class="form-select">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Buscar produto:</label>
                <input type="text" class="form-control" wire:model.debounce.500ms="busca" placeholder="Digite o nome...">
            </div>
            <div class="col-md-2">
                <label class="form-label">Ordenar por:</label>
                <select wire:model="ordenacao" class="form-select">
                    <option value="asc">Preço menor</option>
                    <option value="desc">Preço maior</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Preço mínimo:</label>
                <input type="number" class="form-control" wire:model.lazy="precoMin">
            </div>
            <div class="col-md-2">
                <label class="form-label">Preço máximo:</label>
                <input type="number" class="form-control" wire:model.lazy="precoMax">
            </div>
        </div>
    
        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" wire:model="somenteEstoque" id="estoqueCheck">
            <label class="form-check-label" for="estoqueCheck">
                Mostrar apenas produtos com estoque
            </label>
        </div>

        <!-- Botão para atualizar com os filtros selecionados -->
        <div class="text-center mb-4">
            <button class="btn btn-primary" wire:click="$refresh">🔄 Atualizar</button>
        </div>
    
        {{-- Loader --}}
        <div wire:loading class="text-center mb-3">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>
    
        {{-- Produtos --}}
        <div class="row g-4 mt-4">
            @forelse($produtos as $produto)
                <div class="col-md-3">
                    <div class="card shadow-sm h-100" style="cursor: pointer;" wire:click="abrirModal({{ $produto->id }})">
                        <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}" class="img-fluid mb-2" style="max-height: 200px;">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $produto->nome }}</h5>
                            <p class="text-muted">{{ Str::limit($produto->descricao, 60) }}</p>
                            <p class="fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                            {{-- <p class="text-secondary small">Estoque: {{ $produto->estoque }}</p> --}}
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted">Nenhum produto encontrado.</div>
            @endforelse
        </div>
    
        {{-- Paginação --}}
        <div class="mt-4">
            {{ $produtos->links() }}
        </div>
    
        {{-- Modal --}}
        @if($modalAberto && $produtoSelecionado)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>{{ $produtoSelecionado->nome }}</h5>
                        <button type="button" class="btn-close" wire:click="fecharModal"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Descrição:</strong> {{ $produtoSelecionado->descricao }}</p>
                        <p><strong>Preço:</strong> R$ {{ number_format($produtoSelecionado->preco, 2, ',', '.') }}</p>
                        <p><strong>Categoria:</strong> {{ $produtoSelecionado->categoria->nome }}</p>
                        {{-- <p><strong>Estoque:</strong> {{ $produtoSelecionado->estoque }}</p> --}}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" wire:click="fecharModal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
