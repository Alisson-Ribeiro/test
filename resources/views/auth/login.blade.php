<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body class="bg-light d-flex align-items-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center text-primary"><i class="bi bi-box-arrow-in-right"></i> Login</h2>

                    <!-- Exibir mensagens de erro -->
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i> {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Campo Email -->
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                        </div>

                        <!-- Campo Senha -->
                        <div class="mb-3">
                            <label class="form-label"><i class="bi bi-lock"></i> Senha</label>
                            <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
                        </div>

                        <!-- Botão de Login -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-box-arrow-in-right"></i> Entrar
                            </button>
                        </div>
                    </form>

                    <!-- Link para Registro -->
                    <div class="text-center mt-3">
                        <p>Ainda não tem uma conta?</p>
                        <a href="{{ route('register') }}" class="btn btn-outline-success">
                            <i class="bi bi-person-plus"></i> Registrar-se
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
