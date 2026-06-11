@extends('layouts.erp')
@section('title', 'Unidade — ' . $unidade->nome_fantasia)
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('unidades.index') }}">Unidades</a>
                <i class="bi bi-chevron-right"></i>
                <span>Detalhes</span>
            </div>
            <h1 class="erp-page-title">{{ $unidade->nome_fantasia }}</h1>
            <p class="erp-page-subtitle">Detalhes da unidade</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('unidades.edit', $unidade) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <form action="{{ route('unidades.destroy', $unidade) }}" method="POST"
                  onsubmit="return confirm('Tem certeza que deseja excluir esta unidade?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Excluir</button>
            </form>
        </div>
    </div>

    <div class="erp-card" style="max-width:680px;">
        <div class="erp-card-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <div class="erp-module__icon green" style="width:40px;height:40px;font-size:1rem;">
                    <i class="bi bi-building"></i>
                </div>
                <div>
                    <div class="erp-card-title">{{ $unidade->nome_fantasia }}</div>
                    <div style="font-size:.75rem;color:var(--t3);">Unidade #{{ $unidade->id }}</div>
                </div>
            </div>
        </div>
        <div class="erp-card-body">
            <div class="erp-detail-grid">
                <div>
                    <div class="erp-detail-label">Razão Social</div>
                    <div class="erp-detail-value">{{ $unidade->razao_social }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">CNPJ</div>
                    <div class="erp-detail-value mono">{{ $unidade->cnpj }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Bandeira</div>
                    <div class="erp-detail-value">
                        <span class="badge bg-info">{{ $unidade->bandeira->nome ?? '—' }}</span>
                    </div>
                </div>
                <div>
                    <div class="erp-detail-label">Cadastrado em</div>
                    <div class="erp-detail-value mono">{{ $unidade->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Última atualização</div>
                    <div class="erp-detail-value mono">{{ $unidade->updated_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('unidades.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar à lista
        </a>
    </div>
</div>
@endsection
