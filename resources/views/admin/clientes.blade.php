@extends('layouts.app')

@section('titulo', 'Clientes')

@section('contenido')
<div class="container mt-5">

<div class="mb-3 text-end">
    <a href="{{ route('login') }}" class="btn btn-danger">
        <i class="bi bi-box-arrow-right"></i> Salir
    </a>
</div>


    <h2 class="mb-4 text-center">Clientes Registrados</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Plan</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Días Restantes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->tipodeplan }}</td>
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
</div>
@endsection
