<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Mail;
use App\Mail\NuevoComentarioMail;

class ComentarioController extends Controller
{
    public function index()
    {
        return view('comentarios.index');
    }

    public function create()
    {
        // Logic to show the form for creating a new comment
    }

    public function store(Request $request)
{
    // Validar los datos del comentario
    $request->validate([
        'articulo_id' => 'required|exists:articulos,id',
        'nombre_usuario' => 'required|string|max:100',
        'email' => 'required|email|max:255',
        'contenido' => 'required|string',
    ]);

    // Crear el comentario
    $comentario = Comentario::create($request->all());

    // Enviar el correo
    Mail::to('admin@tudominio.com')->send(new NuevoComentarioMail($comentario));

    return redirect()->back()->with('success', 'Comentario creado con éxito.');
}

    public function show($id)
    {
        // Logic to display a specific comment
    }

    public function edit($id)
    {
        // Logic to show the form for editing a specific comment
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific comment
    }

    public function destroy($id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();

        return redirect()->to(url()->previous(). '#comentarios')->with('success', 'Comentario eliminado con éxito.');
    }
}
