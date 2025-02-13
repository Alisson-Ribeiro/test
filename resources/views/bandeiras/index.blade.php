<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bandeiras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Bandeiras</h1>

        <!-- Botão para criar nova bandeira -->
        <a href="{{ route('bandeiras.create') }}" class="btn btn-primary mb-3">Criar Nova Bandeira</a>

        <!-- Exibir mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabela de bandeiras -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Grupo Econômico</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bandeiras as $bandeira)
                    <tr>
                        <td>{{ $bandeira->id }}</td>
                        <td>{{ $bandeira->nome }}</td>
                        <td>{{ $bandeira->GrupoEconomico->nome ?? 'Sem GrupoEconomico' }}</td>
                        <td>
                            <a href="{{ route('bandeiras.show', $bandeira) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('bandeiras.edit', $bandeira) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('bandeiras.destroy', $bandeira) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma bandeira encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
