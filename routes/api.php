<?php

use App\Http\Controllers\LibrosController;
use App\Http\Middleware\primerMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/showLibrosAPI', [LibrosController::class, 'showLibrosAPI']);
Route::get('/showLibrosAPIID/{id}', [LibrosController::class, 'showLibrosAPIID']);
Route::post('/showLibrosAPIID_Post', [LibrosController::class, 'showLibrosAPIID_Post']);

Route::post('/addLibroAPI', [LibrosController::class, 'addLibroAPI'])->middleware('auth:sanctum');
Route::post('/findGeneroAPI', [LibrosController::class, 'findGeneroAPI'])->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
