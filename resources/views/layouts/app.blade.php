<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="/style.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @auth
        @include('layouts.navigation')
    @endauth

    @include('layout.header')

    @isset($header)
        <header class="bg-white shadow">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endisset

    <main class="container">
        @yield('content')

        {{ $slot ?? '' }}
    </main>

    @include('layout.footer')
</body>
</html>