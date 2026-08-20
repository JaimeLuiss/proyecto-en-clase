<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <h1>Listado de productos</h1>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="/product/create">
        Crear producto
    </a>

    <hr>

    @forelse ($products as $product)

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

            <a href="/product/{{ $product->id }}">
                Ver producto
            </a>

        </div>

    @empty

        <p>No hay productos registrados.</p>

    @endforelse

</body>
</html>