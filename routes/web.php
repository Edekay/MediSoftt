<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EspecialistaController;
use App\Http\Controllers\AdminController;

// INICIO
Route::get('/', function () {
    return view('index');
});

// LOGIN
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login']);

// REGISTRO
Route::get('/registro', function () {
    return view('registro');
});

Route::post('/registro', [RegistroController::class, 'registrar']);

// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ESPECIALISTAS
Route::get('/especialistas', function () {
    return view('especialistas');
}); 

// CITAS
Route::get('/citas', [CitaController::class, 'create'])
    ->name('citas.create');

Route::post('/citas', [CitaController::class, 'store'])
    ->name('citas.store');

// HISTORIAL
Route::get('/historial', [CitaController::class, 'historial']);

// PRUEBA BASE DE DATOS
Route::get('/prueba-db', function () {
    $citas = DB::table('citas')->get();

    return $citas;
});

// NOTIFICACIONES
Route::get('/notificaciones', function () {
    return view('notificaciones');
});

Route::get('/audifarma', function () {
    return view('audifarma');
});

use App\Http\Controllers\PharmaceuticalOrderController;

Route::get('/api/audifarma/stock/{code}', [PharmaceuticalOrderController::class, 'checkStock']);
Route::post('/api/audifarma/ticket/{code}', [PharmaceuticalOrderController::class, 'generateTokenTicket']);

use App\Http\Controllers\LaboratorioController;

Route::get('/laboratorios', [LaboratorioController::class, 'index'])->name('laboratorios.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

use Illuminate\Support\Facades\Auth;

Route::get('/dashboard', function () {
    // Si es administrador, lo redirige al panel chulo que acabamos de hacer
    if (Auth::user() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    // Si es un usuario normal, le muestra su vista de paciente habitual
    return view('dashboard'); 
})->middleware(['auth'])->name('dashboard');

