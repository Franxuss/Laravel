@extends('app')

@section('title', 'Actualizando Libro')

@section('content')

        <div class="space-y-12">

          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Detalles del préstamo</h2>

              <div class="col-span-full">
                <label for="user_id" class="block text-sm font-medium leading-6 text-gray-900">Usuario Id</label>
                <div class="mt-2">
                  <span type="text" name="user_id" id="user_id" class="mb-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$prestamo->user_id}}</span>
                </div>
              </div>

              <div class="col-span-full">
                <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Titulo</label>
                <div class="mt-2">
                  <span type="text" name="user_id" id="user_id" class="mb-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$libro->titulo}}</span>
                </div>
              </div>

              <div class="col-span-full">
                <label for="fecha_prestamo" class="block text-sm font-medium leading-6 text-gray-900">Fecha del préstamo</label>
                <div class="mt-2">
                  <span type="text" name="fecha_prestamo" id="fecha_prestamo" class="mb-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$prestamo->fecha_prestamo}}</span>
                </div>
              </div>

              <div class="col-span-full">
                <label for="fecha_devolución" class="block text-sm font-medium leading-6 text-gray-900">Fecha de devolución</label>
                <div class="mt-2">
                  <span type="text" name="fecha_devolución" id="fecha_devolución" class="mb-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$prestamo->fecha_devolucion}}</span>
                </div>
              </div>

              <div class="col-span-full">
                <label for="estado" class="block text-sm font-medium leading-6 text-gray-900">Estado</label>
                <div class="mt-2">
                  <span type="text" name="estado" id="estado" class="mb-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$prestamo->estado}}</span>
                </div>
              </div>

            </div>
            <div class="flex items-center justify-end gap-x-6">
                <button class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="http://127.0.0.1:8000/showPrestamos" class="text-white">Volver</a></button>
                @if ($prestamo->estado === 'Alquilado')
                <button class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="http://127.0.0.1:8000/updatePrestamo/{{$prestamo->id}}" class="text-white">Devolver</a></button>
                @endif
            </div>
        </div>



@endsection
