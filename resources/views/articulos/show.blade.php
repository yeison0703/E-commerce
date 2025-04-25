@extends('layouts.blog')
@section('content')
<div class="container">
    <h1 style="text-align: center">{{ $articulo->titulo }}</h1>
 <div class="row" style="margin-top: 30px">
    <div class="col-md-6" style="margin-top:10px">
    <p><strong>Autor:</strong> {{ $articulo->autor }}</p>
    <br>
    <p><strong>Categoría:</strong> {{ $articulo->categoria->nombre }}</p>
    <br>
    <p><strong>Fecha de publicación:</strong> {{ $articulo->fecha_publicacion }}</p>
    <br>
   </div>

    <div class="col-md-6">
    @if ($articulo->imagen_destacada)
        <img src="{{ $articulo->imagen_destacada }}" alt="Imagen destacada" class="rounded shadow" width="300" height="300">
    @endif
    </div>
    

    <div class="contenido-articulo">
        {!! nl2br(e($articulo->contenido)) !!}
    </div>
 </div>
 <hr>

    <h4 class="mt-5">Comentarios</h4>
    @if ($articulo->comentarios->isEmpty())
        <p>No hay comentarios para este artículo.</p>
    @else

    @foreach ($articulo->comentarios as $comentario)
        <div class="comentario mb-3 border-bottom pb-2">
            <p><strong>{{ $comentario->nombre_usuario }}</strong> ({{ $comentario->email }})</p>
            <p>{{ $comentario->contenido }}</p>
            <p><small>Publicado el {{ $comentario->created_at->format('d/m/Y H:i') }}</small></p>

        <form action="{{ route('comentarios.destroy',$comentario->id) }}" method="POST" onsubmit="return confirm('¿Eliminar este comentario?')"
                style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
        </form>  
        </div>
    @endforeach
    @endif

    <h4 class="mt-5">Deja un comentario</h4>
    <form action="{{ route('comentarios.store') }}" method="POST">
        @csrf
        <input type="hidden" name="articulo_id" value="{{ $articulo->id }}">

        <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre</label>
            <input type="text" name="nombre_usuario" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Comentario</label>
            <textarea name="contenido" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Enviar Comentario</button>
        <a href="{{ route('articulos.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    </form>


</div>
@endsection