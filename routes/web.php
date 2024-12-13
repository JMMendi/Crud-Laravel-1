<?php

use App\Http\Controllers\BasuraController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/misposts', function () {
    return view('uno');
});

Route::get('/basura', [BasuraController::class, 'inicio']); // Esto es para usar la función en concreto de un controlador
Route::resource('posts', PostController::class); // Así cogerá todos los métodos que se necesiten del controlador. Este es mejor