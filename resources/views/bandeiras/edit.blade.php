<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bandeira</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <!-- Navbar -->
    <livewire:navbar />
    
    <div class="container mt-5">
        <h1 class="mb-4">Editar Bandeira</h1>

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

        <!-- Formulário para editar bandeira -->
        <form action="{{ route('bandeiras.update', $bandeira) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $bandeira->nome) }}" required>
            </div>

            <div class="mb-3">
                <label for="grupo_economico_id" class="form-label">Grupo Econômico</label>
                <select class="form-control" id="grupo_economico_id" name="grupo_economico_id" required>
                    
                    @foreach ($grupo_economicos as $grupo_economico)
                        <option value="{{ $grupo_economico->id }}" {{ $grupo_economico->id == $bandeira->grupo_economico_id ? 'selected' : '' }}>
                            {{ $grupo_economico->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Bandeira</button>
            <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
