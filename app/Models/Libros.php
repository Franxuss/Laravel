<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    public static function create($titulo, $autor, $año, $genero, $disponibilidad){
        $libro = New Libros();
        $libro->titulo = $titulo;
        $libro->autor = $autor;
        $libro->año = $año;
        $libro->genero = $genero;
        $libro->disponibilidad = $disponibilidad;
        
        $libro->save();
    }
}
