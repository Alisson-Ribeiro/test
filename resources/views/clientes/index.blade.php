@extends('layouts.erp')
@section('title', 'Clientes')
@section('content')
<div class="container">
    <div class="erp-page-header">
        <div>
            <div class="erp-breadcrumb">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <span>Clientes</span>
            </div>
            <h1 class="erp-page-title">Clientes</h1>
            <p class="erp-page-subtitle">Gerencie o cadastro de clientes da empresa</p>
        </div>
        <a href="{{ route('clientes.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Novo Cliente
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
                    <th>Telefone</th>
                    <th>CNPJ</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cliente as $cliente)
                    <tr class="clickable" onclick="window.location='{{ route('clientes.show', $cliente->id) }}'">
                        <td class="mono">#{{ $cliente->id }}</td>
                        <td class="no-clip" style="font-weight:600">{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td class="mono">{{ $cliente->telefone }}</td>
                        <td class="mono">{{ $cliente->cnpj }}</td>
                        <td>{{ $cliente->endereco }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="erp-table-empty">
                            <i class="bi bi-people"></i>
                            Nenhum cliente cadastrado ainda.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
