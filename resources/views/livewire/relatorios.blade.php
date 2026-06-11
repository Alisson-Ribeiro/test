<div>
    <div class="container">
        <div class="erp-page-header">
            <div>
                <div class="erp-breadcrumb">
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <i class="bi bi-chevron-right"></i>
                    <span>Relatórios</span>
                </div>
                <h1 class="erp-page-title">Relatórios</h1>
                <p class="erp-page-subtitle">Indicadores e exportações do sistema</p>
            </div>
        </div>

        <!-- KPI Stats -->
        <div class="row g-3 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="erp-stat">
                    <div class="erp-stat__icon blue"><i class="bi bi-person-badge-fill"></i></div>
                    <div>
                        <div class="erp-stat__label">Colaboradores</div>
                        <div class="erp-stat__value">{{ $dados['totalColaboradores'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="erp-stat">
                    <div class="erp-stat__icon cyan"><i class="bi bi-flag-fill"></i></div>
                    <div>
                        <div class="erp-stat__label">Bandeiras</div>
                        <div class="erp-stat__value">{{ $dados['totalBandeiras'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="erp-stat">
                    <div class="erp-stat__icon green"><i class="bi bi-building"></i></div>
                    <div>
                        <div class="erp-stat__label">Unidades</div>
                        <div class="erp-stat__value">{{ $dados['totalUnidades'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="erp-stat">
                    <div class="erp-stat__icon amber"><i class="bi bi-diagram-3-fill"></i></div>
                    <div>
                        <div class="erp-stat__label">Grupos Econômicos</div>
                        <div class="erp-stat__value">{{ $dados['totalGruposEconomicos'] }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exports -->
        <div class="erp-card mb-4">
            <div class="erp-card-header">
                <span class="erp-card-title"><i class="bi bi-download" style="margin-right:6px;color:var(--accent)"></i>Exportar Dados</span>
            </div>
            <div class="erp-card-body">
                <div class="row g-2">
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('export.colaborador') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-filetype-csv"></i> Colaboradores
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('export.bandeira') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-filetype-csv"></i> Bandeiras
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('export.unidade') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-filetype-csv"></i> Unidades
                        </a>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <a href="{{ route('export.grupo_economico') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-filetype-csv"></i> Grupos Econômicos
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="erp-filter mb-4">
            <div class="erp-filter__title"><i class="bi bi-funnel" style="margin-right:5px;"></i>Filtros</div>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Filtrar Unidade</label>
                    <select class="form-select" wire:model="filtroUnidade">
                        <option value="">Todas</option>
                        @foreach($dados['unidades'] as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->id }} — {{ $unidade->nome_fantasia ?? '' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filtrar Bandeira</label>
                    <select class="form-select" wire:model="filtroBandeira">
                        <option value="">Todas</option>
                        @foreach($dados['bandeiras'] as $bandeira)
                            <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filtrar Grupo Econômico</label>
                    <select class="form-select" wire:model="filtroGrupo">
                        <option value="">Todos</option>
                        @foreach($dados['grupos'] as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label">Buscar Colaborador</label>
                <input type="text" class="form-control" placeholder="Digite o nome do colaborador..."
                       wire:model="searchColaborador" style="max-width:400px;">
                <div style="font-size:.72rem;color:var(--t3);margin-top:4px;">Deixe 'Todas' em Unidade para buscar em todas as unidades</div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary btn-sm" wire:click="$refresh">
                    <i class="bi bi-arrow-clockwise"></i> Atualizar resultados
                </button>
            </div>
        </div>

        <!-- Data Sections -->
        <div class="row g-3 mb-2">
            <!-- Colaboradores por Unidade -->
            <div class="col-md-6" x-data="{ open: false }">
                <button class="erp-toggle" @click="open = !open">
                    <span><i class="bi bi-person-badge" style="margin-right:6px;"></i>Colaboradores por Unidade</span>
                    <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition>
                    <div class="list-group">
                        @foreach($dados['colaboradoresPorUnidade'] as $item)
                            <a href="{{ url('unidades/' . $item->unidade_id) }}" class="list-group-item d-flex justify-content-between align-items-center text-decoration-none">
                                <span style="font-weight:600;">Unidade #{{ $item->unidade_id }}</span>
                                <span class="badge bg-primary">{{ $item->total }} colab.</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Unidades por Bandeira -->
            <div class="col-md-6" x-data="{ open: false }">
                <button class="erp-toggle" @click="open = !open">
                    <span><i class="bi bi-flag-fill" style="margin-right:6px;"></i>Unidades por Bandeira</span>
                    <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition>
                    <div class="list-group">
                        @foreach($dados['unidadesPorBandeira'] as $item)
                            <a href="{{ url('bandeiras/' . $item->bandeira_id) }}" class="list-group-item d-flex justify-content-between align-items-center text-decoration-none">
                                <span style="font-weight:600;">Bandeira #{{ $item->bandeira_id }}</span>
                                <span class="badge bg-success">{{ $item->total }} unid.</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Bandeiras por Grupo -->
            <div class="col-md-6" x-data="{ open: false }">
                <button class="erp-toggle" @click="open = !open">
                    <span><i class="bi bi-diagram-3-fill" style="margin-right:6px;"></i>Bandeiras por Grupo Econômico</span>
                    <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition>
                    <div class="list-group">
                        @foreach($dados['bandeirasPorGrupoEconomico'] as $item)
                            <a href="{{ url('grupo_economicos/' . $item->grupo_economico_id) }}" class="list-group-item d-flex justify-content-between align-items-center text-decoration-none">
                                <span style="font-weight:600;">Grupo #{{ $item->grupo_economico_id }}</span>
                                <span class="badge bg-warning">{{ $item->total }} band.</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Lista de Colaboradores -->
            <div class="col-md-6" x-data="{ open: false }">
                <button class="erp-toggle" @click="open = !open">
                    <span><i class="bi bi-people-fill" style="margin-right:6px;"></i>Lista de Colaboradores por Unidade</span>
                    <i class="bi" :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition>
                    @if($dados['listaColaboradores']->isEmpty())
                        <div style="text-align:center;padding:1.5rem;color:var(--t3);font-size:.84rem;">Nenhum colaborador encontrado.</div>
                    @else
                        @foreach($dados['listaColaboradores']->groupBy('unidade_id') as $unidadeId => $colaboradores)
                            <div x-data="{ u: false }" style="margin-bottom:.5rem;">
                                <button class="erp-toggle" style="background:var(--bg-card);font-size:.78rem;" @click="u = !u">
                                    <span><i class="bi bi-building" style="margin-right:5px;"></i>Unidade {{ $unidadeId }} ({{ count($colaboradores) }})</span>
                                    <i class="bi" :class="u ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
                                </button>
                                <div x-show="u" x-transition>
                                    <div class="list-group">
                                        @foreach($colaboradores as $colaborador)
                                            <a href="{{ url('colaborador/' . $colaborador->id) }}" class="list-group-item text-decoration-none" style="position:relative;" x-data="{ h: false }" @mouseenter="h=true" @mouseleave="h=false">
                                                <span style="font-weight:600;">{{ $colaborador->nome }}</span>
                                                <div x-show="h" x-transition style="position:absolute;left:110%;top:0;z-index:50;background:var(--bg-card);border:1px solid var(--bd-light);border-radius:10px;padding:.75rem 1rem;width:240px;box-shadow:0 8px 32px rgba(0,0,0,.5);">
                                                    <div style="font-weight:700;font-size:.84rem;margin-bottom:4px;">{{ $colaborador->nome }}</div>
                                                    <div style="font-size:.75rem;color:var(--t2);"><i class="bi bi-envelope" style="margin-right:4px;"></i>{{ $colaborador->email }}</div>
                                                    <div style="font-size:.75rem;color:var(--t2);margin-top:2px;"><i class="bi bi-card-text" style="margin-right:4px;"></i>{{ $colaborador->cpf }}</div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
