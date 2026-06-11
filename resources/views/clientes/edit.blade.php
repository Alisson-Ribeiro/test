@extends('layouts.erp')
@section('title', 'Editar Cliente')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('clientes.index') }}">Clientes</a>
                <i class="bi bi-chevron-right"></i>
                <span>Editar</span>
            </div>
            <h1 class="erp-page-title">Editar Cliente</h1>
            <p class="erp-page-subtitle">{{ $cliente->nome }}</p>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <ul style="margin:0;padding-left:16px;">
                @foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div class="erp-card" style="max-width:680px;">
        <div class="erp-card-header">
            <span class="erp-card-title"><i class="bi bi-pencil" style="margin-right:6px;color:var(--amber)"></i>Dados do Cliente</span>
            <span class="mono" style="font-size:.75rem;color:var(--t3);">#{{ $cliente->id }}</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome', $cliente->nome) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $cliente->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone', $cliente->telefone) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" value="{{ old('cnpj', $cliente->cnpj) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="{{ old('endereco', $cliente->endereco) }}">
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Salvar Alterações
                        </button>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
