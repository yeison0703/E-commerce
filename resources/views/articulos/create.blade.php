@extends('layouts.blog')

@section('content')
<div class="container">
    <h1>Crear nuevo artículo</h1>

    <form action="{{ route('articulos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="imagen_destacada" class="form-label">URL de la imagen destacada</label>
            <input type="text" name="imagen_destacada" class="form-control">
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoría</label>
            <select name="categoria_id" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de publicación</label>
            <input type="date" name="fecha_publicacion" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('articulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection