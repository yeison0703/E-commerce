<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\CategoriaBlog;

use Illuminate\Http\Request;

class CategoriaBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }


    public function index()
    {
        $categorias = CategoriaBlog::all();
        return view('categorias_blog.index', compact('categorias'));

    }

    public function create()
    {
        return view('categorias_blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);
        CategoriaBlog::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('categorias_blog.index')->with('success', 'Categoría creada con éxito.');
    }

    public function show($id)
    {
        // Logic to display a specific comment
    }

    public function edit($id)
    {
        $categoria = CategoriaBlog::findOrFail($id);
        return view('categorias_blog.edit', ['categorias_blog' => $categoria]);
    }

    public function update(Request $request, CategoriaBlog $categorias_blog)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);
        $categorias_blog->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
        ]);
        return redirect()->route('categorias_blog.index')->with('success', 'Categoría actualizada con éxito.');
    }

    public function destroy(CategoriaBlog $categorias_blog)
    {
        $categorias_blog->delete();
        return redirect()->route('categorias_blog.index')->with('success', 'Categoría eliminada con éxito.');
    }
}
