@extends('layouts.app')
@section('title', 'Bienvenido a la Tienda')
@section('content')
<h1>Bienvenido</h1>
<p>Este es el sistema de gestion del e-commerce</p>
<a href="{{ route('productos.index') }}" class="btn btn-primary">Ver Productos</a>
<p>Para comenzar, puedes ver la lista de productos disponibles.</p>
@endsection