@extends('app')

@section('title', 'Mostrar Prestamos')

@section('content')
    @if($prestamos->isEmpty())
        <p>No hay prestamos</p>
    @else

        <table class="w-4 text-sm text-center text-gray-500 ligth:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ligth:bg-gray-700 ligth:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Usuario Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Libro Id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha del préstamo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de devolución
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @each('components.tablePrestamos', $prestamos, 'prestamo')
            </tbody>
        </table>
    @endif
@endsection
