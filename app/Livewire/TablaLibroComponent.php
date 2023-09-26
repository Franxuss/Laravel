<?php

namespace App\Livewire;

use App\Models\Libros;
use Livewire\Component;

class TablaLibroComponent extends Component
{
    public $libros = [];
    public $titulo;
    public $autor;
    public $año;
    public $genero;
    public $disponibilidad;
    public $errores;

    public function mount(){
        $this->libros = Libros::allLibros();
    }

    public function addLibro(){
        if($this->año < 1950 || $this->año >  date("Y")){
            $this->errores = "El año introducido no es válido";
        }else{
            $this->errores = "";
            $newLibro = Libros::createValores($this->titulo, $this->autor, $this->año, $this->genero);

            $this->libros[] = $newLibro;

            $this-> titulo = '';
            $this-> autor = '';
            $this-> año = '';
            $this-> genero = '';
        }
    }

    public function render()
    {
        return view('livewire.tabla-libro-component');
    }
}
