@extends('layouts.app')

@section('titulo', 'Servicios | FitZone')

@section('contenido')
<div class="container mt-5 text-center">
    <h2>¿Qué te ofrecemos?</h2>
    <div class="row mt-4">
        <div class="col-md-3">
            <i class="bi bi-person-fill text-primary display-4"></i>
            <h5>Entrenadores profesionales</h5>
            <p>Te guían paso a paso.</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-clock-fill text-success display-4"></i>
            <h5>Horarios flexibles</h5>
            <p>Se adaptan a ti.</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-heart-pulse-fill text-danger display-4"></i>
            <h5>Rutinas personalizadas</h5>
            <p>Hechas a tu medida.</p>
        </div>
        <div class="col-md-3">
            <i class="bi bi-egg-fried text-warning display-4"></i>
            <h5>Nutricionistas profesionales</h5>
            <p>Plan de alimentación saludable.</p>
        </div>
    </div>
</div>
@endsection
