@extends('app')

@section('title', 'Respuesta formulario añadido')
@section('content')
    @if($id == 405 )
        <p>El año debe ser posterior a 1950 y no superior al año actual.</p>
    @elseif($id > 0)
        <p>Se ha añadido correctamente.</p>
    @else
        <p>Ha ocurrido un error al añadir el libro.</p>
    @endif
@endsection
