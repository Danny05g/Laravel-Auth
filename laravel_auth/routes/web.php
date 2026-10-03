<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/clientes', [ClienteController::class, 'create'])
        ->name('clientes.create');

    Route::post('/clientes', [ClienteController::class, 'store'])
        ->name('clientes.store');

    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])
        ->name('clientes.edit');

    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])
        ->name('clientes.update');

    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])
        ->name('clientes.destroy');
});