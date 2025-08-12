@extends('layouts.app')

@section('titulo', 'Entrenadores | FitZone')

@section('contenido')
<div class="container mt-5 text-center">
    <h2 class="mb-5">Conoce a Nuestros Entrenadores Estrella</h2>
    <div class="row g-4 justify-content-center">

        <!-- Entrenador 1 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="https://randomuser.me/api/portraits/women/44.jpg" class="mx-auto d-block rounded-circle mt-4" alt="Laura Torres" style="width: 120px; height: 120px; object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title">Laura Torres</h4>
                    <h6 class="text-primary">Especialista en Fitness Funcional</h6>
                    <p class="card-text text-muted">🏋️‍♀️ Dinámica, energética y apasionada por el movimiento. Con más de 5 años de experiencia, Laura transforma cada clase en una experiencia divertida y desafiante. Ideal para quienes buscan mejorar su resistencia, movilidad y bienestar general.</p>
                </div>
            </div>
        </div>

        <!-- Entrenador 2 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="https://randomuser.me/api/portraits/men/47.jpg" class="mx-auto d-block rounded-circle mt-4" alt="Carlos Díaz" style="width: 120px; height: 120px; object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title">Carlos Díaz</h4>
                    <h6 class="text-success">Entrenador de Musculación y Fuerza</h6>
                    <p class="card-text text-muted">💪 Con una trayectoria de más de 8 años en entrenamiento de alto rendimiento, Carlos es experto en desarrollo muscular, técnicas de levantamiento y rutinas de fuerza personalizadas. Su enfoque técnico y motivador saca lo mejor de cada atleta.</p>
                </div>
            </div>
        </div>

        <!-- Entrenadora 3 -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="https://randomuser.me/api/portraits/women/65.jpg" class="mx-auto d-block rounded-circle mt-4" alt="Valeria Gómez" style="width: 120px; height: 120px; object-fit: cover;">
                <div class="card-body">
                    <h4 class="card-title">Valeria Gómez</h4>
                    <h6 class="text-danger">Coach Personal y Nutricional</h6>
                    <p class="card-text text-muted">🥗 Apasionada por la transformación personal, Valeria combina entrenamiento físico con asesoría en hábitos saludables. Experta en acompañamiento individualizado, ideal para quienes inician desde cero o quieren un cambio completo de vida.</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
