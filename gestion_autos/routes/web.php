<?php

use App\Http\Controllers\PropietariosController;
use App\Http\Controllers\AutosController;
use App\Http\Controllers\MarcasController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\RelacionController@index');

//PROPIETARIOS//
Route::get('/', [PropietariosController::class, 'index'])->name('propietarios.index');
Route::get('/create', [PropietariosController::class, 'create'])->name('propietarios.create');
Route::post('/store', [PropietariosController::class, 'store'])->name('propietarios.store');
Route::get('/edit/{id}', [PropietariosController::class, 'edit'])->name('propietarios.edit');
Route::put('/update/{id}', [PropietariosController::class, 'update'])->name('propietarios.update');
Route::get('/show/{id}', [PropietariosController::class, 'show'])->name('propietarios.show');
Route::delete('/destroy/{id}', [PropietariosController::class, 'destroy'])->name('propietarios.destroy');

//AUTOS//
Route::prefix('autos')->group(function() {
Route::get('/', [AutosController::class, 'index'])->name('autos.index');
Route::get('/create', [AutosController::class, 'create'])->name('autos.create');
Route::post('/store', [AutosController::class, 'store'])->name('autos.store');
Route::get('/edit/{id}', [AutosController::class, 'edit'])->name('autos.edit');
Route::put('/update/{id}', [AutosController::class, 'update'])->name('autos.update');
Route::get('/show/{id}', [AutosController::class, 'show'])->name('autos.show');
Route::delete('/destroy/{id}', [AutosController::class, 'destroy'])->name('autos.destroy');
});

//MARCAS//
Route::prefix('marcas')->group(function() {
Route::get('/', [MarcasController::class, 'index'])->name('marcas.index');
Route::get('/create', [MarcasController::class, 'create'])->name('marcas.create');
Route::post('/store', [MarcasController::class, 'store'])->name('marcas.store');
Route::get('/edit/{id}', [MarcasController::class, 'edit'])->name('marcas.edit');
Route::put('/update/{id}', [MarcasController::class, 'update'])->name('marcas.update');
Route::get('/show/{id}', [MarcasController::class, 'show'])->name('marcas.show');
Route::delete('/destroy/{id}', [MarcasController::class, 'destroy'])->name('marcas.destroy');
});