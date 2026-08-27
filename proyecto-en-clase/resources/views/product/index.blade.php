@extends('layout.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>

                <h1>
                    Listado de productos
                </h1>

                <p>
                    Administra los productos registrados.
                </p>

            </div>

            <a href="/product/create">
                Crear producto
            </a>

        </div>

    </div>


    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <div class="command-bar">

        <span>
            Productos
        </span>

    </div>


    <div class="product-grid-enhanced">

        @forelse ($products as $product)

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
                    {{ $product->descripcion }}
                </p>


                <p>
                    <strong>
                        ${{ number_format($product->precio, 0, ',', '.') }}
                    </strong>
                </p>


                <p>

                    <strong>
                        Categoría:
                    </strong>

                    {{ $product->categoria }}

                </p>


                <a href="/product/{{ $product->id }}">
                    Ver producto
                </a>

            </div>

        @empty

            <p>
                No hay productos registrados.
            </p>

        @endforelse

    </div>

@endsection