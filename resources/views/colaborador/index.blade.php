<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Colaboradores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Colaboradores</h1>

        <!-- Exibir mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('colaborador.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Colaborador</a>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Unidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($colaborador as $colaborador)
                    <tr>
                        <td>{{ $colaborador->id }}</td>
                        <td>{{ $colaborador->nome }}</td>
                        <td>{{ $colaborador->email }}</td>
                        <td>{{ $colaborador->cpf }}</td>
                        <td>{{ $colaborador->nome_fantasia }}</td> <!-- Exibindo a unidade -->
                        <td>
                            <a href="{{ route('colaborador.show', $colaborador->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('colaborador.edit', $colaborador->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <!-- Formulário para excluir -->
                            <form action="{{ route('colaborador.destroy', $colaborador->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este colaborador?');">
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
