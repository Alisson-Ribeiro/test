<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Unidade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <!-- Navbar -->
    <livewire:navbar />

    <div class="container mt-5">
        <h1 class="mb-4">Editar Unidade</h1>

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

        <!-- Formulário para editar unidade -->
        <form action="{{ route('unidades.update', $unidade) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
                <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="{{ old('nome_fantasia', $unidade->nome_fantasia) }}" required>
            </div>

            <div class="mb-3">
                <label for="razao_social" class="form-label">Razão Social</label>
                <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{ old('razao_social', $unidade->razao_social) }}" required>
            </div>

            <div class="mb-3">
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" class="form-control" id="cnpj" name="cnpj" value="{{ old('cnpj', $unidade->cnpj) }}" required>
            </div>

            <div class="mb-3">
                <label for="bandeira" class="form-label">Bandeira</label>
                <select class="form-control" id="bandeira" name="bandeira" required>
                    
                    @foreach ($bandeiras as $bandeira)
                        <option value="{{ $bandeira->id }}" {{ $bandeira->id == $unidade->bandeira_id ? 'selected' : '' }}>
                            {{ $bandeira->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Unidade</button>
            <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
