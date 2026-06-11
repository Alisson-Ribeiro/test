@extends('layouts.erp')
@section('title', 'Unidades')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <span>Unidades</span>
            </div>
            <h1 class="erp-page-title">Unidades</h1>
            <p class="erp-page-subtitle">Gerencie as unidades da organização</p>
        </div>
        <a href="{{ route('unidades.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Nova Unidade
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
                    <th>Nome Fantasia</th>
                    <th>Razão Social</th>
                    <th>CNPJ</th>
                    <th>Bandeira</th>
                    <th style="text-align:right;width:180px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($unidades as $unidade)
                    <tr>
                        <td class="mono">#{{ $unidade->id }}</td>
                        <td class="no-clip" style="font-weight:600">{{ $unidade->nome_fantasia }}</td>
                        <td>{{ $unidade->razao_social }}</td>
                        <td class="mono">{{ $unidade->cnpj }}</td>
                        <td>
                            <span class="badge bg-info" style="font-weight:600">{{ $unidade->bandeira->nome ?? '—' }}</span>
                        </td>
                        <td class="actions" style="text-align:right">
                            <a href="{{ route('unidades.show', $unidade) }}" class="btn btn-sm btn-secondary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('unidades.edit', $unidade) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('unidades.destroy', $unidade) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta unidade?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="erp-table-empty">
                            <i class="bi bi-building"></i>
                            Nenhuma unidade cadastrada ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
