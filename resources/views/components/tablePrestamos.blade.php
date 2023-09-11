<tr class="bg-white border-b ligth:bg-gray-900 ligth:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ligth:text-white">
        {{$prestamo->user_id}}
    </th>
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
        <a href="http://127.0.0.1:8000/showPrestamo/{{$prestamo->id}}" class="p-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
        <a href="http://127.0.0.1:8000/deletePrestamo/{{$prestamo->id}}" class="p-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Borrar</a>

        @if ($prestamo->estado === 'Alquilado')
            <a href="http://127.0.0.1:8000/updatePrestamo/{{$prestamo->id}}" class="p-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Devolver</a>
        @endif
    </td>
</tr>
