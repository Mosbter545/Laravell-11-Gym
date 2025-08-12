<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('titulo', 'FitZone - Tu gimnasio en línea')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Íconos de Bootstrap (opcional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    
    <!-- Tu CSS personalizado -->
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

    @stack('styles') {{-- Para agregar estilos adicionales desde las vistas --}}
    
</head>
<body>

    @include('components.navbar')

    <main class="py-4">
        @yield('contenido')
    </main>

    {{-- Footer como componente (opcional) --}}
    <x-footer />

    <!-- Bootstrap JS con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scripts personalizados -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts') {{-- Para scripts adicionales desde vistas --}}
</body>
</html>
