<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Grupo Econômico</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <!-- Navbar -->
    <livewire:navbar />

    <div class="container mt-5">
        <h1 class="mb-4">Criar Grupo Econômico</h1>

        <!-- Exibir mensagens de erro -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulário para criar Grupo Econômico -->
        <form action="{{ route('grupo_economicos.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Grupo Econômico</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Criar Grupo Econômico</button>
            <a href="{{ route('grupo_economicos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
