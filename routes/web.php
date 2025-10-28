<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

// Rotas GET (já criadas)
Route::get('/produtos', [ProdutoController::class, 'index']); // [cite: 23]
Route::get('/categorias', [CategoriaController::class, 'index']); // [cite: 36]

// Rotas POST para salvar os dados 
Route::post('/produtos', [ProdutoController::class, 'store']); // [cite: 24, 30]
Route::post('/categorias', [CategoriaController::class, 'store']); // [cite: 37, 42]