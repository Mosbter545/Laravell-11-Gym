@extends('layouts.app')

@section('titulo', 'Horarios | FitZone')

@section('contenido')
<div class="container mt-5 text-center">
    <h2>Horarios de Clases</h2>
    <table class="table table-striped mt-4">
        <thead class="table-dark">
            <tr><th>Día</th><th>Mañana</th><th>Tarde</th></tr>
        </thead>
        <tbody>
            <tr><td>Lunes a Viernes</td><td>6:00 AM - 12:00 PM</td><td>2:00 PM - 9:00 PM</td></tr>
            <tr><td>Sábados</td><td>7:00 AM - 1:00 PM</td><td>Cerrado</td></tr>
            <tr><td>Domingos</td><td colspan="2">Cerrado</td></tr>
        </tbody>
    </table>
</div>
@endsection
