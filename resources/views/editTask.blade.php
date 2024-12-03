<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Tarea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-8">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Editar Tarea</h1>
        
        <form id="taskForm" action="{{route('tarea.update', $tarea->id)}}" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="title" placeholder="{{ $tarea->title }}" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div>
                <input type="text" name="description" placeholder="{{ $tarea->description }}" required 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
            </div>
            <div>
                <select name="completed" 
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring focus:ring-blue-300">
                    <option value="1" {{ $tarea->completed ? 'selected' : '' }}>Completada</option>
                    <option value="0" {{ !$tarea->completed ? 'selected' : '' }}>No completada</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit" 
                    class="px-6 py-2 bg-blue-500 text-black font-semibold rounded-md hover:bg-blue-600">
                    Editar Tarea
                </button>
            </div>
        </form>
    </div>

</body>
</html>
