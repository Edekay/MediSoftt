<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
        'nombre_completo',
        'especialidad',
        'fecha',
        'hora',
        'tipo_consulta',
        'motivo',
        'estado',
    ];
}