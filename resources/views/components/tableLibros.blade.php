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
        <a href="http://127.0.0.1:8000/deleteLibroForm/{{$libro->id}}" class="p-3 font-medium text-blue-600 hover:underline">Borrar</a>
        <a href="http://127.0.0.1:8000/updateLibroForm/{{$libro->id}}" class=" p-3 font-medium text-blue-600 hover:underline">Modificar</a>
        @if ($libro->disponibilidad === 'Disponible')
            <a href="http://127.0.0.1:8000/addPrestamo/{{$libro->id}}" class="p-3 font-medium text-blue-600 hover:underline">Alquilar</a>
        @endif
    </td>
</tr>
