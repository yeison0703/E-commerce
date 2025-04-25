@extends('layouts.blog')

@section('content')
<div class="container">
    <h1>Editar artículo</h1>

    <form action="{{ route('articulos.update', $articulo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" value="{{ $articulo->titulo }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" class="form-control" rows="5" required>{{ $articulo->contenido }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagen_destacada" class="form-label">URL de la imagen destacada</label>
            <input type="text" name="imagen_destacada" value="{{ $articulo->imagen_destacada }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" value="{{ $articulo->autor }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" class="form-select" required>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $categoria->id == $articulo->categoria_id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de publicación</label>
            <input type="date" name="fecha_publicacion" value="{{ $articulo->fecha_publicacion }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('articulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection