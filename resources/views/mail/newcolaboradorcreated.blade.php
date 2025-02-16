<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Colaborador Registrado</title>
</head>
<body>
    <h1>🎉 Novo Colaborador Registrado!</h1>
    <p>Um novo colaborador foi adicionado ao sistema.</p>
    <p><strong>Nome:</strong> {{ $colaborador->nome }}</p>
    <p><strong>Email:</strong> {{ $colaborador->email }}</p>
    <p><strong>CPF:</strong> {{ $colaborador->cpf }}</p>
    <p><strong>Unidade:</strong> {{ $colaborador->unidade->id ?? 'Não informada' }}</p>
    <hr>
    <p>Este é um e-mail automático. Favor não responder.</p>
</body>
</html>
