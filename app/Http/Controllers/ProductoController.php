<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Producto::with('categoria')->get(); // Obtener todos los productos con la relación de categoría
        return view('productos.index', compact('productos'));
    }


    public function create()
    {
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('productos.create', compact('categorias'));

    }


    public function store(Request $request)
{
    // Validación de los campos
    $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
        'categoria_id' => 'required|exists:categorias,id',
        'imagen' => 'nullable|url',
    ]);

    // Crear el producto
    Producto::create([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'precio' => $request->precio,
        'stock' => $request->stock,
        'categoria_id' => $request->categoria_id,
        'imagen' => $request->imagen,
    ]);

    // Redirigir al listado
    return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
}

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, string $id)
    {
        // Validación de los campos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'categoria_id' => 'required|exists:categorias,id', // Asegúrate de que la categoría exista
            'imagen' => 'nullable|url',
        ]);

        // Actualizar el producto
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        // Redirigir al listado con mensaje
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }


    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        // Redirigir al listado con mensaje
        return redirect()->route('productos.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
