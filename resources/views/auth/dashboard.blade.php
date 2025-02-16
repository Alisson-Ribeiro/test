<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link text-white"><i class="bi bi-person-circle"></i> {{ $user=Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-box-arrow-right"></i> Sair
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo do Dashboard -->
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="text-primary">Bem-vindo(a), {{ $user=Auth::user()->name }}!</h2>
            <p class="text-muted">Este é seu painel de controle.</p>
        </div>

        <!-- Cards de Administração -->
        <div class="row g-4">
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
                        <p class="text-muted">Configurar unidades do sistema</p>
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
                        <p class="text-muted">Configurar bandeiras do sistema</p>
                    </div>
                </a>
            </div>

            <!-- Colaboradores -->
            <div class="col-md-4">
                <a href="{{ route('colaborador.index') }}" class="text-decoration-none">
                    <div class="card shadow-sm text-center p-4">
                        <i class="bi bi-person-badge fs-1 text-secondary"></i>
                        <h5 class="mt-2">Colaboradores</h5>
                        <p class="text-muted">Gerenciar funcionários</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
