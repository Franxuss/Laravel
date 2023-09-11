@extends('app')

@section('title', 'Mostrar Libros')

@section('content')
    @if($libros->isEmpty())
        <p>No hay libros</p>
    @else
        <table class="w-4 text-sm text-center text-gray-500 ligth:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ligth:bg-gray-700 ligth:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Autor
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Género
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Disponibilidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @each('components.tableLibros', $libros, 'libro')
            </tbody>
        </table>
    @endif
@endsection
