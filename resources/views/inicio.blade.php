@extends('layouts.app')

@section('titulo', 'Inicio')


@section('contenido')



    {{-- Encabezado principal con fondo oscuro --}}
    <section class="bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Bienvenido a FitZone</h1>
            <p class="lead">¡Transforma tu cuerpo y tu mente con nosotros!</p>
            <a class="btn btn-warning btn-lg mt-3" href="{{ route('planes') }}">Ver Planes</a>

        </div>
    </section>

    {{-- Sección de presentación --}}
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="mb-4">¿Qué te ofrecemos?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <i class="bi bi-person-raised-hand display-4 text-primary mb-3"></i>
                    <h5>Entrenadores profesionales</h5>
                    <p>Personal capacitado que te guía paso a paso según tus objetivos.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-clock-history display-4 text-success mb-3"></i>
                    <h5>Horarios flexibles</h5>
                    <p>Elige el horario que más se adapta a tu rutina, mañana o noche.</p>
                </div>
                <div class="col-md-4">
                    <i class="bi bi-heart-pulse display-4 text-danger mb-3"></i>
                    <h5>Clases grupales</h5>
                    <p>Zumba, spinning, HIIT y más para mantenerte motivado.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Llamado final --}}
    <section class="py-5 bg-warning text-dark text-center">
        <div class="container">
            <h2 class="fw-bold">¡Empieza hoy!</h2>
            <p class="mb-3">Únete ahora y recibe una clase gratis de evaluación física.</p>
            <a href="#" class="btn btn-dark">Contáctanos</a>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    
@endsection