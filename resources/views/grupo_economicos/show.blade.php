<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Grupo Econômico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detalhes do Grupo Econômico</h1>

        <div class="card">
            <div class="card-header">
                <strong>{{ $grupoEconomico->nome}}</strong>
            </div>
            <div class="card-body">
                <p><strong>Data de Criação:</strong> {{ $grupoEconomico->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $grupoEconomico->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('grupo_economicos.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('grupo_economicos.edit', $grupoEconomico->id) }}" class="btn btn-warning">Editar</a>
            
            <!-- Botão de exclusão -->
            <form action="{{ route('grupo_economicos.destroy', $grupoEconomico->id) }}" method="POST" class="d-inline" 
                  onsubmit="return confirm('Tem certeza que deseja excluir este grupo econômico?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
