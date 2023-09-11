@extends('app')

@section('title', 'Respuesta formulario añadido')
@section('content')
    @if($id > 0)
        <p>Se ha añadido correctamente</p>
    @else
        <p>Ha ocurrido un error al añadir el prestamo</p>
    @endif
@endsection
