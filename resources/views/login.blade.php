<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MediSoft</title>

    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Archivo de estilos personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-dark text-white min-vh-100 d-flex align-items-center justify-content-center position-relative overflow-x-hidden">

    <!-- LUCES NEÓN DE FONDO DECORATIVAS -->
    <div class="position-absolute top-0 start-50 translate-middle-x rounded-circle blur-3xl opacity-20 pointer-events-none"
         style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(124,58,237,0.4) 0%, rgba(0,0,0,0) 70%);"></div>
    <div class="position-absolute bottom-0 start-25 rounded-circle blur-3xl opacity-10 pointer-events-none"
         style="width: 400px; height: 400px; background: radial-gradient(circle, rgba(59,130,246,0.3) 0%, rgba(0,0,0,0) 70%);"></div>

    <div class="container py-5 position-relative z-1">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-4">
                
                <!-- TARJETA GLASSMORPHISM -->
                <div class="card card-medisoft border-slate-800 rounded-3xl p-4 p-sm-5 shadow-2xl backdrop-blur">
                    
                    <!-- ENCABEZADO -->
                    <div class="text-center mb-4">
                        <div class="icon-box icon-purple mx-auto mb-3 d-inline-flex align-items-center justify-content-center rounded-2xl" 
                             style="width: 64px; height: 64px; background: rgba(124, 58, 237, 0.15); border: 1px solid rgba(124, 58, 237, 0.3);">
                            <i class="bi bi-heart-pulse-fill fs-2 text-purple-400"></i>
                        </div>
                        <h2 class="fs-3 fw-bold text-white mb-1">MediSoft</h2>
                        <p class="text-white text-sm mb-0">Sistema de Gestión Médica</p>
                    </div>

                    <!-- ALERTAS DE SESIÓN -->
                    @if(session('success'))
                        <div class="alert alert-success bg-emerald-950-50 border-emerald-800 text-emerald-300 rounded-xl text-sm py-2 px-3 mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger bg-red-950-50 border-red-800 text-red-300 rounded-xl text-sm py-2 px-3 mb-4">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    <!-- FORMULARIO DE LOGIN -->
                    <form action="/login" method="POST">
                        @csrf

                        <!-- CAMPO EMAIL -->
                        <div class="mb-3">
                            <label class="form-label text-xs text-uppercase fw-semibold tracking-wider text-white">
                                Correo electrónico
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-slate-900 border-slate-800 text-white rounded-start-xl">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" 
                                       name="email" 
                                       class="form-control bg-slate-900 border-slate-800 text-white rounded-end-xl py-2.5 text-sm input-dark" 
                                       placeholder="ejemplo@correo.com" 
                                       required>
                            </div>
                        </div>

                        <!-- CAMPO CONTRASEÑA -->
                        <div class="mb-4">
                            <label class="form-label text-xs text-uppercase fw-semibold tracking-wider text-white">
                                Contraseña
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-slate-900 border-slate-800 text-white rounded-start-xl">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password" 
                                       name="password" 
                                       class="form-control bg-slate-900 border-slate-800 text-white rounded-end-xl py-2.5 text-sm input-dark" 
                                       placeholder="••••••••" 
                                       required>
                            </div>
                        </div>

                        <!-- BOTÓN INICIAR SESIÓN -->
                        <button type="submit" class="btn btn-purple-glow w-100 py-2.5 rounded-xl fw-bold text-sm mb-3">
                            <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                        </button>
                    </form>

                    <!-- BOTÓN REGISTRARSE -->
                    <a href="/registro" class="btn btn-outline-slate w-100 py-2.5 rounded-xl fw-semibold text-sm mb-4">
                        Crear una cuenta nueva
                    </a>

                    <!-- VOLVER AL INICIO -->
                    <div class="text-center border-top border-slate-800 pt-3">
                        <a href="/" class="text-xs text-white hover-text-white text-decoration-none">
                            <i class="bi bi-arrow-left me-1"></i>Volver al inicio
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>