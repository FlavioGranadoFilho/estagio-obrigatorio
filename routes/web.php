<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EntradaEstoqueController;
use App\Http\Controllers\SaidaEstoqueController;

Route::middleware('auth')->get('/', [App\Http\Controllers\HomeController::class, 'index']);

Auth::routes();

Route::middleware('auth')->get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->resource('categorias', CategoriaController::class);
Route::middleware('auth')->resource('produtos', ProdutoController::class);
Route::middleware('auth')->resource('entradas', EntradaEstoqueController::class);
Route::middleware('auth')->resource('saidas', SaidaEstoqueController::class);