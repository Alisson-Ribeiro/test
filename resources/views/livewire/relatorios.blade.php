<div>
    <div class="container mt-4">
        <h1 class="text-center mb-4">📊 Relatórios do Sistema</h1>

                <!-- Indicadores -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">📌 Dados Gerais</h2>
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="alert alert-primary text-center">
                                    <strong>Total de Colaboradores:</strong> {{ $dados['totalColaboradores'] }}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="alert alert-success text-center">
                                    <strong>Total de Bandeiras:</strong> {{ $dados['totalBandeiras'] }}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="alert alert-warning text-center">
                                    <strong>Total de Unidades:</strong> {{ $dados['totalUnidades'] }}
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="alert alert-info text-center">
                                    <strong>Total de Grupos Econômicos:</strong> {{ $dados['totalGruposEconomicos'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botões de Exportação -->
                <div class="text-center mb-4">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('export.colaborador') }}" class="btn btn-primary w-100">
                                📂 Exportar Colaboradores
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('export.bandeira') }}" class="btn btn-primary w-100">
                                📂 Exportar Bandeiras
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('export.unidade') }}" class="btn btn-primary w-100">
                                📂 Exportar Unidades
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('export.grupo_economico') }}" class="btn btn-primary w-100">
                                📂 Exportar Grupos Econômicos
                            </a>
                        </div>
                    </div>
                </div>
    
        <!-- Filtros -->
        <div class="card mb-4 p-3">
            <h5>🔍 Filtrar Relatórios</h5>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Filtrar Unidade:</label>
                    <select class="form-select" wire:model="filtroUnidade">
                        <option value="">Todas</option>
                        @foreach($dados['unidades'] as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filtrar Bandeira:</label>
                    <select class="form-select" wire:model="filtroBandeira">
                        <option value="">Todas</option>
                        @foreach($dados['bandeiras'] as $bandeira)
                            <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filtrar Grupo Econômico:</label>
                    <select class="form-select" wire:model="filtroGrupo">
                        <option value="">Todos</option>
                        @foreach($dados['grupos'] as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Input de Busca de Colaboradores -->
        <div class="card mb-4 p-3">
            <h5>🔍 Buscar Colaborador (Unidade onde o colaborador está alocado)</h5>
            <input type="text" class="form-control" placeholder="Digite o nome do colaborador ..." wire:model="searchColaborador">
            <small class="text-muted mt-2">OBS: deixe o filtro de unidade selecionado em 'todas' para exibir o nome do colaborador caso ele esteja cadastrado em mais de uma unidade </small>
            <small class="text-muted">OBS: ou deixe o filtro de unidade selecionado em uma unidade específica para verificar se existe algum colaborador cadastrado com o nome na unidade</small>
        </div>

        <!-- Botão para atualizar com os filtros selecionados -->
        <div class="text-center mb-4">
            <button class="btn btn-primary" wire:click="$refresh">🔄 Atualizar</button>
        </div>

        <!-- Lista de colaboradores individualmente -->
        
        <div x-data="{ open: false }">
            <button class="btn btn-secondary mb-3 w-100" @click="open = !open">
                <span x-text="open ? 'Ocultar' : 'Exibir'"></span> Lista de Colaboradores
            </button>
    
            <div x-show="open" x-transition class="card card-body mt-2">
                    <div class="card-body mb-4">
                            <h2 class="card-title">📌 Lista de Colaboradores</h2>
                            <ul class="list-group">
                                @forelse($dados['listaColaboradores'] as $colaborador)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>{{ $colaborador->nome }}</strong> 
                                        <span class="badge bg-primary">Unidade {{ $colaborador->unidade_id }}</span>
                                    </li>
                                @empty
                                    <li class="list-group-item text-center">Nenhum colaborador encontrado.</li>
                                @endforelse
                            </ul>
                    </div>
            </div>
        </div>
    
        <!-- Relatórios Filtrados -->
        <div class="row">
            <div class="col-md-6 mb-2 mt-4">

                <div x-data="{ open: false }">
                    <button class="btn btn-secondary mb-3 w-100" @click="open = !open">
                        <span x-text="open ? 'Ocultar' : 'Exibir'"></span> Detalhes para Unidades
                    </button>
            
                    <div x-show="open" x-transition class="card card-body mt-2">

                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="card-title">📌 Colaboradores por Unidade</h2>
                                <ul class="list-group">
                                    @foreach($dados['colaboradoresPorUnidade'] as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Unidade {{ $item->unidade_id }}:</strong>
                                            <span class="badge bg-primary">{{ $item->total }} colaboradores</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 mb-2 mt-4">

                <div x-data="{ open: false }">
                    <button class="btn btn-secondary mb-3 w-100" @click="open = !open">
                        <span x-text="open ? 'Ocultar' : 'Exibir'"></span> Detalhes para Bandeiras
                    </button>
            
                    <div x-show="open" x-transition class="card card-body mt-2">

                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="card-title">📌 Unidades por Bandeira</h2>
                                <ul class="list-group">
                                    @foreach($dados['unidadesPorBandeira'] as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Bandeira {{ $item->bandeira_id }}:</strong>
                                            <span class="badge bg-success">{{ $item->total }} unidades</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-6 mb-2">

                <div x-data="{ open: false }">
                    <button class="btn btn-secondary mb-3 w-100" @click="open = !open">
                        <span x-text="open ? 'Ocultar' : 'Exibir'"></span> Detalhes para Grupos Econômicos
                    </button>
            
                    <div x-show="open" x-transition class="card card-body mt-2">

                        <div class="card mb-4">
                            <div class="card-body">
                                <h2 class="card-title">📌 Bandeiras por Grupo Econômico</h2>
                                <ul class="list-group">
                                    @foreach($dados['bandeirasPorGrupoEconomico'] as $item)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <strong>Grupo {{ $item->grupo_economico_id }}:</strong>
                                            <span class="badge bg-warning">{{ $item->total }} bandeiras</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    
        <!-- Voltar -->
        <div class="text-center mt-2 mb-2">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    
</div>