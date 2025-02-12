<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Grupos Econômicos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Grupos Econômicos</h1>

        <!-- Exibir mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('grupos_economicos.create') }}" class="btn btn-success mb-3">Adicionar Novo Grupo Econômico</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grupos_economicos as $grupoEconomico)
                    <tr>
                        <td>{{ $grupoEconomico->id }}</td>
                        <td>{{ $grupoEconomico->nome }}</td>
                        <td>
                            <a href="{{ route('grupos_economicos.show', $grupoEconomico->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('grupos_economicos.edit', $grupoEconomico->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('grupos_economicos.destroy', $grupoEconomico->id) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Tem certeza que deseja excluir este grupo econômico?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
