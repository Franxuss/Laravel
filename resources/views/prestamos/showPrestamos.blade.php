@extends('app')

@section('title', 'Mostrar Prestamos')

@section('content')
    <div class="mt-9">
        @if (isset($user))
            <h2 class="flex justify-center mb-6 text-base font-semibold leading-7 text-gray-900">Filtrar Usuario</h2>
            <div class="flex flex-row justify-around">
                <form class="mb-7 flex justify-end items-center" action="{{ route('showPrestamosUsuario') }}" method="POST">
                    @csrf
                    <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900"></label>
                    <input type="number" name="user_id" placeholder="Filtrar usuario" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>
                    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Filtrar</button>
                </form>
            </div>
        @endif
        <h2 class="mb-9 flex justify-center mb-6 text-base font-semibold leading-7 text-gray-900">Préstamos</h2>
        @if($prestamos->isEmpty())
            <p class="mt-9">No hay prestamos</p>
        @else
            <table class="w-4 text-sm text-center text-gray-500 ligth:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ligth:bg-gray-700 ligth:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Usuario
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
                    @foreach ($prestamos as $prestamo)
                        <tr class="bg-white border-b ligth:bg-gray-900 ligth:border-gray-700">
                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ligth:text-white">
                                {{$prestamo->user_id}}
                            </td>
                            <td class="px-6 py-4">
                            {{$prestamo->book_id}}
                            </td>
                            <td class="px-6 py-4">
                                {{$prestamo->fecha_prestamo}}
                            </td>
                            <td class="px-6 py-4">
                                {{$prestamo->fecha_devolucion}}
                            </td>
                            <td class="px-6 py-4">
                                {{$prestamo->estado}}
                            </td>
                            <td class="px-6 py-4">
                                <a href="http://127.0.0.1:8000/showPrestamo/{{$prestamo->id}}" class="p-3 font-medium text-blue-600 hover:underline">Ver</a>
                                @if (isset($user))
                                <a href="http://127.0.0.1:8000/deletePrestamo/{{$prestamo->id}}" class="p-3 font-medium text-blue-600 hover:underline">Borrar</a>
                                @endif
                                @if ($prestamo->estado === 'Alquilado')
                                    <a href="http://127.0.0.1:8000/updatePrestamo/{{$prestamo->id}}" class="p-3 font-medium text-blue-600 hover:underline">Devolver</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
