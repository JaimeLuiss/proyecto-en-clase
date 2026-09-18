@extends('layouts.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>
                <h1>Lista de Productos</h1>

                <p>
                    Administra los productos registrados.
                </p>
            </div>

            <a href="{{ route('products.create') }}" class="btn-primary">
                + Crear Producto
            </a>

        </div>

    </div>

    @if (session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif


    <div class="product-grid-enhanced">

        @forelse ($products as $product)

            @php
                $defaultImage = 'https://mediaassets.pca.org/pages/pca/images/content/04-PCA-Porsche-911-GT3-RS.jpg';

                $imgSrc = $product->urlimagen ?: $defaultImage;
            @endphp

            <div class="product-card">

                <div class="product-image-wrapper">

                    <img
                        src="{{ $imgSrc }}"
                        alt="{{ $product->name }}"
                        class="product-img"
                        onerror="this.onerror=null; this.src='{{ $defaultImage }}';"
                    >

                </div>


                <div class="product-card-body">

                    <span class="product-category">
                        {{ $product->category->name }}
                    </span>

                    <h2>
                        {{ $product->name }}
                    </h2>

                    <p class="product-description">
                        {{ $product->description }}
                    </p>

                    <div class="product-price">
                        ${{ number_format($product->price, 2, ',', '.') }}
                    </div>


                    <div class="product-actions">

                        <a
                            href="{{ route('products.show', $product) }}"
                            class="btn-secondary"
                        >
                            Ver
                        </a>

                        <a
                            href="{{ route('products.edit', $product) }}"
                            class="btn-secondary"
                        >
                            Editar
                        </a>

                        <form
                            action="{{ route('products.destroy', $product) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn-danger"
                                onclick="return confirm('¿Está seguro de eliminar este producto?')"
                            >
                                Eliminar
                            </button>

                        </form>

                    </div>

                </div>

            </div>

        @empty

            <div class="empty-products">
                <p>No hay productos registrados.</p>
            </div>

        @endforelse

    </div>


    <div class="pagination-wrapper">
        {{ $products->links() }}
    </div>

@endsection