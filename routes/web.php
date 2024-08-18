<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

Route::get('/', [ProdutosController::class , 'index'])->name('produtos.index');
Route::get('/cadastrar', [ProdutosController::class, 'create'])->name('produtos.cadastrar');
Route::post('/store', [ProdutosController::class, 'store'])->name('produtos.store');
Route::get('/atualizar/{id}', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::post('/update/{id}', [ProdutosController::class, 'update'])->name('produtos.update');
Route::get('/visualizar/{id}', [ProdutosController::class, 'show'])->name('produtos.show');
Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
