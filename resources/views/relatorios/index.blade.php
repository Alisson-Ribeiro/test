<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @livewireStyles
</head>
<body>

    <!-- Navbar -->
    <livewire:navbar />
    @livewire('relatorios')
    {{-- <div class="container mt-4">
        <h1 class="text-center mb-4">📊 Relatórios do Sistema</h1>

        <!-- Dados Gerais -->
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
        </div> --}}

        <!-- Listas de Dados -->
        {{-- <div class="row">
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

        <!-- Botão Voltar -->
        <div class="text-center mt-4 mb-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary w-40">
                 Voltar
            </a>
        </div>
    </div> --}}
    @livewireScripts
</body>
</html>