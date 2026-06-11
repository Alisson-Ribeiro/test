@extends('layouts.erp')
@section('title', 'Bandeira — ' . $bandeira->nome)
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('bandeiras.index') }}">Bandeiras</a>
                <i class="bi bi-chevron-right"></i>
                <span>Detalhes</span>
            </div>
            <h1 class="erp-page-title">{{ $bandeira->nome }}</h1>
            <p class="erp-page-subtitle">Detalhes da bandeira</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('bandeiras.edit', $bandeira) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <form action="{{ route('bandeiras.destroy', $bandeira) }}" method="POST"
                  onsubmit="return confirm('Tem certeza que deseja excluir esta bandeira?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Excluir</button>
            </form>
        </div>
    </div>

    <div class="erp-card" style="max-width:600px;">
        <div class="erp-card-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <div class="erp-module__icon cyan" style="width:40px;height:40px;font-size:1rem;">
                    <i class="bi bi-flag-fill"></i>
                </div>
                <div>
                    <div class="erp-card-title">{{ $bandeira->nome }}</div>
                    <div style="font-size:.75rem;color:var(--t3);">Bandeira #{{ $bandeira->id }}</div>
                </div>
            </div>
        </div>
        <div class="erp-card-body">
            <div class="erp-detail-grid">
                <div>
                    <div class="erp-detail-label">Grupo Econômico</div>
                    <div class="erp-detail-value">{{ $bandeira->GrupoEconomico->nome ?? '—' }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Cadastrado em</div>
                    <div class="erp-detail-value mono">{{ $bandeira->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Última atualização</div>
                    <div class="erp-detail-value mono">{{ $bandeira->updated_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('bandeiras.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar à lista
        </a>
    </div>
</div>
@endsection
