<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Models\Prestamos;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class LibrosController extends Controller
{

    protected $libro;
    protected $user;

    public function __construct(Libros $libro, User $user) {
        $this->libro = $libro;
        $this->user = $user;
    }

    public function updateLibro(Request $request){
        $id = Session::get('id');
        $this->libro->updateID($id, $request);
        return Redirect::to('/showLibros');
    }

    public function updateLibroForm($id){
        $libro = $this->libro->findLibroID($id);
        Session::put('id', $id);
        return view('libros.mostrarDatosLibroForm', compact('libro'));
    }

    public function deleteLibroForm($id){
        $this->libro->destroy($id);
        return Redirect::to('/showLibros');
    }

    public function showFormularioAddLibro(){
        $titulo = 'Añadir libro';
        return view('libros\addLibro_Formulario', compact('titulo'));
    }

    public function addLibroFormulario(Request $request){
        if($request->año < 1950 || $request->año >  date("Y")){
            return view('libros\addLibroOK_Formulario', ['id' => 405]);
        }else{
            $id_libro = $this->libro->create($request);
            return view('libros\addLibroOK_Formulario' , ['id' => $id_libro]);
        }
    }

    public function showAllLibros(){
        $libros = $this->libro->allLibros();
        $user = $this->user->showUser();
        if($user->rol == 'Admin'){
            return view('libros\showLibros' , ['libros' => $libros , 'user' => $user]);
        }else{
            return view('libros\showLibros' , ['libros' => $libros]);
        }
    }

    public function badLibro(){
        return view('alertBad');
    }

    public function showLibrosAPI(){
        $allLibros = $this->libro->allLibros();
        return response()->json($allLibros);
    }

    public function showLibrosAPIID($id){
        $libro = $this->libro->findLibroID($id);
        return response()->json($libro);
    }

    public function showLibrosAPIID_Post(Request $request){
        $request->validate([
            'id' => 'required',
        ]);
        $libro = $this->libro->findLibroID($request->input('id'));

        return response()->json($libro);
    }

    public function addLibroAPI(Request $request){
        try{
            $request->validate([
                'titulo' => 'required',
                'autor' => 'required',
                'año' => 'required',
                'genero' => 'required',
            ]);

            $id_libro = $this->libro->create($request);
            return response()->json($id_libro);
        }catch(ValidationException $exception){
            return response()->json(['error' => $exception->errors()]);
        }
    }

    public function findGeneroAPI(Request $request){
        try{
            $request->validate([
                'genero' => 'required',
            ]);

            $allLibrosGenero = $this->libro->findGenero($request->input('genero'));
            return response()->json($allLibrosGenero);
        }catch(ValidationException $exception){
            return response()->json(['error' => $exception->errors()]);
        }
    }

    public function showAllLibrosGenero(Request $request){
        $allLibrosGenero = $this->libro->findGenero($request->input('genero'));
        return view('libros\showLibros')->with('libros', $allLibrosGenero);
    }

    public function showAllLibrosTitulo(Request $request){
        $allLibrosTitulo = $this->libro->findTitulo($request->input('titulo'));
        return view('libros\showLibros')->with('libros', $allLibrosTitulo);
    }
}
