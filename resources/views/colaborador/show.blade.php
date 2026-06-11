@extends('layouts.erp')
@section('title', 'Colaborador — ' . $colaborador->nome)
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('colaborador.index') }}">Colaboradores</a>
                <i class="bi bi-chevron-right"></i>
                <span>Detalhes</span>
            </div>
            <h1 class="erp-page-title">{{ $colaborador->nome }}</h1>
            <p class="erp-page-subtitle">Detalhes do colaborador</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('colaborador.edit', $colaborador->id) }}" class="btn btn-warning">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <form action="{{ route('colaborador.destroy', $colaborador->id) }}" method="POST"
                  onsubmit="return confirm('Tem certeza que deseja excluir este colaborador?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Excluir</button>
            </form>
        </div>
    </div>

    <div class="erp-card" style="max-width:680px;">
        <div class="erp-card-header">
            <div style="display:flex;align-items:center;gap:12px;">
                <div class="erp-module__icon purple" style="width:40px;height:40px;font-size:1rem;">
                    <i class="bi bi-person-badge-fill"></i>
                </div>
                <div>
                    <div class="erp-card-title">{{ $colaborador->nome }}</div>
                    <div style="font-size:.75rem;color:var(--t3);">Colaborador #{{ $colaborador->id }}</div>
                </div>
            </div>
        </div>
        <div class="erp-card-body">
            <div class="erp-detail-grid">
                <div>
                    <div class="erp-detail-label">E-mail</div>
                    <div class="erp-detail-value">{{ $colaborador->email }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">CPF</div>
                    <div class="erp-detail-value mono">{{ $colaborador->cpf }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Unidade</div>
                    <div class="erp-detail-value">
                        <span class="badge bg-secondary">Unidade #{{ $colaborador->unidade_id }}</span>
                    </div>
                </div>
                <div>
                    <div class="erp-detail-label">Cadastrado em</div>
                    <div class="erp-detail-value mono">{{ $colaborador->created_at->format('d/m/Y H:i') }}</div>
                </div>
                <div>
                    <div class="erp-detail-label">Última atualização</div>
                    <div class="erp-detail-value mono">{{ $colaborador->updated_at->format('d/m/Y H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('colaborador.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Voltar à lista
        </a>
    </div>
</div>
@endsection
