@extends('layouts.app')

@section('titulo', 'Ingreso')

@section('contenido')
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="text-center mb-4">Ingreso del Dueño</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="mb-3">
            <label>Usuario (email)</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>
        <div class="mb-3">
            <label>Contraseña</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary" type="submit">Ingresar</button>
        </div>
    </form>
</div>
@endsection

