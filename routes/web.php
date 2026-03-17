<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\GeneradorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

//Auth::routes();

// Grupo de rutas protegidas por login
Route::middleware(['auth'])->group(function () {

    // Gestión de Recursos Principales
    Route::resource('autos', AutosController::class);
    Route::resource('clientes', ClientesController::class);
    Route::resource('empleados', EmpleadosController::class);
    Route::resource('ventas', VentasController::class);
    Route::resource('asset', AssetController::class);

    // Rutas para archivos de Asset (Video e Imagen)
    Route::get('/video-file/{filename}', [AssetController::class, 'getVideo'])->name('fileVideo');
    Route::get('/miniatura/{filename}', [AssetController::class, 'getImage'])->name('imageVideo');

    // Generador
    Route::get('/imprimir', [GeneradorController::class, 'imprimir'])->name('imprimir');

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuarios.index');
    Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::middleware(['auth'])->group(function () {
    Route::resource('autos', AutosController::class);
});
    }  );
    });
});
