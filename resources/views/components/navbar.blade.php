<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container">
        <a class="navbar-brand fw-bold text-uppercase" href="{{ route('inicio') }}">
            <i class="bi bi-lightning-fill text-warning me-1"></i> FitZone
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('servicios') ? 'active' : '' }}" href="{{ route('servicios') }}">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('entrenadores') ? 'active' : '' }}" href="{{ route('entrenadores') }}">Entrenadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('horarios') ? 'active' : '' }}" href="{{ route('horarios') }}">Horarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('planes') ? 'active' : '' }}" href="{{ route('planes') }}">Planes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                </li>

                <!-- Botón Ingresar -->
                <li class="nav-item ms-3">
                    <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Ingresar
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
