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

Route::redirect('/', '/home');

Auth::routes(['reset' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('forgot-password', function () {
    return view('auth.passwords.email');
})->name('password.request');

Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', function ($token) {
    return view('auth.passwords.reset', ['token' => $token]);
})->name('password.reset');

Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    
    Route::get('/autos/destroy/{id}', [AutosController::class, 'destroy'])->name('autos.destroy');
    Route::resource('autos', AutosController::class);

    Route::get('/clientes/destroy/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');
    Route::resource('clientes', ClientesController::class);

    Route::get('/empleados/destroy/{id}', [EmpleadosController::class, 'destroy'])->name('empleados.destroy');
    Route::resource('empleados', EmpleadosController::class);

    Route::get('/ventas/destroy/{id}', [VentasController::class, 'destroy'])->name('ventas.destroy');
    Route::resource('ventas', VentasController::class);

    Route::get('/usuarios/destroy/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
    Route::resource('usuarios', UserController::class);

    Route::get('/asset/destroy/{id}', [AssetController::class, 'destroy'])->name('asset.destroy');
    Route::resource('asset', AssetController::class);
    
    Route::get('/video-file/{filename}', [AssetController::class, 'getVideo'])->name('fileVideo');
    Route::get('/miniatura/{filename}', [AssetController::class, 'getImage'])->name('imageVideo');

    Route::get('/imprimir', [GeneradorController::class, 'imprimir'])->name('imprimir');
    Route::get('/imprimirBD', [GeneradorController::class, 'imprimirBD'])->name('imprimirBD');
});