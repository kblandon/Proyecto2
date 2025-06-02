<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoVinoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('categorias.index');
});

Route::get('/categorias/create', function () {
    return redirect()->route('categorias.create');
});

Route::resource('categorias', CategoriaController::class)->only(['index','show']);
Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('/categorias/store', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');


Route::get('/productosvino/create', [ProductoVinoController::class, 'create'])->name('productosvino.create');
Route::get('/productosvino/{productoVino}/edit', [ProductoVinoController::class, 'edit'])->name('productosvino.edit');
Route::put('/productosvino/{productoVino}', [ProductoVinoController::class, 'update'])->name('productosvino.update');
Route::get('/productosvino/{productoVino}', [ProductoVinoController::class, 'show'])->name('productosvino.show');
Route::delete('/productosvino/{productoVino}', [ProductoVinoController::class, 'destroy'])->name('productosvino.destroy');
Route::post('/productosvino/store', [ProductoVinoController::class, 'store'])->name('productosvino.store');