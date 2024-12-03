<?php 

namespace App\services;
use App\Models\Categoria;

class CategoriaService{
    public function getCategories() {
        $categorias = Categoria::all();
        return $categorias;
    }
};