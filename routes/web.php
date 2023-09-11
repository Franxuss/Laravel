<?php

use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PrestamosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/updateLibro', [LibrosController::class,'updateLibro'])->name('updateLibro');
Route::get('/updateLibroForm/{id}', [LibrosController::class,'updateLibroForm']);
Route::get('/updateAlquilerController/{id}', [LibrosController::class,'updateAlquilerController']);
Route::get('/deleteLibroForm/{id}', [LibrosController::class,'deleteLibroForm'])->name('deleteLibroForm');
Route::get('/formAddLibro', [LibrosController::class,'showFormularioAddLibro']);
Route::post('/addLibro', [LibrosController::class,'addLibroFormulario'])->name('addLibro');
Route::get('/showLibros', [LibrosController::class,'showAllLibros']);
Route::get('/badLibro', [LibrosController::class,'badLibro']);


Route::get('/updatePrestamo/{id}', [PrestamosController::class,'updatePrestamo'])->name('updatePrestamo');
Route::get('/deletePrestamo/{id}', [PrestamosController::class,'deletePrestamo'])->name('deletePrestamo');

Route::get('/addPrestamo/{id}', [PrestamosController::class,'addPrestamo'])->name('addPrestamo');
Route::get('/showPrestamos', [PrestamosController::class,'showAllPrestamos']);
Route::get('/badPrestamo', [PrestamosController::class,'badPrestamo']);
