<?php 

namespace App\services;
use App\Models\Tarea;

class TareaService{
    public function getTarea() {
        $tareas = Tarea::all();
        return $tareas;
    }
};