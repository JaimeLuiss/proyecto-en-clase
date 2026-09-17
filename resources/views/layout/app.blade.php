<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Inventario de Productos - Amazing
    </title>

    <link
        rel="stylesheet"
        href="/style.css"
    >

</head>

<body>

    @include('layout.header')


    <main class="container">

        @yield('content')

    </main>


    @include('layout.footer')

</body>

</html>