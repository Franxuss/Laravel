@extends('app')

@section('title', 'Mostrar Libros')

@section('content')
    <div class="flex flex-col">
        <h2 class="flex justify-center mb-6 text-base font-semibold leading-7 text-gray-900">Buscar Libro</h2>
        <div class="flex flex-row justify-around">
            <form class="mb-7 flex justify-end items-center" action="{{ route('showLibrosTitulo') }}" method="POST">
                @csrf
                <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900"></label>
                <input type="text" name="titulo" placeholder="Título" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buscar</button>
            </form>
            <form class="mb-7 flex justify-end justify-end items-center" action="{{ route('showLibrosGenero') }}" method="POST">
                @csrf
                <label for="genero" class="block text-sm font-medium leading-6 text-gray-900"></label>
                <input type="text" name="genero" placeholder="Género" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>
                <button type="submit" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Buscar</button>
            </form>
        </div>
        @if (isset($user))
            <button type="button" class="mb-9 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="/formAddLibro">Añadir Libro</a></button>
        @endif

        <h2 class="flex justify-center mb-6 text-base font-semibold leading-7 text-gray-900">Lista de Libros</h2>

        {{-- @livewire('tabla-libro-component') --}}

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
                    @foreach($libros as $libro)
                    <tr class="bg-white border-b ligth:bg-gray-900 ligth:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ligth:text-white">
                            {{$libro->titulo}}
                        </th>
                        <td class="px-6 py-4">
                            {{$libro->autor}}
                        </td>
                        <td class="px-6 py-4">
                            {{$libro->año}}
                        </td>
                        <td class="px-6 py-4">
                            {{$libro->genero}}
                        </td>
                        <td class="px-6 py-4">
                            {{$libro->disponibilidad}}
                        </td>
                        <td class="px-6 py-4">
                            @if (isset($user))
                                <a href="http://127.0.0.1:8000/deleteLibroForm/{{$libro->id}}" class="p-3 font-medium text-blue-600 hover:underline">Borrar</a>
                                <a href="http://127.0.0.1:8000/updateLibroForm/{{$libro->id}}" class=" p-3 font-medium text-blue-600 hover:underline">Modificar</a>
                            @endif
                            @if ($libro->disponibilidad === 'Disponible')
                                <a href="http://127.0.0.1:8000/addPrestamo/{{$libro->id}}" class="p-3 font-medium text-blue-600 hover:underline">Alquilar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
    </div>
@endsection
