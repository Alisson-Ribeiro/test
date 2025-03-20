<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>

        .table th, .table td {
            white-space: nowrap; /* Evita que o conteúdo quebre linha */
            overflow: hidden; /* Oculta o conteúdo extra */
            text-overflow: ellipsis; /* Adiciona "..." caso o conteúdo seja cortado */
        }

        .table th:nth-child(1), .table td:nth-child(1) { width: 5%; }  /* ID */
        .table th:nth-child(2), .table td:nth-child(2) { width: 15%; } /* Nome */
        .table th:nth-child(3), .table td:nth-child(3) { width: 20%; } /* Email */
        .table th:nth-child(4), .table td:nth-child(4) { width: 10%; } /* Telefone */
        .table th:nth-child(5), .table td:nth-child(5) { width: 15%; } /* CNPJ */
        .table th:nth-child(6), .table td:nth-child(6) { width: 25%; } /* Endereço */
        .table th:nth-child(7), .table td:nth-child(7) { width: 10%; text-align: center; } /* Ações */


    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <livewire:navbar />

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Lista de Clientes</h1>
            <a href="{{ route('clientes.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Cadastrar Novo Cliente
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
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CNPJ</th>
                        <th>Endereço</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cliente as $cliente)
                        <tr>
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ $cliente->cnpj }}</td>
                            <td>{{ $cliente->endereco}}</td>
                            <td class="text-center">
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-primary btn-sm" title="Ver detalhes">
                                    <i class="bi bi-eye"></i> Ver
                                </a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm" title="Editar cliente">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Excluir cliente">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Nenhum cliente encontrado.</td>
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
