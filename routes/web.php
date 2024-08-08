<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtraccionController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecieController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/atracciones', [AtraccionController::class, 'index'])->name('atracciones.index');
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::get('/especies', [EspecieController::class, 'index'])->name('especies.index');
    Route::get('/especie-atraccion/{id}', [EspecieController::class, 'especieAtraccion'])->name('especie.atraccion');
    Route::put('/atraccion/{id}', [AtraccionController::class, 'update'])->name('atraccion.update');
});

Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
