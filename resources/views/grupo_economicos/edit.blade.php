@extends('layouts.erp')
@section('title', 'Editar Grupo Econômico')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('grupo_economicos.index') }}">Grupos Econômicos</a>
                <i class="bi bi-chevron-right"></i>
                <span>Editar</span>
            </div>
            <h1 class="erp-page-title">Editar Grupo Econômico</h1>
            <p class="erp-page-subtitle">{{ $grupoEconomico->nome }}</p>
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

    <div class="erp-card" style="max-width:520px;">
        <div class="erp-card-header">
            <span class="erp-card-title"><i class="bi bi-pencil" style="margin-right:6px;color:var(--amber)"></i>Dados do Grupo</span>
            <span class="mono" style="font-size:.75rem;color:var(--t3);">#{{ $grupoEconomico->id }}</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('grupo_economicos.update', $grupoEconomico->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome do Grupo Econômico</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome', $grupoEconomico->nome) }}" required>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Salvar</button>
                        <a href="{{ route('grupo_economicos.show', $grupoEconomico->id) }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
