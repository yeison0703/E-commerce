@extends('layouts.app')

@section('content')
<div class="container">

    <h1 style="text-align: center">Lista de Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-secondary">Agregar Nuevo Producto</a>


    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if ($productos->isEmpty())
        <p>No hay productos registrados.</p>
    @else
    
    <table class="table table-dark table-hover mt-4" style="justify-content: center">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Fecha de creación</th>  
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->descripcion }}</td>
                <td>${{ $producto->precio }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->categoria->nombre ?? 'sin categoria' }}</td>
                <td class="p-0 m-0" style="justify-content: center; display: flex; align-items: center;width:100%;object-fit: cover;">
                    {{-- Si la imagen no es nula, mostrarla, de lo contrario mostrar "Sin imagen" --}}
                    @if ($producto->imagen)
                        <img src="{{ e($producto->imagen) }}" width="80" alt="imagen del producto">
                    @else
                        Sin imagen
                    @endif
                </td>
                <td>{{ $producto->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
     </table>
    </div>
    </div>
    @endif
</div>
@endsection