@extends('layouts.app')

@section('content')

    <div class="catalog-header">

        <div class="catalog-header-top">

            <div>
                <h1>Nuevo Producto</h1>

                <p>
                    Registra un nuevo producto.
                </p>
            </div>

            <a href="{{ route('products.index') }}">
                Volver a productos
            </a>

        </div>

    </div>

    @if ($errors->any())

        <div class="errors">

            <strong>Hay errores en el formulario:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form
        action="{{ route('products.store') }}"
        method="POST"
    >

        @csrf

        <div>

            <label for="name">
                Nombre:
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
            >

            @error('name')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <br>

        <div>

            <label for="category_id">
                Categoría:
            </label>

            <select
                id="category_id"
                name="category_id"
            >

                <option value="">
                    -- Seleccione una categoría --
                </option>

                @foreach ($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

            @error('category_id')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <br>

        <div>

            <label for="price">
                Precio:
            </label>

            <input
                type="number"
                step="0.01"
                id="price"
                name="price"
                value="{{ old('price') }}"
            >

            @error('price')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <br>

        <div>

            <label for="description">
                Descripción:
            </label>

            <textarea
                id="description"
                name="description"
            >{{ old('description') }}</textarea>

            @error('description')
                <small style="color:red;">
                    {{ $message }}
                </small>
            @enderror

        </div>

        <br>

        <button type="submit">
            Guardar Producto
        </button>

    </form>

@endsection