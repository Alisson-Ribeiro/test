<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Bandeira</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detalhes da Bandeira</h1>

        <!-- Exibir detalhes da bandeira -->
        <div class="card">
            <div class="card-header">
                <strong>{{ $bandeira->nome }}</strong>
            </div>
            <div class="card-body">
                <p><strong>Grupo Econômico:</strong> {{ $bandeira->GrupoEconomico->nome ?? 'Sem Bandeira' }}</p>
                <p><strong>Data de Criação:</strong> {{ $bandeira->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $bandeira->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <!-- Botões de navegação -->
        <div class="mt-3">
            <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('bandeiras.edit', $bandeira) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('bandeiras.destroy', $bandeira) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta bandeira?')">Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
