@extends('layouts.blog')
@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Agregar Nueva Categoria</h2>

    <form action="{{ route('categorias_blog.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Categoria</button>
    </form>

    <a href="{{ route('categorias_blog.index') }}" class="btn btn-secondary mt-3">Volver a Categorias</a>
</div>
@endsection