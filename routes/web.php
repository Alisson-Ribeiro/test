<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClienteController;

// Rotas protegidas pelo middleware "auth"
Route::middleware(['auth'])->group(function() {
    Route::resource('grupo_economicos', GrupoEconomicoController::class);
    Route::resource('bandeiras', BandeiraController::class);
    Route::resource('unidades', UnidadeController::class);
    Route::resource('colaborador', ColaboradorController::class);
    Route::resource('clientes', ClienteController::class);

    Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');

    Route::get('/auditoria', [AuditController::class, 'index'])->name('auditoria.index');

    Route::get('/export/unidade', [ExportController::class, 'exportUnidade'])->name('export.unidade');
    Route::get('/export/bandeira', [ExportController::class, 'exportBandeira'])->name('export.bandeira');
    Route::get('/export/colaborador', [ExportController::class, 'exportColaborador'])->name('export.colaborador');
    Route::get('/export/grupo_economico', [ExportController::class, 'exportGrupoEconomico'])->name('export.grupo_economico');
});

Route::get('/register', [SessionController::class, 'showRegister'])->name('register');
Route::post('/register', [SessionController::class, 'register']);

Route::get('/login', [SessionController::class, 'showLogin'])->name('login');
Route::post('/login', [SessionController::class, 'login']);

Route::get('/dashboard', [SessionController::class, 'dashboard'])->name('dashboard');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');


// Route::middleware(['auth'])->group(function() {
//     Route::get('/dashboard', [SessionController::class, 'dashboard'])->name('dashboard');
//     Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
// });