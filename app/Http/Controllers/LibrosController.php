<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Http\Request;

class LibrosController extends Controller
{
    public function addLibro(){
        $titulo = 'Harry Potter';
        $autor = 'J.K. Rowling';
        $año = 1997;
        $genero = 'Fantasia';
        $disponibilidad = 'disponible';

        Libros::create($titulo, $autor, $año, $genero, $disponibilidad);
    }
}
