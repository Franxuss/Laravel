<div>
    <form class="mb-9 flex flex-row justify-between" wire:submit.prevent='addLibro'>
        @csrf
        <label for="titulo" class="block text-sm font-medium leading-6 text-gray-900"></label>
        <input type="text" wire:model="titulo" placeholder="Título" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>

        <label for="autor" class="block text-sm font-medium leading-6 text-gray-900"></label>
        <input type="text" wire:model="autor" placeholder="Autor" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>

        <label for="año" class="block text-sm font-medium leading-6 text-gray-900"></label>
        <input type="number" wire:model="año" placeholder="Año" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>

        <label for="genero" class="block text-sm font-medium leading-6 text-gray-900"></label>
        <input type="text" wire:model="genero" placeholder="Género" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600" required>

        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Añadir</button>
    </form>

    <p wire:model='errores' style="color:red">{{$errores}}</p>

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
</div>




