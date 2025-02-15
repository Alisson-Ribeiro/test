<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\GrupoEconomicoController;

Route::resource('grupo_economicos', GrupoEconomicoController::class);
Route::resource('bandeiras', BandeiraController::class);
Route::resource('unidades', UnidadeController::class);
Route::resource('colaborador', ColaboradorController::class);

Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');

Route::get('/export/unidade', [ExportController::class, 'exportUnidade'])->name('export.unidade');
Route::get('/export/bandeira', [ExportController::class, 'exportBandeira'])->name('export.bandeira');
Route::get('/export/colaborador', [ExportController::class, 'exportColaborador'])->name('export.colaborador');
Route::get('/export/grupo_economico', [ExportController::class, 'exportGrupoEconomico'])->name('export.grupo_economico');