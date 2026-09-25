<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PharmaceuticalOrderController extends Controller
{
    // Simula la consulta a la API de Audifarma en tiempo real
    public function checkStock($code)
    {
        return response()->json([
            'success' => true,
            'message' => 'Inventario consultado con éxito en tiempo real.',
            'alternative_branches' => [
                ['name' => 'Sede Norte (Calle 100 con 15)', 'stock' => 30],
                ['name' => 'Sede Centro (Carrera 7 con 32)', 'stock' => 12]
            ]
        ]);
    }

    // Genera el Turno Digital y el Token de Seguridad de un solo uso
    public function generateTokenTicket($code)
    {
        $token = 'AUD-SECURE-' . strtoupper(Str::random(10));
        $expiresAt = now()->addHours(2)->format('d M Y, h:i A');

        return response()->json([
            'success' => true,
            'ticket_number' => 'T-' . rand(10, 99),
            'authorization_token' => $token,
            'expires_at' => $expiresAt,
            'message' => 'Turno y token de seguridad generados correctamente.'
        ]);
    }
}