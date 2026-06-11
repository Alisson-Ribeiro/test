@extends('layouts.erp')
@section('title', 'Novo Cliente')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('clientes.index') }}">Clientes</a>
                <i class="bi bi-chevron-right"></i>
                <span>Novo</span>
            </div>
            <h1 class="erp-page-title">Novo Cliente</h1>
            <p class="erp-page-subtitle">Preencha os dados para cadastrar um novo cliente</p>
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
            <span class="erp-card-title"><i class="bi bi-person-plus" style="margin-right:6px;color:var(--emerald)"></i>Dados do Cliente</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome completo ou razão social" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email@empresa.com" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="{{ old('telefone') }}" placeholder="(00) 00000-0000">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}" placeholder="00.000.000/0000-00" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Endereço</label>
                        <input type="text" class="form-control" name="endereco" value="{{ old('endereco') }}" placeholder="Rua, número, cidade">
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-lg"></i> Cadastrar Cliente
                        </button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
