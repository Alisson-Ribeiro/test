@extends('layouts.erp')
@section('title', 'Grupos Econômicos')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <span>Grupos Econômicos</span>
            </div>
            <h1 class="erp-page-title">Grupos Econômicos</h1>
            <p class="erp-page-subtitle">Gerencie os grupos econômicos da organização</p>
        </div>
        <a href="{{ route('grupo_economicos.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Novo Grupo
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="erp-table-wrap">
        <table class="erp-table">
            <thead>
                <tr>
                    <th style="width:70px">#ID</th>
                    <th>Nome do Grupo Econômico</th>
                    <th style="text-align:right;width:180px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grupo_economicos as $grupoEconomico)
                    <tr>
                        <td class="mono">#{{ $grupoEconomico->id }}</td>
                        <td class="no-clip" style="font-weight:600">{{ $grupoEconomico->nome }}</td>
                        <td class="actions" style="text-align:right">
                            <a href="{{ route('grupo_economicos.show', $grupoEconomico->id) }}" class="btn btn-sm btn-secondary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('grupo_economicos.edit', $grupoEconomico->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('grupo_economicos.destroy', $grupoEconomico->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este grupo econômico?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="erp-table-empty">
                            <i class="bi bi-diagram-3"></i>
                            Nenhum grupo econômico cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
