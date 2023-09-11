<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LibrosController extends Controller
{

    public function updateLibro(Request $request){
        $id = Session::get('id');
        Libros::updateID($id, $request);
        return Redirect::to('/showLibros');
    }

    public function updateLibroForm($id){
        $libro = Libros::FindLibroID($id);
        Session::put('id', $id);
        return view('libros.mostrarDatosLibroForm', compact('libro'));
    }

    public function deleteLibroForm($id){
        Libros::destroy($id);
        return Redirect::to('/showLibros');
    }

    public function showFormularioAddLibro(){
        $titulo = 'Añadir libro';
        return view('libros\addLibro_Formulario', compact('titulo'));
    }

    public function addLibroFormulario(Request $request){
        $id_libro = Libros::create($request);
        return view('libros\addLibroOK_Formulario' , ['id' => $id_libro]);
    }

    public function showAllLibros(){
        $libros = Libros::allLibros();
        return view('libros\showLibros')->with('libros', $libros);
    }

    public function badLibro(){
        return view('alertBad');
    }

    public function showLibrosAPI(){
        $allLibros = Libros::allLibros();
        return response()->json($allLibros);
    }
}
