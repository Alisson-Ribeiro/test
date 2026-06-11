@extends('layouts.erp')
@section('title', 'Grupo Econômico — ' . $grupoEconomico->nome)
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('grupo_economicos.index') }}">Grupos Econômicos</a>
                <i class="bi bi-chevron-right"></i>
                <span>Detalhes</span>
            </div>
            <h1 class="erp-page-title">{{ $grupoEconomico->nome }}</h1>
            <p class="erp-page-subtitle">Detalhes do grupo econômico</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('grupo_economicos.edit', $grupoEconomico->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <form action="{{ route('grupo_economicos.destroy', $grupoEconomico->id) }}" method="POST"
                  onsubmit="return confirm('Tem certeza que deseja excluir este grupo econômico?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Excluir</button>
            </form>
        </div>
    </div>

    <div class="erp-card" style="max-width:560px;">
        <div class="erp-card-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <div class="erp-module__icon amber" style="width:40px;height:40px;font-size:1rem;">
                    <i class="bi bi-diagram-3-fill"></i>
                </div>
                <div>
                    <div class="erp-card-title">{{ $grupoEconomico->nome }}</div>
                    <div style="font-size:.75rem;color:var(--t3);">Grupo Econômico #{{ $grupoEconomico->id }}</div>
                </div>
            </div>
        </div>
        <div class="erp-card-body">
            <div class="erp-detail-grid">
                <div>
                    <div class="erp-detail-label">Cadastrado em</div>
                    <div class="erp-detail-value mono">{{ $grupoEconomico->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Última atualização</div>
                    <div class="erp-detail-value mono">{{ $grupoEconomico->updated_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('grupo_economicos.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar à lista
        </a>
    </div>
</div>
@endsection
