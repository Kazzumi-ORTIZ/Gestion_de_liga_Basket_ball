<?php

use App\Http\Controllers\StandingsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta de la Tabla de Clasificación Automática
Route::get('/clasificacion', [StandingsController::class, 'index'])->name('standings.index');

// Rutas de Login y Registro
require __DIR__.'/auth.php';

// Rutas protegidas (solo después de iniciar sesión)
Route::middleware('auth')->group(function () {
    Route::resource('teams', TeamController::class);
    Route::resource('players', PlayerController::class);
    Route::resource('games', GameController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});