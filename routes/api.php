<?php

use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\AtraccionController;

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/comentarios', [ComentarioController::class, 'store']);
    Route::get('/comentarios/{min}/{max}', [ComentarioController::class, 'comentariosEntreCalificaciones']);
    Route::get('/comentarios/count/{id_atraccion}', [ComentarioController::class, 'cantidadComentariosAtraccion']);
    Route::get('/especies', [EspecieController::class, 'index']);
    Route::get('/especie-atraccion/{id}', [EspecieController::class, 'especieAtraccion']);
    Route::get('/atracciones-especie/{id_especie}', [EspecieController::class, 'atraccionesEspecie']);
    Route::get('/calificacion-promedio-especie/{id_especie}', [EspecieController::class, 'calificacionPromedioEspecie']);
    Route::put('/atraccion/{id}', [AtraccionController::class, 'update']);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);
