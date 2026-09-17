@extends('layout.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>

                <h1>
                    Detalle del producto
                </h1>

                <p>
                    Información del producto seleccionado.
                </p>

            </div>

            <a href="/product">
                Volver a productos
            </a>

        </div>

    </div>


    <div class="product">

        @if ($product->urlimagen)

            @php
                $imgSrc = $product->urlimagen;
                if (!preg_match('/^https?:\/\//i', $imgSrc)) {
                    $imgSrc = asset($imgSrc);
                }
            @endphp

            <img
                src="{{ $imgSrc }}"
                alt="{{ $product->nombre }}"
                class="product-img"
            >

        @endif


        <h2>
            {{ $product->nombre }}
        </h2>


        <p>

            <strong>
                ID:
            </strong>

            {{ $product->id }}

        </p>


        <p>

            <strong>
                Precio:
            </strong>

            ${{ number_format($product->precio, 0, ',', '.') }}

        </p>


        <p>

            <strong>
                Descripción:
            </strong>

            {{ $product->descripcion }}

        </p>


        <p>

            <strong>
                Categoría:
            </strong>

            {{ $product->categoria }}

        </p>


        @if ($product->urlimagen)

            <p>

                <strong>
                    URL de imagen:
                </strong>

                {{ $product->urlimagen }}

            </p>

        @endif


        <br>


        <a href="/product/{{ $product->id }}/edit">
            Editar producto
        </a>


        <br><br>


        <form
            action="/product/{{ $product->id }}"
            method="POST"
            onsubmit="return confirm('¿Está seguro de que desea eliminar este producto?');"
        >

            @csrf

            @method('DELETE')

            <button type="submit">
                Eliminar producto
            </button>

        </form>

    </div>

@endsection