<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Category</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">

    <!-- Volver -->
    <section class="mb-6">
        <a href="{{route('dashboard')}}" 
           class="text-blue-500 hover:underline text-lg font-semibold">
           ← Volver
        </a>
    </section>

    <!-- Formulario de creación de categorías -->
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Crear Categoría</h1>
        <form action="{{route('categoria.add')}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" id="name" name="name" required placeholder="Nombre de la Categoría"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div class="text-center">
                <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-black font-semibold rounded-md hover:bg-blue-600">
                    Crear Categoría
                </button>
            </div>
        </form>
    </div>

    <!-- Tabla de categorías -->
    <div class="mt-10 max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-center">Lista de Categorías</h2>
        <table class="w-full table-auto border-collapse border border-gray-300 text-left">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 border border-gray-300">Categoría ID</th>
                    <th class="px-4 py-2 border border-gray-300">Nombre de Categoría</th>
                    <th class="px-4 py-2 border border-gray-300" colspan="2">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categorias as $categoria)
                <tr class="hover:bg-gray-100">
                    <td class="px-4 py-2 border border-gray-300">{{ $categoria->id }}</td>
                    <td class="px-4 py-2 border border-gray-300">{{ $categoria->name }}</td>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        <a href="{{ route('editcategoria.view', $categoria->id) }}" 
                           class="px-3 py-1 bg-yellow-400 text-black rounded-md hover:bg-yellow-500">
                           Editar
                        </a>
                    </td>
                    <td class="px-4 py-2 border border-gray-300 text-center">
                        <form action="{{ route('categoria.delete', $categoria->id) }}" method="POST" class="inline-block">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 bg-red-500 text-black font-semibold rounded-md hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
