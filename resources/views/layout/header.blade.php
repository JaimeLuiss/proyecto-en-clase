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
                <a href="#">
                    Configuración
                </a>
            </li>

        </ul>

    </nav>
</header>