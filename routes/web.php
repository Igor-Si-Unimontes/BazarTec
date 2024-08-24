<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProdutoVendaController;
use App\Http\Controllers\VendaController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produtos', [ProdutosController::class , 'index'])->name('produtos.index');
Route::get('/cadastrar', [ProdutosController::class, 'create'])->name('produtos.cadastrar');
Route::post('/store-produtos', [ProdutosController::class, 'store'])->name('produtos.store');
Route::get('/atualizar-produtos/{id}', [ProdutosController::class, 'edit'])->name('produtos.edit');
Route::post('/update-produtos/{id}', [ProdutosController::class, 'update'])->name('produtos.update');
Route::get('/visualizar-produtos/{id}', [ProdutosController::class, 'show'])->name('produtos.show');
Route::delete('/produtos/{id}', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
Route::get('/categorias', [CategoriasController::class , 'index'])->name('categorias.index');
Route::get('/cadastrar-categoria', [CategoriasController::class, 'create'])->name('categorias.cadastrar');
Route::post('/store-categorias', [CategoriasController::class, 'store'])->name('categorias.store');
Route::get('/atualizar-categoria/{id}', [CategoriasController::class, 'edit'])->name('categorias.edit');
Route::post('/update-categorias/{id}', [CategoriasController::class, 'update'])->name('categorias.update');
Route::get('/visualizar-categorias/{id}', [CategoriasController::class, 'show'])->name('categorias.show');
Route::delete('/categorias/{id}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::get('/produtos/{id}', [ProdutosController::class, 'getProduto']);
Route::post('/store-vendas', [VendaController::class, 'store'])->name('vendas.store');

Route::get('/vendas/download-pdf', [ProdutoVendaController::class, 'downloadPdf'])->name('vendas.downloadPdf');
Route::get('/vendas/buscar', [ProdutoVendaController::class, 'buscarVendaProduto'])->name('vendas.buscar');
Route::post('/vendas/pdf-produto', [ProdutoVendaController::class, 'PdfProduto'])->name('vendas.PdfProduto');



