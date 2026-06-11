@extends('layouts.erp')
@section('title', 'Novo Colaborador')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('colaborador.index') }}">Colaboradores</a>
                <i class="bi bi-chevron-right"></i>
                <span>Novo</span>
            </div>
            <h1 class="erp-page-title">Novo Colaborador</h1>
            <p class="erp-page-subtitle">Cadastre um novo colaborador no sistema</p>
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

    <div class="erp-card" style="max-width:640px;">
        <div class="erp-card-header">
            <span class="erp-card-title"><i class="bi bi-person-badge" style="margin-right:6px;color:var(--emerald)"></i>Dados do Colaborador</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('colaborador.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome completo</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome do colaborador" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email@empresa.com" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CPF</label>
                        <input type="text" class="form-control" name="cpf" value="{{ old('cpf') }}" placeholder="000.000.000-00" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Unidade</label>
                        <select class="form-select" name="unidade_id" required>
                            <option value="">Selecione uma unidade</option>
                            @foreach($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ old('unidade_id') == $unidade->id ? 'selected' : '' }}>
                                    {{ $unidade->nome_fantasia }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-lg"></i> Cadastrar
                        </button>
                        <a href="{{ route('colaborador.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
