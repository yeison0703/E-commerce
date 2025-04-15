@extends('layouts.app')
@section('content')
<div class="container">
    <h2 style="text-align: center">{{ $producto->nombre }}</h2>
    <div class="row" style="margin-top: 10px">
      <div class="col-md-6">    
        <img src="{{ $producto->imagen }}" alt="{{ $producto->mombre }}" class="img-fluid rounded shadow" width="400" height="400">
      </div>
     <div class="col-md-6" style="justify content: center">
        <h4>Precio: ${{ $producto->precio }}</h4>
        <p><strong>Stock disponible: </strong>{{ $producto->stock }}</p>
        <p><strong>Categoria: </strong>{{ $producto->categoria->nombre }}</p>
        <p>{{ $producto->descripcion }}</p>
        <a href="{{ url()->previous() }}" class="btn btn-light">Volver</a>
        <button type="submit" class="btn btn-secondary">Comprar</button>
     </div>
    </div> 
</div>
@endsection