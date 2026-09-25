<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();
        $usuariosAdmin = User::where('role', 'admin')->count();
        $usuariosNormales = $totalUsuarios - $usuariosAdmin;

        return view('admin.dashboard', compact('totalUsuarios', 'usuariosAdmin', 'usuariosNormales'));
    }
}