<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratorioController extends Controller
{
    /**
     * Muestra la vista principal del módulo de laboratorios e imágenes.
     */
    public function index()
    {
        return view('laboratorios');
    }

    /**
     * Recibe los resultados enviados por el laboratorio vía Webhook / API.
     */
    public function webhookRecibirResultado(Request $request)
    {
        // Aquí procesas los datos enviados por Synlab / Idime
        return response()->json([
            'success' => true,
            'message' => 'Resultado de laboratorio recibido e interpretado con éxito.'
        ]);
    }
}