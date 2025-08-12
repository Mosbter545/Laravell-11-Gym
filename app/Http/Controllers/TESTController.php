<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\ModeloPAGOS;

class TESTController extends Controller
{
        public function create() {
        return view('layouts.test');
    }

public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'telefono' => 'nullable|numeric',
            'peso' => 'required|integer',
            'altura' => 'nullable|integer',
            'email' => 'required|email|unique:usuarios,email',
            'tipodeplan' => 'nullable|string',
            'frecuenciadepago' => 'required|string',
            'fecha_pago' => 'required|date',
        ]);

        // Crear el usuario
        $usuario = Usuario::create($request->only([
            'nombre', 'apellido', 'edad', 'telefono', 'peso', 'altura', 'email', 'tipodeplan'
        ]));

        // Crear el pago relacionado
         ModeloPAGOS::create([
            'usuario_id' => $usuario->id,
            'frecuenciadepago' => $request->frecuenciadepago,
            'fecha_pago' => $request->fecha_pago,
        ]);

        return redirect()->back()->with('success', 'Usuario y pago registrados con éxito');
    }
}