@extends('layouts.erp')
@section('title', 'Editar Bandeira')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('bandeiras.index') }}">Bandeiras</a>
                <i class="bi bi-chevron-right"></i>
                <span>Editar</span>
            </div>
            <h1 class="erp-page-title">Editar Bandeira</h1>
            <p class="erp-page-subtitle">{{ $bandeira->nome }}</p>
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

    <div class="erp-card" style="max-width:560px;">
        <div class="erp-card-header">
            <span class="erp-card-title"><i class="bi bi-pencil" style="margin-right:6px;color:var(--amber)"></i>Dados da Bandeira</span>
            <span class="mono" style="font-size:.75rem;color:var(--t3);">#{{ $bandeira->id }}</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('bandeiras.update', $bandeira) }}" method="POST">
                @csrf @method('PUT')
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome da Bandeira</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome', $bandeira->nome) }}" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Grupo Econômico</label>
                        <select class="form-select" name="grupo_economico_id" required>
                            @foreach($grupo_economicos as $grupo_economico)
                                <option value="{{ $grupo_economico->id }}" {{ $grupo_economico->id == $bandeira->grupo_economico_id ? 'selected' : '' }}>
                                    {{ $grupo_economico->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-check-lg"></i> Salvar</button>
                        <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
