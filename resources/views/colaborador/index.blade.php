@extends('layouts.erp')
@section('title', 'Colaboradores')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <span>Colaboradores</span>
            </div>
            <h1 class="erp-page-title">Colaboradores</h1>
            <p class="erp-page-subtitle">Gerencie os colaboradores cadastrados</p>
        </div>
        <a href="{{ route('colaborador.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Novo Colaborador
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
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>CPF</th>
                    <th>Unidade</th>
                    <th style="text-align:right;width:180px">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($colaborador as $colaborador)
                    <tr>
                        <td class="mono">#{{ $colaborador->id }}</td>
                        <td class="no-clip" style="font-weight:600">{{ $colaborador->nome }}</td>
                        <td>{{ $colaborador->email }}</td>
                        <td class="mono">{{ $colaborador->cpf }}</td>
                        <td>
                            <span class="badge bg-secondary">Unidade #{{ $colaborador->unidade_id }}</span>
                        </td>
                        <td class="actions" style="text-align:right">
                            <a href="{{ route('colaborador.show', $colaborador->id) }}" class="btn btn-sm btn-secondary" title="Ver">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('colaborador.edit', $colaborador->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('colaborador.destroy', $colaborador->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este colaborador?')">
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
                            <i class="bi bi-person-badge"></i>
                            Nenhum colaborador cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
