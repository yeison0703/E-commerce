@extends('layouts.blog')
@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Categorias</h2>

 @auth
 <a href="{{ route('categorias_blog.create') }}" class="btn btn-secondary">Agregar Nueva Categoria</a>
 @endauth 

   @if(session('success'))
   <div style="color: green;">
       {{ session('success') }}
   </div>
   @endif

   @if ($categorias->isEmpty())
        <p>No hay categorías registradas.</p>
    @else
        <table class="table table-dark table-hover mt-4" style="justify-content: center">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    @auth <th class="col-2" >Acciones</th> @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        @auth
                        <td>
                            <a href="{{ route('categorias_blog.edit', $categoria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('categorias_blog.destroy', $categoria->id) }}" method="POST" style="display:inline;">
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