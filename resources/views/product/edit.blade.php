<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>

    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <h1>Editar producto</h1>

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

    <form action="/product/{{ $product->id }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nombre">Nombre:</label>
        <input
            type="text"
            id="nombre"
            name="nombre"
            value="{{ old('nombre', $product->nombre) }}"
        >

        <label for="precio">Precio:</label>
        <input
            type="number"
            id="precio"
            name="precio"
            value="{{ old('precio', $product->precio) }}"
        >

        <label for="descripcion">Descripción:</label>
        <textarea
            id="descripcion"
            name="descripcion"
        >{{ old('descripcion', $product->descripcion) }}</textarea>

        <label for="categoria">Categoría:</label>
        <input
            type="text"
            id="categoria"
            name="categoria"
            value="{{ old('categoria', $product->categoria) }}"
        >

        <label for="urlimagen">URL de imagen:</label>
        <input
            type="text"
            id="urlimagen"
            name="urlimagen"
            value="{{ old('urlimagen', $product->urlimagen) }}"
        >

        <button type="submit">
            Actualizar producto
        </button>
    </form>

    <br>

    <a href="/product/{{ $product->id }}">
        Volver al producto
    </a>

</body>
</html>