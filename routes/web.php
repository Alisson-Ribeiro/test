<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoEconomicoController;

Route::resource('grupo_economicos', GrupoEconomicoController::class);
