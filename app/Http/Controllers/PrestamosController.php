<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Prestamos;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PrestamosController extends Controller
{

    protected $libro;
    protected $prestamo;
    protected $user;

    public function __construct(Libros $libro, Prestamos $prestamo, User $user) {
        $this->libro = $libro;
        $this->prestamo = $prestamo;
        $this->user = $user;
    }

    public function updatePrestamo($id){
        $prestamo = $this->prestamo->FindPrestamoID($id);
        $libro_id = $prestamo->book_id;
        $this->libro->updateAlquiler($libro_id);
        $this->prestamo->updateIDPrestamo($id);
        return Redirect::to('/showPrestamos');
    }

    public function deletePrestamo($id){
        $prestamo = $this->prestamo->FindPrestamoID($id);
        if($prestamo->estado === 'Alquilado'){
            $book_id = $prestamo->book_id;
            $this->libro->updateAlquiler($book_id);
        }
        $this->prestamo->destroyPrestamo($id);
        return Redirect::to('/showPrestamos');
    }

    public function addPrestamo($id){
        $libro = $this->libro->findLibroID($id);
        $user = $this->user->showUser();

        if($libro->disponibilidad === 'Disponible'){
            $user_id= $user->id;
            $book_id= $libro->id;
            $fecha_prestamo = date("Y/m/d");
            $estado = 'Alquilado';

            $this->prestamo->createPrestamo($user_id, $book_id, $fecha_prestamo, $estado);
            $this->libro->updateAlquiler($id);
        }
        else
            return view('alertBad');

        return Redirect::to('/showLibros');
    }

    public function showAllPrestamos(){
        $user = $this->user->showUser();
        if($user->rol == 'Admin'){
            $prestamos = $this->prestamo->allPrestamos();
            return view('prestamos\showPrestamos' , ['prestamos' => $prestamos, 'user' => $user]);
        }else{
            $prestamos = PrestamosController::showPrestamoUser();
            return view('prestamos\showPrestamos', ['prestamos' => $prestamos]);
        }
    }

    public function showAllPrestamosUsuario(Request $request){
        $user = $this->user->showUser();
        $allPrestamosUsuario = $this->prestamo->findPrestamoUsuario($request->input('user_id'));
        return view('prestamos\showPrestamos', ['prestamos' => $allPrestamosUsuario, 'user' => $user]);
    }

    public function showPrestamo($id){
        $prestamo = $this->prestamo->FindPrestamoID($id);
        $libro_id = $prestamo->book_id;
        $libro = $this->libro->findLibroID($libro_id);
        return view('prestamos\showPrestamo', ['libro' => $libro, 'prestamo'=> $prestamo]);
    }

    public function showPrestamoUser(){
        $user = $this->user->showUser();
        $prestamos = $this->prestamo->where('user_id' , '=' , $user->id)
        ->get();
        return $prestamos;
    }

    public function badPrestamo(){
        return view('alertBad');
    }
}
