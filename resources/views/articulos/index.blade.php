@extends('layouts.blog')

@section('content')
<div class="container">

    <h1 style="text-align: center">Lista de Articulos</h1>

   @auth
       
   <a href="{{ route('articulos.create') }}" class="btn btn-secondary">Agregar Nuevo Articulo</a>
   @endauth

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
               @auth <th class="col-2" >Acciones</th> @endauth
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
                   @auth
                       
                    <td>
                        <a href="{{ route('articulos.edit', $articulo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('articulos.destroy', $articulo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                    @endauth
                </tr>
            @endforeach
        </tbody>
    </table>
 @endif
</div>
@endsection
