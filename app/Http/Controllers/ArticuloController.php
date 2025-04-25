<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\CategoriaBlog;

class ArticuloController extends Controller
{
    public function homeBlog()
    {
        $articulos = Articulo::latest()->take(4)->get();
        return view('blog.home', compact('articulos'));
    }

    public function index()
    {
        $articulos = Articulo::with('categoria')->latest()->get();
        return view('articulos.index', compact('articulos'));
    }

    public function create()
    {
        $categorias = CategoriaBlog::all();
        return view('articulos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen_destacada'=> 'nullable|url',
            'autor' => 'required|string|max:100',
            'categoria_id' => 'required|exists:categorias_blog,id',
            'fecha_publicacion' => 'required|date',
        ]);

        Articulo::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen_destacada' => $request->imagen_destacada,
            'autor' => $request->autor,
            'categoria_id' => $request->categoria_id,
            'fecha_publicacion' => $request->fecha_publicacion,
        ]);

        return redirect()->route('articulos.index')->with('success', 'Artículo creado con éxito.');
    }
    
    public function show(Articulo $articulo)
    {
        return view('articulos.show', compact('articulo'));
    }

    public function edit(Articulo $articulo)
    {
        $categorias = CategoriaBlog::all();
        return view('articulos.edit', compact('articulo', 'categorias'));
    }

    public function update(Request $request, Articulo $articulo)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'imagen_destacada'=> 'nullable|url',
            'autor' => 'required|string|max:100',
            'categoria_id' => 'required|exists:categorias_blog,id',
            'fecha_publicacion' => 'required|date',
        ]);

        $articulo->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen_destacada' => $request->imagen_destacada,
            'autor' => $request->autor,
            'categoria_id' => $request->categoria_id,
            'fecha_publicacion' => $request->fecha_publicacion,
        ]);

        return redirect()->route('articulos.index')->with('success', 'Artículo actualizado con éxito.');
    }
}
