<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Tasks APP</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">
    <section><a href="{{route('categorias')}}">Crear categorias</a></section>
    <section class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Crear Tarea</h1>
        <form action="{{route('tarea.add')}}" method="POST" class="space-y-4">
            @csrf
            <article>
                <input type="text" name="title" placeholder="Título de la tarea" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </article>
            <article>
                <input type="text" name="description" placeholder="Descripción de la tarea" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </article>
            <article>
                <select name="id_categoria" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
                    <option value="" disabled selected>Seleccionar Categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                    @endforeach
                </select>
            </article>
            <article>
                <select name="completed" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
                    <option value="0" selected>No completada</option>
                </select>
            </article>
            <article class="text-center">
                <input type="submit" value="Crear Tarea" 
                class="px-6 py-2 bg-blue-500 text-black font-semibold rounded-md hover:bg-blue-600 cursor-pointer">
            </article>
        </form>
    </section>

    <section class="mt-10 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-center">Lista de Tareas</h2>
        <table class="w-full table-auto border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border border-gray-300">ID</th>
                    <th class="px-4 py-2 border border-gray-300">Tarea</th>
                    <th class="px-4 py-2 border border-gray-300">Descripción</th>
                    <th class="px-4 py-2 border border-gray-300">Estado</th>
                    <th class="px-4 py-2 border border-gray-300" colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $tareas as $tarea )
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border border-gray-300">{{ $tarea->id }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $tarea->title }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $tarea->description }}</td>
                    <td class="px-4 py-2 border border-gray-300">
                        @if ( $tarea->completed )
                            <span class="text-green-500 font-semibold">Completada</span>
                        @else
                            <span class="text-red-500 font-semibold">No completada</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        <a href="{{route('editTarea.View', $tarea->id)}}" 
                           class="px-3 py-1 bg-yellow-400 text-black rounded-md hover:bg-yellow-500">Editar</a>
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        <form action="{{route('tarea.delete', $tarea->id)}}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit" class="px-3 py-1 bg-red-500 text-black rounded-md hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

</body>
</html>
