@extends('layouts.blog')

@section('content')
<div class="container">

    <h1 style="text-align: center">Lista de Articulos</h1>

    <a href="{{ route('articulos.create') }}" class="btn btn-secondary">Agregar Nuevo Articulo</a>


    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($articulos->isEmpty())
        <p>No hay articulos registrados.</p>
    @else
    
    <table class="table table-dark table-hover mt-4" style="justify-content: center">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Autor</th>
                <th>Fecha de publicación</th>
                <th class="col-2" >Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $articulo)
                <tr>
                    <td>
                        @if ($articulo->imagen_destacada)
                            <img src="{{ $articulo->imagen_destacada }}" alt="Imagen" width="80" height="60" style="height: 60px; object-fit: cover;">
                        @else
                            <span>Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ $articulo->titulo }}</td>
                    <td>{{ $articulo->categoria->nombre }}</td>
                    <td>{{ $articulo->autor }}</td>
                    <td>
                        {{ $articulo->fecha_publicacion ? \Carbon\Carbon::parse($articulo->fecha_publicacion)->format('d/m/Y') : 'No definida' }}
                    </td>
                    <td>
                        <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 @endif
</div>
@endsection
