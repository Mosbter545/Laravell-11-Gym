<?php

use App\Http\Controllers\GYMCONTROLLER;
use App\Http\Controllers\CONTROLADORDELABASE;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ClienteController;

// Rutas públicas
Route::get('/', [GYMCONTROLLER::class, 'inicio'])->name('inicio');
Route::get('/servicios', [GYMCONTROLLER::class, 'servicios'])->name('servicios');
Route::get('/Planes', [GYMCONTROLLER::class, 'planes'])->name('planes');
Route::get('/Horarios', [GYMCONTROLLER::class, 'horarios'])->name('horarios');
Route::get('/Entrenadores', [GYMCONTROLLER::class, 'entrenadores'])->name('entrenadores');
Route::get('/Contacto', [GYMCONTROLLER::class, 'contacto'])->name('contacto');

// Formulario de prueba
Route::get('/prueba', [CONTROLADORDELABASE::class, 'create'])->name('prueba.create');
Route::post('/guardar', [CONTROLADORDELABASE::class, 'store'])->name('guardar.store');

// Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/clientes');
    }

    return back()->withInput()->withErrors([
        'email' => 'Credenciales incorrectas.',
    ]);
})->name('login.submit');

// ✅ Ruta corregida para mostrar clientes desde base de datos
Route::get('/clientes', [ClienteController::class, 'index'])->middleware('auth')->name('clientes');

// Ruta para crear el usuario del dueño (temporal)
Route::get('/crear-dueno', function () {
    $user = \App\Models\User::where('email', 'dueno@fitzone.com')->first();
    if (!$user) {
        \App\Models\User::create([
            'name' => 'Dueño del Gym',
            'email' => 'dueno@fitzone.com',
            'password' => \Illuminate\Support\Facades\Hash::make('12345678')
        ]);
        return "Usuario creado ✅";
    }
    return "Ya existe el usuario.";
});

// Cerrar sesión
Route::post('/logout', function () {
    return view('/');
})->name('logout');

// Rutas extra de login con controlador personalizado (opcional)
use App\Http\Controllers\AuthController;
Route::get('/views/auth/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/views/auth/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/views/auth/login', [AuthController::class, 'panel'])->middleware('auth')->name('panel');
Route::post('/views/auth/login', [AuthController::class, 'logout'])->name('logout');

// Guardar cliente desde formulario
Route::post('/views/admin/guardar', [ClienteController::class, 'store'])->name('guardar.store');
