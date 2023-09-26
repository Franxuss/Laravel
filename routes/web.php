<?php

use App\Http\Controllers\LibrosController;
use App\Http\Controllers\PrestamosController;
use App\Http\Controllers\UserController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/profile', function () {return view('profile');})->name('profile');
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
    Route::get('/showPrestamo/{id}', [PrestamosController::class,'showPrestamo']);
    Route::get('/badPrestamo', [PrestamosController::class,'badPrestamo']);

    Route::post('/showLibrosGenero', [LibrosController::class,'showAllLibrosGenero'])->name('showLibrosGenero');
    Route::post('/showLibrosTitulo', [LibrosController::class,'showAllLibrosTitulo'])->name('showLibrosTitulo');
    Route::post('/showPrestamosUsuario', [PrestamosController::class,'showAllPrestamosUsuario'])->name('showPrestamosUsuario');

    Route::get('/showUserPrestamos', [UserController::class,'showUserPrestamos']);
    Route::get('/showAllUsers', [UserController::class,'showAllUsers']);
    Route::get('/showUser', [UserController::class,'showUser']);
    Route::get('/showUserRol', [UserController::class,'showUserRol']);
    Route::get('/showPrestamoUser', [PrestamosController::class,'showPrestamoUser']);
});




