@extends('layouts.erp')
@section('title', 'Em Breve')
@section('content')
<div class="coming-soon">
    <div class="coming-soon__icon">
        <i class="bi bi-hammer"></i>
    </div>
    <h1>Funcionalidade em Construção</h1>
    <p>Estamos desenvolvendo esta funcionalidade. Em breve estará disponível para você.</p>
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-top:.5rem;">
        <i class="bi bi-arrow-left"></i> Voltar
    </a>
</div>
@endsection
