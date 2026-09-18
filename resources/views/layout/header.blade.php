<header>
    <nav class="navbar">

        <a href="{{ route('products.index') }}" class="navbar-brand">
            Amaz<span class="brand-accent">ing</span>
            <span class="cursor">▌</span>
        </a>

        <ul class="nav-links">

            <li>
                <a href="{{ route('products.index') }}">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('products.index') }}">
                    Inventario
                </a>
            </li>

            <li>
                <a href="{{ route('products.create') }}">
                    Crear producto
                </a>
            </li>

            <li>
                <a href="{{ route('profile.edit') }}">
                    Configuración
                </a>
            </li>

        </ul>

        @auth
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <button type="submit" class="nav-logout">Cerrar sesión</button>
            </form>
        @endauth

    </nav>
</header>