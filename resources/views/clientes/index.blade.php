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
        .table th:nth-child(2), .table td:nth-child(2) { width: 20%; } /* Nome */
        .table th:nth-child(3), .table td:nth-child(3) { width: 25%; } /* Email */
        .table th:nth-child(4), .table td:nth-child(4) { width: 10%; } /* Telefone */
        .table th:nth-child(5), .table td:nth-child(5) { width: 15%; } /* CNPJ */
        .table th:nth-child(6), .table td:nth-child(6) { width: 25%; } /* Endereço */

        .clickable-row {
            cursor: pointer;
        }
        .clickable-row:hover {
            background-color: #f8f9fa;
        }

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
                    </tr>
                </thead>
                <tbody>
                    @forelse($cliente as $cliente)
                        <tr class="clickable-row" data-href="{{ route('clientes.show', $cliente->id) }}">
                            <td>{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>{{ $cliente->cnpj }}</td>
                            <td>{{ $cliente->endereco}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Nenhum cliente encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    document.querySelectorAll('.clickable-row').forEach(function(row) {
                        row.addEventListener('click', function(e) {
                            // Impede ação se o clique for em um link ou botão
                            if (e.target.closest('a') || e.target.closest('button') || e.target.tagName === 'I') {
                                return;
                            }
                            window.location.href = this.dataset.href;
                        });
                    });
                });
            </script>
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
