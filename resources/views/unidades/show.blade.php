<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Unidade</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

    <!-- Navbar -->
    <livewire:navbar />

    <div class="container mt-5">
        <h1 class="mb-4">Detalhes da Unidade</h1>

        <!-- Exibir detalhes da unidade -->
        <div class="card">
            <div class="card-header">
                <strong>{{ $unidade->nome_fantasia }}</strong>
            </div>
            <div class="card-body">
                <p><strong>Razão Social:</strong> {{ $unidade->razao_social }}</p>
                <p><strong>CNPJ:</strong> {{ $unidade->cnpj }}</p>
                <p><strong>Bandeira:</strong> {{ $unidade->bandeira->nome ?? 'Sem Bandeira' }}</p>
                <p><strong>Data de Criação:</strong> {{ $unidade->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Última Atualização:</strong> {{ $unidade->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <!-- Botões de navegação -->
        <div class="mt-3">
            <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('unidades.edit', $unidade) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('unidades.destroy', $unidade) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta unidade?')">Excluir</button>
            </form>
        </div>
    </div>
</body>
</html>
