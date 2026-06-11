<div>
    <div class="container">
        <div class="erp-page-header">
            <div>
                <h1 class="erp-page-title">Painel de Controle</h1>
                <p class="erp-page-subtitle">Bem-vindo de volta. Selecione um módulo para começar.</p>
            </div>
        </div>

        <div wire:loading class="text-center mb-4">
            <div class="spinner-border" role="status" style="width:1.5rem;height:1.5rem;">
                <span class="visually-hidden">Carregando...</span>
            </div>
        </div>

        <div class="row g-3">
            @foreach($cards as $card)
                @php
                    $colorMap = [
                        'text-primary'   => 'blue',
                        'text-success'   => 'green',
                        'text-warning'   => 'amber',
                        'text-danger'    => 'red',
                        'text-info'      => 'cyan',
                        'text-secondary' => 'purple',
                        'text-dark'      => 'blue',
                        'text-muted'     => 'blue',
                    ];
                    $cc = $colorMap[$card['cor']] ?? 'blue';
                @endphp
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <a href="{{ route($card['rota']) }}" class="erp-module">
                        <div class="erp-module__icon {{ $cc }}">
                            <i class="bi {{ $card['icone'] }}"></i>
                        </div>
                        <div>
                            <div class="erp-module__title">{{ $card['titulo'] }}</div>
                            <div class="erp-module__desc">{{ $card['descricao'] }}</div>
                        </div>
                        <div class="erp-module__arrow">
                            <i class="bi bi-arrow-right"></i>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
