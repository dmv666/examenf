<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('home');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [TareaController::class, 'index'])->name('dashboard');
    Route::post('/tarea/add',[TareaController::class,'createTarea'])->name('tarea.add');
    Route::post('/tarea/{id}',[TareaController::class,'editTarea'])->name('tarea.update');
    Route::post('/tarea/delete/{id}',[TareaController::class,'deleteTarea'])->name('tarea.delete');
    Route::get('/editarTarea/{id}', [TareaController::class, 'editTareaView'])->name('editTarea.View');

    Route::get('/categorias',[CategoriaController::class, 'index'])->name('categorias');
    Route::post('/categoria/add',[CategoriaController::class,'createCategories'])->name('categoria.add');
    Route::post('/categoria/{id}',[CategoriaController::class,'editCategories'])->name('categoria.update');
    Route::post('/categoria/delete/{id}',[CategoriaController::class,'deleteCategories'])->name('categoria.delete');
    Route::get('/editar/categoria/{id}', [CategoriaController::class, 'editCategoriesView'])->name('editcategoria.view');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
