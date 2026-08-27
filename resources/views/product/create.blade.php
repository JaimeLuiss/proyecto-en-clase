@extends('layout.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>

                <h1>
                    Crear producto
                </h1>

                <p>
                    Registra un nuevo producto en el inventario.
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
        action="/product"
        method="POST"
    >

        @csrf


        <label for="nombre">
            Nombre:
        </label>

        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre') }}"
        >


        <label for="precio">
            Precio:
        </label>

        <input
            type="number"
            id="precio"
            name="precio"
            value="{{ old('precio') }}"
        >


        <label for="descripcion">
            Descripción:
        </label>

        <textarea
            id="descripcion"
            name="descripcion"
        >{{ old('descripcion') }}</textarea>


        <label for="categoria">
            Categoría:
        </label>

        <input
            type="text"
            id="categoria"
            name="categoria"
            value="{{ old('categoria') }}"
        >


        <label for="urlimagen">
            URL de imagen:
        </label>

        <input
            type="text"
            id="urlimagen"
            name="urlimagen"
            value="{{ old('urlimagen') }}"
        >


        <br>

        <button type="submit">
            Crear producto
        </button>

    </form>

@endsection