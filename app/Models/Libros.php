<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Prestamos;

class Libros extends Model
{
    use HasFactory;

    public function prestamos() {
        return $this->belongsTo(Prestamos::class , 'book_id', 'id');
    }

    public function create(Request $request){
        $libro = New Libros();
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->año = $request->input('año');
        $libro->genero = $request->input('genero');
        $libro->disponibilidad = 'Disponible';
        $libro->save();

        return $libro->id;
    }

    public static function destroy($ids){
        $libro = Libros::find($ids);
        $libro->delete();
    }

    public function updateID($id, Request $request){
        $libro = Libros::find($id);
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->año = $request->input('año');
        $libro->genero = $request->input('genero');
        $libro->save();
    }

    public function updateAlquiler($id){
        $libro = Libros::find($id);
        if($libro->disponibilidad === 'Disponible')
            $libro->disponibilidad = 'No disponible';
        else
            $libro->disponibilidad = 'Disponible';
        $libro->save();
    }

    public function allLibros(){
        return Libros::all();
    }

    public function findLibroID($id){
        return Libros::find($id);
    }

    public function findGenero($genero){
        return Libros::where('genero' , '=' , $genero)
        ->get();
    }

    public function findTitulo($titulo){
        return Libros::where('titulo' , '=' , $titulo)
        ->get();
    }

    public function createValores($titulo, $autor, $año, $genero){
        $libro = New Libros();
        $libro->titulo = $titulo;
        $libro->autor = $autor;
        $libro->año = $año;
        $libro->genero = $genero;
        $libro->disponibilidad = 'Disponible';
        $libro->save();

        return $libro;
    }
}
