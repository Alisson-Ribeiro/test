@extends('layouts.erp')
@section('title', 'Nova Unidade')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('unidades.index') }}">Unidades</a>
                <i class="bi bi-chevron-right"></i>
                <span>Nova</span>
            </div>
            <h1 class="erp-page-title">Nova Unidade</h1>
            <p class="erp-page-subtitle">Cadastre uma nova unidade operacional</p>
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
            <span class="erp-card-title"><i class="bi bi-building" style="margin-right:6px;color:var(--emerald)"></i>Dados da Unidade</span>
        </div>
        <div class="erp-card-body">
            <form action="{{ route('unidades.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nome Fantasia</label>
                        <input type="text" class="form-control" name="nome_fantasia" value="{{ old('nome_fantasia') }}" placeholder="Nome fantasia" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Razão Social</label>
                        <input type="text" class="form-control" name="razao_social" value="{{ old('razao_social') }}" placeholder="Razão social" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">CNPJ</label>
                        <input type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}" placeholder="00.000.000/0000-00" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Bandeira</label>
                        <select class="form-select" name="bandeira" required>
                            <option value="">Selecione uma bandeira</option>
                            @foreach($bandeiras as $bandeira)
                                <option value="{{ $bandeira->id }}" {{ old('bandeira') == $bandeira->id ? 'selected' : '' }}>
                                    {{ $bandeira->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                        <button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i> Criar Unidade</button>
                        <a href="{{ route('unidades.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
