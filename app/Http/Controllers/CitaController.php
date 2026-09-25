<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function create()
    {
        $citas = Cita::orderBy('fecha', 'asc')
                     ->orderBy('hora', 'asc')
                     ->get();

        return view('citas', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'especialidad' => 'required|string|max:100',
            'fecha' => 'required|date',
            'hora' => 'required',
            'tipo_consulta' => 'required|in:Presencial,Teleconsulta',
            'motivo' => 'required|string',
        ]);

        Cita::create([
            'nombre_completo' => $request->nombre_completo,
            'especialidad' => $request->especialidad,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'tipo_consulta' => $request->tipo_consulta,
            'motivo' => $request->motivo,
            'estado' => 'Confirmada',
        ]);

        return redirect('/citas')
            ->with('success', '¡Cita solicitada correctamente!');
    }

    public function historial()
    {
        $citas = Cita::orderBy('fecha', 'desc')
                     ->orderBy('hora', 'desc')
                     ->get();

        $totalCitas  = $citas->count();
        $confirmadas = $citas->where('estado', 'Confirmada')->count(); // <-- Agregado
        $atendidas   = $citas->where('estado', 'Atendida')->count();
        $canceladas  = $citas->where('estado', 'Cancelada')->count();

        return view('historial', compact(
            'citas',
            'totalCitas',
            'confirmadas', // <-- Agregado
            'atendidas',
            'canceladas'
        ));
    }
}