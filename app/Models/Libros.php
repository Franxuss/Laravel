<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Libros extends Model
{
    use HasFactory;

    public static function create(Request $request){
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

    public static function updateID($id, Request $request){
        $libro = Libros::find($id);
        $libro->titulo = $request->input('titulo');
        $libro->autor = $request->input('autor');
        $libro->año = $request->input('año');
        $libro->genero = $request->input('genero');
        $libro->save();
    }

    public static function updateAlquiler($id){
        $libro = Libros::find($id);
        if($libro->disponibilidad === 'Disponible')
            $libro->disponibilidad = 'No disponible';
        else
            $libro->disponibilidad = 'Disponible';
        $libro->save();
    }

    public static function allLibros(){
        return Libros::all();
    }

    public static function FindLibroID($id){
        return Libros::find($id);
    }
}
