@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Categoría</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre de la categoría:</label>
        <input  class="form-control" type="text" name="nombre" id="nombre" value="{{ old('nombre', $categoria->nombre) }}" required>
        <label for="descripcion">Descripcion:</label>
        <textarea class="form-control" name="descripcion" id="descripcion">{{ old('descripcion',$categoria->descripcion ?? '') }}</textarea>
        <br><br>
        <button type="submit" class="btn btn-light">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection