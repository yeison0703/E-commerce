@extends('layouts.app')
@section('content')
<div class="container">
    <h2 style="text-align: center">Productos de la categoria: {{ $categoria->nombre }}</h2>
    @if ($productos->isEmpty())
        <p style="text-align: center">No hay productos disponibles en esta categoría.</p>
        <br>
    @else <div style="display: flex; flex-wrap: wrap; gap:20px; margin-top: 20px;">

        @foreach ($productos as $producto)
        <div style="border: 1px solid #ccc; padding: 15px; width: 200px; text-align: center;">
            <img src="{{ $producto->imagen }}" alt="imagen del producto" width="100">
            <h5>{{ $producto->nombre }}</h5>
            <p>${{ $producto->precio }}</p>
        </div>
        @endforeach
    </div>
    @endif
    <br>
    <a href="{{ url('/') }}" class="btn btn-outline-dark">Volver al catalogo</a>
</div>
@endsection