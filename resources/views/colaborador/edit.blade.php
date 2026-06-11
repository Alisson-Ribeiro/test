@extends('layouts.erp')
@section('title', 'Editar Colaborador')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('colaborador.index') }}">Colaboradores</a>
                <i class="bi bi-chevron-right"></i>
                <span>Editar</span>
            </div>
            <h1 class="erp-page-title">Editar Colaborador</h1>
            <p class="erp-page-subtitle">{{ $colaborador->nome }}</p>
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
            <span class="erp-card-title"><i class="bi bi-pencil" style="margin-right:6px;color:var(--amber)"></i>Dados do Colaborador</span>
            <span class="mono" style="font-size:.75rem;color:var(--t3);">#{{ $colaborador->id }}</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('colaborador.update', $colaborador->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome completo</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome', $colaborador->nome) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email', $colaborador->email) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CPF</label>
                        <input type="text" class="form-control" name="cpf" value="{{ old('cpf', $colaborador->cpf) }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Unidade</label>
                        <select class="form-select" name="unidade_id" required>
                            <option value="">Selecione uma unidade</option>
                            @foreach($unidades as $unidade)
                                <option value="{{ $unidade->id }}" {{ old('unidade_id', $colaborador->unidade_id) == $unidade->id ? 'selected' : '' }}>
                                    {{ $unidade->nome_fantasia }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Salvar Alterações
                        </button>
                        <a href="{{ route('colaborador.show', $colaborador->id) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
