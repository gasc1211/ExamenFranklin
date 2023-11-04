<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectorioController;
use App\Http\Controllers\ContactoController;

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
    return view('welcome');
});

Route::get('/directorio', [DirectorioController::class, 'index'])->name('directorio.inicio');

Route::get('/directorio/crear', [DirectorioController::class, 'crear'])->name('directorio.crear');

Route::get('/directorio/buscar', [DirectorioController::class, 'buscar'])->name('directorio.buscar');

Route::get('/directorio/verContactos/{id}', [DirectorioController::class, 'verContactos'])->name('directorio.verContactos');

Route::get('/directorio/eliminar/{id}', [DirectorioController::class, 'eliminar'])->name('directorio.eliminar');

Route::post('/directorio/crearEntrada', [DirectorioController::class, 'crearEntrada'])->name('directorio.crearEntrada');

Route::post('/directorio/buscarDir', [DirectorioController::class, 'buscarDir'])->name('directorio.buscarDir');

Route::get('/contacto/crear/{codigo}', [ContactoController::class, 'crear'])->name('contacto.crear');

Route::post('/contacto/guardar', [ContactoController::class, 'guardar'])->name('contacto.guardar');

Route::get('/directorio/destroy/{id}', [DirectorioController::class, 'destroy'])->name('directorio.destroy');

Route::get('/contacto/eliminar/{id}', [ContactoController::class, 'eliminar'])->name('contacto.eliminar');