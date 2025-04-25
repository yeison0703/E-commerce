@extends('layouts.blog')

@section('content')

<div class="container mt-4">
    <h2 class="text-center mb-4">Articulos destacados</h2>
    <div class="row">
        @forelse ($articulos as $articulo)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                @if ($articulo->imagen_destacada)
               <img src="{{ $articulo->imagen_destacada }}" class="card-img-top" alt="Imagen del articulo" style="height: 200px; object-fit:cover;">
               @endif

               <div class="card-body d-flex flex-column justify-content-between">
                <h5 class="card-title">{{ $articulo->titulo }}</h5>
                <p class="card-text">
                    {{ Str::limit(strip_tags($articulo->contenido),100) }}
                </p>
                <a href="{{ route('articulos.show',$articulo->id) }}" class="btn btn-secondary btn-sm mt-auto">Ver Articulo</a>
               </div>
            </div>
        </div>
            
        @empty
        <p>No hay articulos para mostrar</p>            
        @endforelse
    </div>
</div>
@endsection
