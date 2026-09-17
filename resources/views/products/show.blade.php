@extends('layouts.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>

                <h1>Detalle del Producto</h1>

                <p>
                    Información del producto seleccionado.
                </p>

            </div>

            <a href="{{ route('products.index') }}">
                Volver a productos
            </a>

        </div>

    </div>

    <div class="product">

        <h2>
            {{ $product->name }}
        </h2>

        <p>
            <strong>ID:</strong>
            {{ $product->id }}
        </p>

        <p>
            <strong>Precio:</strong>
            ${{ number_format($product->price, 2, ',', '.') }}
        </p>

        <p>
            <strong>Descripción:</strong>
            {{ $product->description }}
        </p>

        <p>
            <strong>Categoría:</strong>
            {{ $product->category->name }}
        </p>

        <br>

        <a href="{{ route('products.edit', $product) }}">
            Editar producto
        </a>

        <br>
        <br>

        <form
            action="{{ route('products.destroy', $product) }}"
            method="POST"
            style="display:inline;"
        >

            @csrf
            @method('DELETE')

            <button
                type="submit"
                onclick="return confirm('¿Está seguro de que desea eliminar este producto?')"
            >
                Eliminar producto
            </button>

        </form>

    </div>

@endsection