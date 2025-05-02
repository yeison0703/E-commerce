<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Categoria;

use App\http\Controllers\ArticuloController;
use App\Models\Articulo;
use App\Models\CategoriaBlog;
use App\Http\Controllers\CategoriaBlogController;
use App\Http\Controllers\ComentarioController;
use App\Models\Comentario;
use App\Http\Controllers\UserController;

Route::get('/', function () {
   $categorias = Categoria::all();
   return view('welcome', compact('categorias'));
});
Route::get('/blog', [ArticuloController::class,'homeBlog'])->name('blog.home');

//rutas productos
Route::resource('productos', ProductoController::class);
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/producto/{id}/editar', [ProductoController::class, 'edit'])->name('producto.edit');
Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');
Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');

//rutas categorias
Route::resource('categorias', CategoriaController::class);
Route::get('/categorias/{id}/productos',[CategoriaController::class, 'verProductos'])->name('categorias.producto');


//rutas articulos
Route::resource('articulos', ArticuloController::class);
Route::resource('categorias_blog', CategoriaBlogController::class);
Route::resource('comentarios', ComentarioController::class);
Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
Route::delete('/comentarios/{}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users', UserController::class);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
