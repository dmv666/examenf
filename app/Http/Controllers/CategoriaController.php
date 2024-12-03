<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    public function index() {
        $categorias = Categoria::all();
        return view('category', compact('categorias'));
    }
    public function createCategories(Request $request){
        $validate = $request->validate([
            'name' =>'required|unique:categorias|max:255'
            
        ]);
        Categoria::create( $validate );
        return redirect()->route('categorias')->with('status', 'actualizado con exito');
    }
    public function editCategories(Request $request){
        $category = $request->validate([
            'name' =>'required|max:255'
        ]);
        Categoria::where('id', $request-> id)->update($category);
        return redirect()->route('categorias')->with('status', 'actualizado con exito');
    }
    
    public function editCategoriesView($id){
        $categorias = Categoria::find($id);
        return view('editCategory', compact('categorias'));
    }

    public function deleteCategories($id){
        Categoria::destroy($id);
        return redirect()->route('categorias')->with('status', 'Eliminado con exito');
    }
}
