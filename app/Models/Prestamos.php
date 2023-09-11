<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;

    public static function createPrestamo($user_id, $book_id, $fecha_prestamo, $estado){
        $prestamo = New Prestamos();

        $prestamo->user_id = $user_id;
        $prestamo->book_id = $book_id;
        $prestamo->fecha_prestamo = $fecha_prestamo;
        $prestamo->estado = $estado;
        $prestamo->save();

        return $prestamo->id;
    }

    public static function destroyPrestamo($ids){
        $prestamo = Prestamos::find($ids);
        $prestamo->delete();
    }

    public static function updateIDPrestamo($id){
        $prestamo = Prestamos::find($id);
        $prestamo->fecha_devolucion = date("Y/m/d");
        $prestamo->estado = 'Devuelto';
        $prestamo->save();
    }

    public static function allPrestamos(){
        return Prestamos::all();
    }

    public static function FindPrestamoID($id){
        return Prestamos::find($id);
    }
}
