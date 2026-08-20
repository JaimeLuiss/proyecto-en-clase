<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->nombre }}</title>

    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <h1>Detalle del producto</h1>

    <div class="product">

        <h2>{{ $product->nombre }}</h2>

        <p>
            <strong>ID:</strong>
            {{ $product->id }}
        </p>

        <p>
            <strong>Precio:</strong>
            ${{ number_format($product->precio, 0, ',', '.') }}
        </p>

        <p>
            <strong>Descripción:</strong>
            {{ $product->descripcion }}
        </p>

        <p>
            <strong>Categoría:</strong>
            {{ $product->categoria }}
        </p>

        @if ($product->urlimagen)
            <img
                src="{{ $product->urlimagen }}"
                alt="{{ $product->nombre }}"
            >
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

        <br>

        <a href="/product">
            Volver a productos
        </a>

    </div>

</body>
</html>