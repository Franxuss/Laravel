<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Prestamos;
use Illuminate\Support\Facades\Redirect;

class PrestamosController extends Controller
{
    public function updatePrestamo($id){
        $prestamo = Prestamos::FindPrestamoID($id);
        $libro_id = $prestamo->book_id;
        Libros::updateAlquiler($libro_id);
        Prestamos::updateIDPrestamo($id);
        return Redirect::to('/showPrestamos');
    }

    public function deletePrestamo($id){
        $prestamo = Prestamos::FindPrestamoID($id);
        if($prestamo->estado === 'Alquilado'){
            $book_id = $prestamo->book_id;
            Libros::updateAlquiler($book_id);
        }
        Prestamos::destroyPrestamo($id);

        return Redirect::to('/showPrestamos');
    }

    public function addPrestamo($id){
        $libro = Libros::FindLibroID($id);
        if($libro->disponibilidad === 'Disponible'){
            $user_id= '1';
            $book_id= $libro->id;
            $fecha_prestamo = date("Y/m/d");
            $estado = 'Alquilado';

            Prestamos::createPrestamo($user_id, $book_id, $fecha_prestamo, $estado);
            Libros::updateAlquiler($id);
        }
        else
            return view('alertBad');

        return Redirect::to('/showLibros');
    }

    public function showAllPrestamos(){
        $prestamos = Prestamos::allPrestamos();
        return view('prestamos\showPrestamos')->with('prestamos', $prestamos);
    }

    public function showPrestamo($id){
        $prestamo = Prestamos::FindPrestamoID($id);
        $libro_id = $prestamo->book_id;
        $libro = Libros::FindLibroID($libro_id);
        return view('prestamos\showPrestamo', ['libro' => $libro, 'prestamo'=> $prestamo]);
    }

    public function badPrestamo(){
        return view('alertBad');
    }
}
