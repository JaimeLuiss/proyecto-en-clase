@extends('layout.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>

                <h1>
                    Editar producto
                </h1>

                <p>
                    Modifica la información del producto.
                </p>

            </div>

            <a href="/product">
                Volver a productos
            </a>

        </div>

    </div>


    @if ($errors->any())

        <div class="errors">

            <strong>
                Hay errores en el formulario:
            </strong>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        action="/product/{{ $product->id }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <label for="nombre">
            Nombre:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $product->nombre) }}"
        >


        <label for="precio">
            Precio:
        </label>

        <input
            type="number"
            id="precio"
            name="precio"
            value="{{ old('precio', $product->precio) }}"
        >


        <label for="descripcion">
            Descripción:
        </label>

        <textarea
            id="descripcion"
            name="descripcion"
        >{{ old('descripcion', $product->descripcion) }}</textarea>


        <label for="categoria">
            Categoría:
        </label>

        <input
            type="text"
            id="categoria"
            name="categoria"
            value="{{ old('categoria', $product->categoria) }}"
        >


        <label for="urlimagen">
            URL de imagen:
        </label>

        <input
            type="text"
            id="urlimagen"
            name="urlimagen"
            value="{{ old('urlimagen', $product->urlimagen) }}"
        >


        <br>

        <button type="submit">
            Actualizar producto
        </button>

    </form>

@endsection