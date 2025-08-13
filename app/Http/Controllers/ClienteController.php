<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
public function index(Request $request)
{
    $clientesQuery = Cliente::query();

    // Filtro plan
    if ($request->filled('filtro_plan')) {
        $clientesQuery->where('tipodeplan', $request->input('filtro_plan'));
    }

    // Filtro teléfono por búsqueda parcial
    if ($request->filled('busqueda_telefono')) {
        $clientesQuery->where('telefono', 'like', '%' . $request->input('busqueda_telefono') . '%');
    }

    // Ordenamientos por columnas (solo uno activo a la vez)
    if ($request->filled('orden_nombre')) {
        $clientesQuery->orderBy('nombre', $request->input('orden_nombre'));
    } elseif ($request->filled('orden_apellido')) {
        $clientesQuery->orderBy('apellido', $request->input('orden_apellido'));
    } elseif ($request->filled('orden_email')) {
        $clientesQuery->orderBy('email', $request->input('orden_email'));
    } elseif ($request->filled('orden_dias')) {

        $orderDirection = $request->input('orden_dias');
        $clientesQuery->orderByRaw("GREATEST(DATEDIFF(DATE_ADD(fecha_pago, INTERVAL 30 DAY), NOW()), 0) $orderDirection");

    } else {
        // Orden por defecto
        $clientesQuery->orderBy('nombre', 'asc');
    }

     $clientes = $clientesQuery->paginate(30)->appends($request->query());

    return view('admin.clientes', compact('clientes'));
}
}