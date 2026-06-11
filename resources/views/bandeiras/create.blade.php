@extends('layouts.erp')
@section('title', 'Nova Bandeira')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('bandeiras.index') }}">Bandeiras</a>
                <i class="bi bi-chevron-right"></i>
                <span>Nova</span>
            </div>
            <h1 class="erp-page-title">Nova Bandeira</h1>
            <p class="erp-page-subtitle">Crie uma nova bandeira e vincule ao grupo econômico</p>
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
            <span class="erp-card-title"><i class="bi bi-flag-fill" style="margin-right:6px;color:var(--cyan)"></i>Dados da Bandeira</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('bandeiras.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome da Bandeira</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome da bandeira" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Grupo Econômico</label>
                        <select class="form-select" name="grupo_economico_id" required>
                            <option value="">Selecione um grupo econômico</option>
                            @foreach($grupo_economicos as $grupo_economico)
                                <option value="{{ $grupo_economico->id }}" {{ old('grupo_economico_id') == $grupo_economico->id ? 'selected' : '' }}>
                                    {{ $grupo_economico->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i> Criar Bandeira</button>
                        <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
