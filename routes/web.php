<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\GrupoEconomicoController;

Route::resource('grupos_economicos', GrupoEconomicoController::class);
Route::resource('bandeiras', BandeiraController::class);
Route::resource('unidades', UnidadeController::class);
Route::resource('colaborador', ColaboradorController::class);