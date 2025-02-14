<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Relatórios do Sistema</h1>
        
            <h2>📌 Dados Gerais</h2>
            <ul>
                <li><strong>Total de Colaboradores:</strong> {{ $dados['totalColaboradores'] }}</li>
                <li><strong>Total de Bandeiras:</strong> {{ $dados['totalBandeiras'] }}</li>
                <li><strong>Total de Unidades:</strong> {{ $dados['totalUnidades'] }}</li>
                <li><strong>Total de Grupos Econômicos:</strong> {{ $dados['totalGruposEconomicos'] }}</li>
            </ul>
            
            <h2>📌 Colaboradores por Unidade</h2>
            <ul>
                @foreach($dados['colaboradoresPorUnidade'] as $item)
                    <strong><li>Unidade {{ $item->unidade_id }}:</strong> {{ $item->total }} colaboradores</li>
                @endforeach
            </ul>
            
        <h2>📌 Unidades por Bandeira</h2>
        <ul>
            @foreach($dados['unidadesPorBandeira'] as $item)
                <strong><li>Bandeira {{ $item->bandeira_id }}:</strong> {{ $item->total }} unidades</li>
            @endforeach
        </ul>

        <h2>📌 Bandeiras por Grupo Econômico</h2>
        <ul>
            @foreach($dados['bandeirasPorGrupoEconomico'] as $item)
                <strong><li>Grupo Econômico {{ $item->grupo_economico_id }}:</strong> {{ $item->total }} bandeiras</li>
            @endforeach
        </ul>

        <a href="{{ route('grupo_economicos.index') }}" class="btn btn-primary">Voltar</a>
    </div>
</body>
</html>
