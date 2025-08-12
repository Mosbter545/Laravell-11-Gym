@extends('layouts.app')

@section('titulo', 'Contacto | FitZone')

@section('contenido')
<div class="container mt-5 text-center">
    

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<form action="{{ route('prueba.store') }}" method="POST">
    @csrf

    <input type="text" name="nombre" placeholder="Nombre" required>
    <input type="text" name="apellido" placeholder="Apellido" required>
    <input type="number" name="edad" placeholder="Edad" required>
    <input type="number" name="telefono" placeholder="Teléfono">
    <input type="number" name="peso" placeholder="Peso (kg)" required>
    <input type="number" name="altura" placeholder="Altura (cm)">
    <input type="email" name="email" placeholder="Correo electrónico" required>
    
    <select name="tipodeplan">
        <option value="mensual">Mensual</option>
        <option value="trimestral">Trimestral</option>
        <option value="anual">Anual</option>
    </select>

    <select name="frecuenciadepago" required>
        <option value="">Seleccione frecuencia de pago</option>
        <option value="mensual">Mensual</option>
        <option value="trimestral">Trimestral</option>
        <option value="anual">Anual</option>
    </select>

    <input type="datetime-local" name="fecha_pago" required>

    <button type="submit">Registrar usuario y pago</button>
</form>


</div>
@endsection
