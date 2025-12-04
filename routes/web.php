<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LoginController;

// Rota inicial vai para o Login
Route::get('/', function () { return redirect('/login'); });

// Rotas de Autenticação
Route::get('/login', [LoginController::class, 'form'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Grupo protegido (só acessa se estiver logado)
Route::middleware('auth')->group(function () {
    
    // Rotas de Produtos (CRUD Completo)
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/criar', [ProdutoController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
    Route::get('/produtos/{id}/editar', [ProdutoController::class, 'edit'])->name('produtos.edit');
    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produtos.update'); // Rota PUT para update
    Route::delete('/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy'); // Rota DELETE
});