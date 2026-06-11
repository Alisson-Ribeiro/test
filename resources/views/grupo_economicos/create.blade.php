@extends('layouts.erp')
@section('title', 'Novo Grupo Econômico')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('grupo_economicos.index') }}">Grupos Econômicos</a>
                <i class="bi bi-chevron-right"></i>
                <span>Novo</span>
            </div>
            <h1 class="erp-page-title">Novo Grupo Econômico</h1>
            <p class="erp-page-subtitle">Crie um novo grupo econômico</p>
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
            <span class="erp-card-title"><i class="bi bi-diagram-3-fill" style="margin-right:6px;color:var(--amber)"></i>Dados do Grupo</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('grupo_economicos.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nome do Grupo Econômico</label>
                        <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" placeholder="Nome do grupo" required>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i> Criar Grupo</button>
                        <a href="{{ route('grupo_economicos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
