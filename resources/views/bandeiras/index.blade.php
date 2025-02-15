<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Bandeiras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Lista de Bandeiras</h1>
            <a href="{{ route('bandeiras.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Criar Nova Bandeira
            </a>
        </div>

        <!-- Exibir mensagens de sucesso -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        <!-- Tabela responsiva -->
        <div class="table-responsive shadow-sm bg-white rounded p-3">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Grupo Econômico</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bandeiras as $bandeira)
                        <tr>
                            <td>{{ $bandeira->id }}</td>
                            <td>{{ $bandeira->nome }}</td>
                            <td>{{ $bandeira->GrupoEconomico->nome ?? 'Sem Grupo Econômico' }}</td>
                            <td class="text-center">
                                <a href="{{ route('bandeiras.show', $bandeira) }}" class="btn btn-primary btn-sm" title="Ver detalhes">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <a href="{{ route('bandeiras.edit', $bandeira) }}" class="btn btn-warning btn-sm" title="Editar bandeira">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('bandeiras.destroy', $bandeira) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Tem certeza que deseja excluir esta bandeira?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir bandeira">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Nenhuma bandeira encontrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center mt-4 mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-primary w-40">
             Voltar
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
