@extends('layouts.app')

@section('titulo', 'Clientes')

@section('contenido')
<div class="container mt-5 d-flex flex-column min-vh-100">

<div class="mb-3 text-end">
    <a href="{{ route('login') }}" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Salir
    </a>
</div>
<h2 class="mb-4 text-center">Clientes Registrados</h2>
<form method="GET" action="{{ url('/clientes') }}">
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>
                    Nombre
                    <select name="orden_nombre" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="">-</option>
                        <option value="asc" {{ request('orden_nombre') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request('orden_nombre') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </th>
                <th>
                    Apellido
                    <select name="orden_apellido" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="">-</option>
                        <option value="asc" {{ request('orden_apellido') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request('orden_apellido') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </th>
                <th>
                    Plan
                    <select name="filtro_plan" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="">Todos</option>
                        <option value="basico" {{ request('filtro_plan') == 'basico' ? 'selected' : '' }}>Básico</option>
                        <option value="plus" {{ request('filtro_plan') == 'plus' ? 'selected' : '' }}>Plus</option>
                        <option value="premium" {{ request('filtro_plan') == 'premium' ? 'selected' : '' }}>Premium</option>
                        <option value="personalizado" {{ request('filtro_plan') == 'personalizado' ? 'selected' : '' }}>Personalizado</option>
                    </select>
                </th>
                <th>
                    Email
                    <select name="orden_email" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="">-</option>
                        <option value="asc" {{ request('orden_email') == 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request('orden_email') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </th>
                <th>
                    Teléfono
                    <input type="text" name="busqueda_telefono" value="{{ request('busqueda_telefono') }}" class="form-control form-control-sm" placeholder="Buscar..." oninput="this.form.submit()">
                </th>
                <th>
                    Días Restantes
                    <select name="orden_dias" onchange="this.form.submit()" class="form-select form-select-sm">
                        <option value="">-</option>
                        <option value="asc" {{ request('orden_dias') == 'asc' ? 'selected' : '' }}>Descendente</option>
                        <option value="desc" {{ request('orden_dias') == 'desc' ? 'selected' : '' }}>Ascendente</option>
                    </select>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ ucfirst($cliente->tipodeplan) }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>
                        @php
                            $fechaPago = \Carbon\Carbon::parse($cliente->fecha_pago);
                            $diasPasados = $fechaPago->diffInDays(now());
                            $diasRestantes = max(0, 30 - $diasPasados);
                        @endphp
                        {{ (int) $diasRestantes }} {{ $diasRestantes == 1 ? 'día' : 'días' }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </form>

    <script>
    document.querySelectorAll('select[name^="orden_"]').forEach(select => {
        select.addEventListener('change', function() {
            // Al cambiar un select de orden
            const currentName = this.name;
            // Limpiar todos los otros selects de orden excepto el actual
            document.querySelectorAll('select[name^="orden_"]').forEach(otherSelect => {
                if (otherSelect.name !== currentName) {
                    otherSelect.value = '';
                }
            });
            // Enviar el formulario
            this.form.submit();
        });
    });
    </script>

</div>
@endsection


