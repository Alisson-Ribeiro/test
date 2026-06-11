@extends('layouts.erp')
@section('title', 'Bandeiras')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <span>Bandeiras</span>
            </div>
            <h1 class="erp-page-title">Bandeiras</h1>
            <p class="erp-page-subtitle">Gerencie as bandeiras e seus grupos econômicos</p>
        </div>
        <a href="{{ route('bandeiras.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Nova Bandeira
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
                    <th>Nome da Bandeira</th>
                    <th>Grupo Econômico</th>
                    <th style="text-align:right;width:180px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bandeiras as $bandeira)
                    <tr>
                        <td class="mono">#{{ $bandeira->id }}</td>
                        <td class="no-clip" style="font-weight:600">{{ $bandeira->nome }}</td>
                        <td>{{ $bandeira->GrupoEconomico->nome ?? '—' }}</td>
                        <td class="actions" style="text-align:right">
                            <a href="{{ route('bandeiras.show', $bandeira) }}" class="btn btn-sm btn-secondary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('bandeiras.edit', $bandeira) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('bandeiras.destroy', $bandeira) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta bandeira?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="erp-table-empty">
                            <i class="bi bi-flag"></i>
                            Nenhuma bandeira cadastrada ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
