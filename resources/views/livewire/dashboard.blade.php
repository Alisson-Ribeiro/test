<div>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h2 class="text-primary">Bem-vindo(a)!</h2>
            <p class="text-muted">Este é seu painel de controle.</p>
        </div>
    
        {{-- adds the loading spinner visual feedback --}}
        <div wire:loading class="text-center">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>
    
        <div class="row g-4">
            @foreach($cards as $card)
                <div class="col-md-4">
                    <a href="{{ route($card['rota']) }}" class="text-decoration-none">
                        <div class="card shadow-sm text-center p-4">
                            <i class="bi {{ $card['icone'] }} fs-1 {{ $card['cor'] }}"></i>
                            <h5 class="mt-2">{{ $card['titulo'] }}</h5>
                            <p class="text-muted">{{ $card['descricao'] }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    
</div>
