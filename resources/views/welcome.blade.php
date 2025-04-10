@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Explora nuestras categorías</h2>

    <div id="categoriasCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @php
                $imagenes = [
                    'Horneados'=>'https://st.depositphotos.com/1011514/1833/i/450/depositphotos_18339921-stock-photo-baked-goods.jpg',
                    'Dulces'=>'https://d100mj7v0l85u5.cloudfront.net/s3fs-public/2023-03/asi-esta-el-mercado-de-dulces-en-colombia_0.png',
                    'Bebidas'=>'https://www.noticiasneo.com/sites/default/files/2023-01/bebidasNAok.png',
                    //agregar nombre y url para mas categorias
                 ];
            @endphp

            @foreach ($categorias as $index => $categoria)
                <div class="carousel-item @if($index == 0) active @endif">
                    <div class="d-flex justify-content-center align-items-center flex-column" style="height: 500px;">

                        <img src="{{ $imagenes[$categoria->nombre] ?? 'https://via.placeholder.com' }}" class="d-block w-100" alt="{{ $categoria->nombre }}"
                        style="height: 350px; object-fit: cover;">

                        <h5 class="mt-3">{{ $categoria->descripcion }}</h5>

                        <a href="{{ route('categorias.producto', $categoria->id) }}" class="btn btn-secondary">
                            {{ $categoria->nombre }}
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <style>
            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-color: #000;
                border-radius: 20%; 
            }
        </style>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#categoriasCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#categoriasCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</div>
@endsection