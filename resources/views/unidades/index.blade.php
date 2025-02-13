<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Unidades</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Unidades</h1>

        <!-- Botão para criar nova unidade -->
        <a href="{{ route('unidades.create') }}" class="btn btn-primary mb-3">Criar Nova Unidade</a>

        <!-- Exibir mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabela de unidades -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome Fantasia</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Bandeira</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($unidades as $unidade)
                    <tr>
                        <td>{{ $unidade->id }}</td>
                        <td>{{ $unidade->nome_fantasia }}</td>
                        <td>{{ $unidade->razao_social }}</td>
                        <td>{{ $unidade->cnpj }}</td>
                        <td>{{ $unidade->bandeira->nome ?? 'Sem Bandeira' }}</td>
                        <td>
                            <a href="{{ route('unidades.show', $unidade) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('unidades.edit', $unidade) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('unidades.destroy', $unidade) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Nenhuma unidade encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
