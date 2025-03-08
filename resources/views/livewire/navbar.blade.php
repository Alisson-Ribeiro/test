<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/dashboard">
                <i class="bi bi-speedometer2"></i> Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="nav-link text-white"><i class="bi bi-person-circle"></i> {{ $user }}</span>
                    </li>
                    <li class="nav-item">
                        <button wire:click="logout" class="btn btn-danger">
                            <i class="bi bi-box-arrow-right"></i> Sair
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
</div>
