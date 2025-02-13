<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Colaborador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Detalhes do Colaborador</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nome</h5>
                <p class="card-text">{{ $colaborador->nome }}</p>

                <h5 class="card-title">E-mail</h5>
                <p class="card-text">{{ $colaborador->email }}</p>

                <h5 class="card-title">CPF</h5>
                <p class="card-text">{{ $colaborador->cpf }}</p>

                <h5 class="card-title">Unidade</h5>
                <p class="card-text">{{ $colaborador->unidade_id }}</p> <!-- Exibindo a unidade -->
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('colaborador.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('colaborador.edit', $colaborador->id) }}" class="btn btn-primary">Editar</a>
            
            <!-- Formulário para exclusão -->
            <form action="{{ route('colaborador.destroy', $colaborador->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Tem certeza que deseja excluir este colaborador?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
