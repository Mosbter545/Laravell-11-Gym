<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\ModeloPAGOS;
use App\Models\ModeloSUSCRIPCIONES;
use App\Models\ModeloCLASES;
use Illuminate\Support\Carbon;

class CONTROLADORDELABASE extends Controller
{
    public function store(Request $request)
    {
        // Validación base
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'edad' => 'required|integer|min:0',
            'telefono' => 'nullable|numeric',
            'peso' => 'required|integer',
            'altura' => 'nullable|integer',
            'email' => 'required|email|unique:usuarios,email',
            'tipodeplan' => 'required|string',
            'frecuenciadepago' => 'required|string',
            'fecha_pago' => 'required|date',
            'objetivo' => 'nullable|string',
            'entrenador' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'nutricionista' => 'nullable|string',
        ]);

        // Crear clase relacionada
        $clase = ModeloCLASES::create([
            'objetivo' => $request->objetivo,
            'descripcion' => $request->descripcion,
            'entrenador' => $request->entrenador,
            'nutricionista' => strtolower($request->tipodeplan) === 'premium' ? $request->nutricionista : null,
        ]);

        // Crear usuario (puedes agregar clase_id si lo usas)
        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'edad' => $request->edad,
            'telefono' => $request->telefono,
            'peso' => $request->peso,
            'altura' => $request->altura,
            'email' => $request->email,
            // 'clase_id' => $clase->id, // ← solo si tienes esta relación en tu tabla usuarios
        ]);

        // Precio según plan
                $precios = [
                    'basico' => 300,
                    'plus' => 500,
                    'premium' => 800,
                    'personalizado' => 1000,
                ];


        $plan = strtolower($request->tipodeplan);
        if (!array_key_exists($plan, $precios)) {
            return back()->withErrors(['tipodeplan' => 'Plan no válido']);
        }

        $precio = $precios[$plan];

        // Crear pago
        ModeloPAGOS::create([
            'usuario_id' => $usuario->id,
            'frecuenciadepago' => $request->frecuenciadepago,
            'precio' => $precio,
            'fecha_pago' => $request->fecha_pago,
        ]);

        // Calcular fechas de suscripción
        $fechaInicio = Carbon::parse($request->fecha_pago);
        $dias = match (strtolower($request->frecuenciadepago)) {
            'mensual' => 30,
            'quincenal' => 15,
            'semanal' => 7,
            default => 30,
        };
        $fechaFin = $fechaInicio->copy()->addDays($dias);

        // Registrar suscripción
        ModeloSUSCRIPCIONES::create([
            'usuario_id' => $usuario->id,
            'tipodeplan' => ucfirst($plan),
            'precio' => $precio,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
        ]);

        return response('success');
    }
}
