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
            <div class="card-body">
                <h5 class="card-title">Nome</h5>
                <p class="card-text">{{ $grupoEconomico->nome }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('grupos_economicos.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('grupos_economicos.edit', $grupoEconomico->id) }}" class="btn btn-primary">Editar</a>
            
            <!-- Botão de exclusão -->
            <form action="{{ route('grupos_economicos.destroy', $grupoEconomico->id) }}" method="POST" class="d-inline" 
                  onsubmit="return confirm('Tem certeza que deseja excluir este grupo econômico?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
