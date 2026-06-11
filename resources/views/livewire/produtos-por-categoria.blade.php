<div>
    <div class="container">
        <div class="erp-page-header">
            <div>
                <div class="erp-breadcrumb">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <i class="bi bi-chevron-right"></i>
                    <span>Produtos</span>
                </div>
                <h1 class="erp-page-title">Produtos</h1>
                <p class="erp-page-subtitle">Catálogo de produtos por categoria</p>
            </div>
        </div>

        <!-- Filters -->
        <div class="erp-filter mb-4">
            <div class="erp-filter__title"><i class="bi bi-funnel" style="margin-right:6px;"></i>Filtros</div>
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Categoria</label>
                    <select wire:model="categoriaSelecionada" class="form-select">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Buscar Produto</label>
                    <input type="text" class="form-control" wire:model.debounce.500ms="busca" placeholder="Digite o nome...">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Ordenar por</label>
                    <select wire:model="ordenacao" class="form-select">
                        <option value="asc">Preço ↑ Menor</option>
                        <option value="desc">Preço ↓ Maior</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Preço mín.</label>
                    <input type="number" class="form-control" wire:model.lazy="precoMin" placeholder="0">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Preço máx.</label>
                    <input type="number" class="form-control" wire:model.lazy="precoMax" placeholder="9999">
                </div>
            </div>
            <div class="mt-3 d-flex align-items-center gap-3">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" wire:model="somenteEstoque" id="estoqueCheck">
                    <label class="form-check-label" for="estoqueCheck">Somente com estoque</label>
                </div>
                <button class="btn btn-sm btn-primary" wire:click="$refresh">
                    <i class="bi bi-arrow-clockwise"></i> Atualizar
                </button>
            </div>
        </div>

        <!-- Loading -->
        <div wire:loading class="text-center mb-4">
            <div class="spinner-border" role="status" style="width:1.5rem;height:1.5rem;">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="row g-3">
            @forelse($produtos as $produto)
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="erp-card" style="cursor:pointer;height:100%;transition:border-color .2s,transform .2s;"
                         wire:click="abrirModal({{ $produto->id }})"
                         onmouseenter="this.style.borderColor='var(--accent)';this.style.transform='translateY(-3px)'"
                         onmouseleave="this.style.borderColor='var(--bd)';this.style.transform='none'">
                        @if($produto->imagem)
                            <div style="aspect-ratio:16/9;overflow:hidden;background:var(--bg-raised);">
                                <img src="{{ $produto->imagem }}" alt="{{ $produto->nome }}"
                                     style="width:100%;height:100%;object-fit:cover;">
                            </div>
                        @else
                            <div style="aspect-ratio:16/9;background:var(--bg-raised);display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-box-seam" style="font-size:2rem;color:var(--t3);"></i>
                            </div>
                        @endif
                        <div class="erp-card-body" style="padding:.875rem 1rem;">
                            <div style="font-weight:700;font-size:.875rem;color:var(--t1);margin-bottom:4px;">{{ $produto->nome }}</div>
                            <div style="font-size:.78rem;color:var(--t3);margin-bottom:.5rem;">{{ Str::limit($produto->descricao, 55) }}</div>
                            <div style="font-weight:800;font-size:1rem;color:var(--emerald);font-family:var(--mono);">
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="erp-table-empty" style="padding:3rem;text-align:center;">
                        <i class="bi bi-box-seam" style="font-size:2rem;display:block;margin-bottom:.5rem;opacity:.35;"></i>
                        Nenhum produto encontrado.
                    </div>
                </div>
            @endforelse
        </div>

        <div class="mt-4">
            {{ $produtos->links() }}
        </div>

        <!-- Modal -->
        @if($modalAberto && $produtoSelecionado)
        <div class="modal fade show d-block" tabindex="-1" style="background:rgba(0,0,0,.65);">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $produtoSelecionado->nome }}</h5>
                        <button type="button" class="btn-close" wire:click="fecharModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="erp-detail-grid" style="grid-template-columns:1fr 1fr;">
                            <div>
                                <div class="erp-detail-label">Preço</div>
                                <div class="erp-detail-value" style="color:var(--emerald);font-weight:800;font-family:var(--mono);">
                                    R$ {{ number_format($produtoSelecionado->preco, 2, ',', '.') }}
                                </div>
                            </div>
                            <div>
                                <div class="erp-detail-label">Categoria</div>
                                <div class="erp-detail-value">{{ $produtoSelecionado->categoria->nome }}</div>
                            </div>
                        </div>
                        <div style="margin-top:1rem;">
                            <div class="erp-detail-label" style="margin-bottom:4px;">Descrição</div>
                            <div style="font-size:.875rem;color:var(--t2);line-height:1.6;">{{ $produtoSelecionado->descricao }}</div>
                        </div>
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
