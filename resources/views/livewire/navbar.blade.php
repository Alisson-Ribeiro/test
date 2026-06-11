<div>
    <header class="erp-nav">
        <a href="/dashboard" class="erp-nav__brand">
            <div class="erp-nav__brand-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
            <span>NexusERP</span>
        </a>

        <nav class="erp-nav__links">
            <a href="{{ route('relatorios.index') }}" class="erp-nav__link {{ request()->routeIs('relatorios.*') ? 'active' : '' }}">
                <i class="bi bi-bar-chart-fill"></i><span>Relatórios</span>
            </a>
            <a href="{{ route('clientes.index') }}" class="erp-nav__link {{ request()->routeIs('clientes.*') ? 'active' : '' }}">
                <i class="bi bi-person-fill"></i><span>Clientes</span>
            </a>
            <a href="{{ route('colaborador.index') }}" class="erp-nav__link {{ request()->routeIs('colaborador.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge-fill"></i><span>Colaboradores</span>
            </a>
            <a href="{{ route('unidades.index') }}" class="erp-nav__link {{ request()->routeIs('unidades.*') ? 'active' : '' }}">
                <i class="bi bi-building"></i><span>Unidades</span>
            </a>
            <a href="{{ route('bandeiras.index') }}" class="erp-nav__link {{ request()->routeIs('bandeiras.*') ? 'active' : '' }}">
                <i class="bi bi-flag-fill"></i><span>Bandeiras</span>
            </a>
            <a href="{{ route('grupo_economicos.index') }}" class="erp-nav__link {{ request()->routeIs('grupo_economicos.*') ? 'active' : '' }}">
                <i class="bi bi-diagram-3-fill"></i><span>Grupos</span>
            </a>
            <div class="erp-nav__sep"></div>
            <a href="{{ route('produtos.index') }}" class="erp-nav__link {{ request()->routeIs('produtos.*') ? 'active' : '' }}">
                <i class="bi bi-box-seam-fill"></i><span>Produtos</span>
            </a>
            <a href="{{ route('financeiro.index') }}" class="erp-nav__link {{ request()->routeIs('financeiro.*') ? 'active' : '' }}">
                <i class="bi bi-cash-coin"></i><span>Financeiro</span>
            </a>
            <a href="{{ route('vendas.index') }}" class="erp-nav__link {{ request()->routeIs('vendas.*') ? 'active' : '' }}">
                <i class="bi bi-graph-up-arrow"></i><span>Vendas</span>
            </a>
            <a href="{{ route('estoque.index') }}" class="erp-nav__link {{ request()->routeIs('estoque.*') ? 'active' : '' }}">
                <i class="bi bi-truck"></i><span>Estoque</span>
            </a>
            <div class="erp-nav__sep"></div>
            <a href="{{ route('auditoria.index') }}" class="erp-nav__link {{ request()->routeIs('auditoria.*') ? 'active' : '' }}">
                <i class="bi bi-shield-check"></i><span>Auditoria</span>
            </a>
        </nav>

        <div class="erp-nav__right">
            <div class="erp-nav__user">
                <div class="erp-nav__avatar">{{ strtoupper(substr($user, 0, 1)) }}</div>
                <span class="d-none d-xl-block" style="max-width:120px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $user }}</span>
            </div>
            <button wire:click="logout" class="btn btn-sm btn-secondary" style="gap:5px;">
                <i class="bi bi-box-arrow-right"></i>
                <span class="d-none d-lg-inline">Sair</span>
            </button>
        </div>
    </header>
</div>
