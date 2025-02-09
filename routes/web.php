<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\GrupoEconomicoController;

Route::resource('grupo_economico', GrupoEconomicoController::class);
Route::resource('bandeira', BandeiraController::class);
Route::resource('unidade', UnidadeController::class);
Route::resource('colaborador', ColaboradorController::class);