<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auditoria do Sistema</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .details-row {
            display: none;
            background-color: #f8f9fa;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-light">

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark">Auditoria do Sistema</h1>
        </div>

        <!-- Tabela responsiva -->
        <div class="table-responsive shadow-sm bg-white rounded p-3">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Usuário</th>
                        <th>Modelo</th>
                        <th>ID do Registro</th>
                        <th>Ação</th>
                        <th>Data</th>
                        <th class="text-center">Detalhes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($audits as $audit)
                    <tr>
                        <td>{{ $audit->id }}</td>
                        <td>{{ $audit->user->name ?? 'Sistema' }}</td>
                        <td>{{ class_basename($audit->model) }}</td>
                        <td>{{ $audit->model_id }}</td>
                        <td>{{ ucfirst($audit->event) }}</td>
                        <td>{{ $audit->created_at->format('d/m/Y H:i') }}</td>
                        <td class="text-center">
                            <button class="btn btn-primary btn-sm" onclick="toggleDetails({{ $audit->id }})">
                                <i class="bi bi-eye"></i> Ver
                            </button>
                        </td>
                    </tr>
                    <tr id="details-{{ $audit->id }}" class="details-row">
                        <td colspan="7" class="p-3">
                            <strong>Antes:</strong>
                            <pre class="bg-dark text-white p-2 rounded">{{ json_encode($audit->old_values, JSON_PRETTY_PRINT) }}</pre>
                            <strong>Depois:</strong>
                            <pre class="bg-dark text-white p-2 rounded">{{ json_encode($audit->new_values, JSON_PRETTY_PRINT) }}</pre>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="d-flex justify-content-center mt-4">
            {{ $audits->links() }}
        </div>

    </div>

    <script>
        function toggleDetails(id) {
            var row = document.getElementById("details-" + id);
            var button = row.previousElementSibling.querySelector("button");

            if (row.style.display === "none" || row.style.display === "") {
                row.style.display = "table-row";
                button.innerHTML = '<i class="bi bi-eye-slash"></i> Ocultar';
            } else {
                row.style.display = "none";
                button.innerHTML = '<i class="bi bi-eye"></i> Ver';
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
