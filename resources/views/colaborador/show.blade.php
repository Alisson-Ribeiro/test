<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Colaborador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <!-- Navbar -->
    <livewire:navbar />

    <div class="container mt-5">
        <h1 class="mb-4">Detalhes do Colaborador</h1>

        <div class="card">
            <div class="card-header">
                <strong>{{ $colaborador->nome}}</strong>
            </div>
            <div class="card-body">
                <p><strong>E-mail: </strong>{{ $colaborador->email }}</p>
                <p><strong>CPF: </strong>{{ $colaborador->cpf }}</p>
                <p><strong>Unidade: </strong>{{ $colaborador->unidade_id }}</p>
                <p><strong>Data de Criação:</strong> {{ $colaborador->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $colaborador->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('colaborador.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('colaborador.edit', $colaborador->id) }}" class="btn btn-warning">Editar</a>
            
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
