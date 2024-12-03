<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Services\CategoriaService;
use App\Services\TareaService;

class TareaController extends Controller
{
    public function index(CategoriaService $categoriaService, TareaService $tareaService) {
        $dataView['tareas'] = $tareaService->getTarea();
        $dataView['categorias'] = $categoriaService->getCategories();

        return view('home', $dataView);
    }
    public function createTarea(Request $request) {
        $validate = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'id_categoria' => 'required',
        'completed' => 'required'
        ]);
        Tarea::create($validate);
        return redirect()->route('dashboard')->with('status', 'tarea creada con exito');
    }

    public function editTarea(Request $request) {
        $tarea = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'completed' => 'required'
        ]);
        Tarea::where('id', $request-> id)->update($tarea);
        return redirect()->route('dashboard')->with('status', 'actualizado con exito');
        
    }
    public function editTareaView($id){
        $tarea = Tarea::find($id);
        
        return view('editTask', compact('tarea'));
    }
    public function deleteTarea($id) {
        Tarea::destroy($id);
        return redirect()->route('dashboard')->with('status', 'tarea eliminada con exito');
    }

}
