<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | MediSoft</title>

    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Archivo de estilos personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .input-dark::placeholder {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        .input-dark {
            color: #ffffff !important;
        }
    </style>
</head>

<body class="bg-dark text-white min-vh-100 d-flex align-items-center justify-content-center position-relative overflow-x-hidden">

    <!-- LUZ MORADA CENTRADA DETRÁS DE LA TARJETA -->
    <div class="position-absolute top-50 start-50 translate-middle rounded-circle pointer-events-none"
         style="width: 500px; height: 500px; background: radial-gradient(circle, rgba(124, 58, 237, 0.45) 0%, rgba(0,0,0,0) 70%); filter: blur(40px); z-index: 0;"></div>

    <!-- LUZ AZUL INFERIOR SUAVE -->
    <div class="position-absolute bottom-0 start-50 translate-middle-x rounded-circle pointer-events-none"
         style="width: 400px; height: 300px; background: radial-gradient(circle, rgba(59, 130, 246, 0.25) 0%, rgba(0,0,0,0) 70%); filter: blur(50px); z-index: 0;"></div>

    <!-- CONTENEDOR PRINCIPAL -->
    <div class="container my-auto position-relative z-1 py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                
                <!-- TARJETA GLASSMORPHISM -->
                <div class="card card-medisoft border-slate-800 rounded-3xl p-4 p-sm-5 shadow-2xl">
                    
                    <!-- ENCABEZADO -->
                    <div class="text-center mb-4">
                        <div class="icon-box icon-purple mx-auto mb-3 d-inline-flex align-items-center justify-content-center rounded-2xl" 
                             style="width: 64px; height: 64px; background: rgba(124, 58, 237, 0.15); border: 1px solid rgba(124, 58, 237, 0.3);">
                            <i class="bi bi-person-plus-fill fs-2 text-purple-400"></i>
                        </div>
                        <h2 class="fs-3 fw-bold text-white mb-1">Crear cuenta</h2>
                        <p class="text-white-50 text-sm mb-0">Regístrate en MediSoft para gestionar tus citas médicas.</p>
                    </div>

                    <!-- FORMULARIO DE REGISTRO -->
                    <form action="/registro" method="POST">
                        @csrf

                        <!-- CAMPO NOMBRE -->
                        <div class="mb-3">
                            <label class="form-label text-xs text-uppercase fw-semibold tracking-wider text-white">
                                Nombre completo
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-slate-900 border-slate-800 text-white rounded-start-xl">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" 
                                       name="name" 
                                       class="form-control bg-slate-900 border-slate-800 text-white rounded-end-xl py-2.5 text-sm input-dark" 
                                       placeholder="Ingrese su nombre completo" 
                                       required>
                            </div>
                        </div>

                        <!-- CAMPO CORREO -->
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
                        <div class="mb-3">
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

                        <!-- CAMPO CONFIRMAR CONTRASEÑA -->
                        <div class="mb-4">
                            <label class="form-label text-xs text-uppercase fw-semibold tracking-wider text-white">
                                Confirmar contraseña
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-slate-900 border-slate-800 text-white rounded-start-xl">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input type="password" 
                                       name="password_confirmation" 
                                       class="form-control bg-slate-900 border-slate-800 text-white rounded-end-xl py-2.5 text-sm input-dark" 
                                       placeholder="••••••••" 
                                       required>
                            </div>
                        </div>

                        <!-- BOTÓN REGISTRARME -->
                        <button type="submit" class="btn btn-purple-glow w-100 py-2.5 rounded-xl fw-bold text-sm mb-3">
                            <i class="bi bi-check-circle me-2"></i>Registrarme
                        </button>
                    </form>

                    <!-- SECCIÓN INICIAR SESIÓN -->
                    <div class="text-center border-top border-slate-800 pt-3">
                        <span class="text-xs text-white-50">¿Ya tienes una cuenta?</span>
                        <a href="/login" class="text-xs text-white fw-bold text-decoration-none ms-1">
                            Inicia sesión
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>