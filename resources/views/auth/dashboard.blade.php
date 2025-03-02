<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    @livewireStyles
</head>
<body class="bg-light">

    <!-- Navbar -->
    <livewire:navbar />

    <!-- Conteúdo do Dashboard -->
    <livewire:dashboard />

        <!-- Cards de Administração -->
        {{-- <div class="row g-4">
            <!-- Usuários -->
            <div class="col-md-4">
                <a href="{{ route('relatorios.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-file-earmark-text fs-1 text-primary"></i>
                        <h5 class="mt-2">Relatórios</h5>
                        <p class="text-muted">Visualizar e exportar relatórios</p>
                    </div>
                </a>
            </div>

            <!-- Unidades -->
            <div class="col-md-4">
                <a href="{{ route('unidades.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-building fs-1 text-success"></i>
                        <h5 class="mt-2">Gerenciar Unidades</h5>
                        <p class="text-muted">Visualizar e gerenciar unidades</p>
                    </div>
                </a>
            </div>

            <!-- Grupos Econômicos -->
            <div class="col-md-4">
                <a href="{{ route('grupo_economicos.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-bank fs-1 text-warning"></i>
                        <h5 class="mt-2">Grupos Econômicos</h5>
                        <p class="text-muted">Visualizar e gerenciar grupos</p>
                    </div>
                </a>
            </div>

            <!-- Auditoria -->
            <div class="col-md-4">
                <a href="{{ route('auditoria.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-file-earmark-text fs-1 text-danger"></i>
                        <h5 class="mt-2">Auditoria</h5>
                        <p class="text-muted">Consultar logs do sistema</p>
                    </div>
                </a>
            </div>

            <!-- Bandeiras -->
            <div class="col-md-4">
                <a href="{{ route('bandeiras.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-flag fs-1 text-info"></i>
                        <h5 class="mt-2">Gerenciar Bandeiras</h5>
                        <p class="text-muted">Visualizar e gerenciar bandeiras</p>
                    </div>
                </a>
            </div>

            <!-- Colaboradores -->
            <div class="col-md-4">
                <a href="{{ route('colaborador.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-person-badge fs-1 text-secondary"></i>
                        <h5 class="mt-2">Colaboradores</h5>
                        <p class="text-muted">Visualizar e gerenciar funcionários</p>
                    </div>
                </a>
            </div>
        </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
