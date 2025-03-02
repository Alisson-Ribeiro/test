<div>
    <div class="container mt-4">
        <h1 class="text-center mb-4">📊 Relatórios do Sistema</h1>
    
        <!-- Filtros -->
        <div class="card mb-4 p-3">
            <h5>🔍 Filtrar Relatórios</h5>
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Filtrar por Unidade:</label>
                    <select class="form-select" wire:model="filtroUnidade">
                        <option value="">Todas</option>
                        @foreach($dados['unidades'] as $unidade)
                            <option value="{{ $unidade->id }}">{{ $unidade->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filtrar por Bandeira:</label>
                    <select class="form-select" wire:model="filtroBandeira">
                        <option value="">Todas</option>
                        @foreach($dados['bandeiras'] as $bandeira)
                            <option value="{{ $bandeira->id }}">{{ $bandeira->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Filtrar por Grupo Econômico:</label>
                    <select class="form-select" wire:model="filtroGrupo">
                        <option value="">Todos</option>
                        @foreach($dados['grupos'] as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nome }}</option>
                        @endforeach
                    </select>
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
    
        <!-- Exportação -->
        <div class="text-center mb-4">
            <button class="btn btn-primary" wire:click="$refresh">🔄 Atualizar</button>
        </div>
    
        <!-- Relatórios Filtrados -->
        <div class="row">
            <div class="col-md-6">
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
    
            <div class="col-md-6">
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
    
            <div class="col-md-6">
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
    
        <!-- Voltar -->
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    
</div>
