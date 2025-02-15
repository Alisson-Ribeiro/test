<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Colaborador;
use App\Models\Bandeira;
use App\Models\Unidade;
use App\Models\GrupoEconomico;
use App\Observers\AuditObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Colaborador::observe(AuditObserver::class);
        Bandeira::observe(AuditObserver::class);
        Unidade::observe(AuditObserver::class);
        GrupoEconomico::observe(AuditObserver::class);
    }
}
