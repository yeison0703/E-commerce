@extends('layouts.blog')
@section('content')
<div class="container">
    <h1>Editar categoría</h1>

    <form action="{{ route('categorias_blog.update', $categorias_blog->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $categorias_blog->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $categorias_blog->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categorias_blog.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection