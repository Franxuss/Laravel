@extends('app')

@section('title', 'Formulario añadir libro')
@section('content')
    <form action="{{route('addLibro')}}" method="POST">
        @csrf
        <div class="space-y-12">

          <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Añadir Libro</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Es obligatorio reññenar todos los campos.</p>


              <div class="col-span-full">
                <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900">Titulo</label>
                <div class="mt-2">
                  <input type="text" name="titulo" id="titulo" autocomplete="titulo" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
              </div>

              <div class="col-span-full">
                <label for="autor" class="block text-sm font-medium leading-6 text-gray-900">Autor</label>
                <div class="mt-2">
                  <input type="text" name="autor" id="autor" autocomplete="autor" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
              </div>

              <div class="col-span-full">
                <label for="año" class="block text-sm font-medium leading-6 text-gray-900">Año</label>
                <div class="mt-2">
                  <input type="number" name="año" id="año" autocomplete="año" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
              </div>

              <div class="col-span-full">
                <label for="genero" class="block text-sm font-medium leading-6 text-gray-900">Género</label>
                <div class="mt-2">
                  <input type="text" name="genero" id="genero" autocomplete="genero" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" required>
                </div>
              </div>

            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Aceptar</button>
            <button class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><a href="http://127.0.0.1:8000/showLibros" class="text-white">Cancelar</a></button>
        </div>
      </form>
@endsection

