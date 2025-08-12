@extends('layouts.app')

@section('titulo', 'Panel del Dueño')

@section('contenido')
<div class="container mt-5">
    <h2 class="mb-3">Bienvenido, {{ Auth::user()->name }}</h2>
    <p class="mb-4">Aquí puedes gestionar la información de tus clientes, entrenadores y planes de membresía.</p>

    <!-- Puedes agregar aquí una tabla, resumen o enlaces a secciones administrativas -->

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-danger">Cerrar sesión</button>
    </form>
</div>
@endsection
