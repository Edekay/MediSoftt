<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - MediSoft</title>

    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS de MediSoft -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <style>
        .hero-banner {
            position: relative;
            background: linear-gradient(135deg, rgba(15, 10, 35, 0.90) 0%, rgba(76, 29, 149, 0.82) 100%), 
                        url('https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?q=80&w=1920&auto=format&fit=crop') center/cover no-repeat;
            border-radius: 0 !important;
            width: 100%;
            box-shadow: inset 0 0 50px rgba(139, 92, 246, 0.4);
            border: none !important;
        }
        .btn-glow {
            transition: all 0.3s ease;
        }
        .btn-glow:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(139, 92, 246, 0.9) !important;
        }
        .audifarma-logo {
            filter: brightness(0) invert(1);
            height: 40px;
            width: auto;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }
        .interactive-card:hover .audifarma-logo {
            opacity: 1;
        }

        /* --- NUEVAS TARJETAS DE ESTADÍSTICAS ELEGANTES (GLASSMORPHIΜ) --- */
        .elegant-stat-card {
            background: linear-gradient(145deg, rgba(20, 16, 43, 0.9), rgba(12, 9, 28, 0.95));
            border-radius: 1.25rem;
            padding: 1.8rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
        }

        /* Líneas de brillo superior sutiles para cada tarjeta */
        .elegant-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.5), transparent);
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        .card-purple::before {
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.8), transparent);
        }
        .card-blue::before {
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.8), transparent);
        }
        .card-green::before {
            background: linear-gradient(90deg, transparent, rgba(16, 185, 129, 0.8), transparent);
        }

        .elegant-stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(13, 10, 31, 0.8), 0 0 20px rgba(139, 92, 246, 0.15);
        }
        .elegant-stat-card.card-purple:hover {
            border-color: rgba(139, 92, 246, 0.4);
        }
        .elegant-stat-card.card-blue:hover {
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 15px 35px rgba(13, 10, 31, 0.8), 0 0 20px rgba(59, 130, 246, 0.15);
        }
        .elegant-stat-card.card-green:hover {
            border-color: rgba(16, 185, 129, 0.4);
            box-shadow: 0 15px 35px rgba(13, 10, 31, 0.8), 0 0 20px rgba(16, 185, 129, 0.15);
        }

        .badge-tag {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 5px 12px;
            border-radius: 30px;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 1rem;
        }
        .badge-tag-purple {
            background: rgba(139, 92, 246, 0.12);
            color: #c084fc;
            border: 1px solid rgba(139, 92, 246, 0.25);
        }
        .badge-tag-blue {
            background: rgba(59, 130, 246, 0.12);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.25);
        }
        .badge-tag-green {
            background: rgba(16, 185, 129, 0.12);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.25);
        }

        .stat-value {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 0.3rem;
            letter-spacing: -1px;
        }

        .stat-desc {
            font-size: 0.88rem;
            color: #94a3b8;
            font-weight: 500;
            margin: 0;
        }

        .stat-icon-box {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            backdrop-filter: blur(10px);
        }
        .icon-box-purple {
            background: rgba(139, 92, 246, 0.1);
            color: #c084fc;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }
        .icon-box-blue {
            background: rgba(59, 130, 246, 0.1);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }
        .icon-box-green {
            background: rgba(16, 185, 129, 0.1);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        /* Estilos para Accesos Rápidos (Sin bordes) */
        .quick-access-card {
            border-radius: 1.25rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none !important;
            background-size: cover;
            background-position: center;
        }
        .quick-access-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(15, 11, 35, 0.92) 0%, rgba(26, 20, 56, 0.88) 100%);
            z-index: 1;
            transition: background 0.3s ease;
        }
        .quick-access-card > * {
            position: relative;
            z-index: 2;
        }
        .quick-access-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(167, 139, 250, 0.35) !important;
        }
        .quick-access-card:hover::before {
            background: linear-gradient(135deg, rgba(20, 15, 45, 0.85) 0%, rgba(35, 25, 75, 0.80) 100%);
        }
    </style>
</head>

<body style="background-color: #0b091a; color: #fff;">

    <!-- =========================
         NAVBAR
    ========================= -->
    <nav class="navbar navbar-expand-lg navbar-dark px-4" style="background-color: #13102b; border-bottom: 1px solid rgba(139, 92, 246, 0.4);">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="#" style="color: #fff;">
                <div class="d-flex align-items-center justify-content-center rounded-3 p-2" style="background: #7c3aed; color: #fff;">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                MediSoft
            </a>
            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-light small">Panel de Control</span>
                <a href="/login" class="btn btn-sm px-3 py-2 rounded-3 text-white fw-semibold" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2);">Cerrar Sesión</a>
            </div>
        </div>
    </nav>

   <!-- =========================
         BANNER DE BIENVENIDA (TÍTULO OPTIMIZADO)
    ========================= -->
    <div class="hero-banner py-5 mb-5 shadow-lg" style="padding-top: 6rem !important; padding-bottom: 6rem !important;">
        <div class="container py-4">
            <div class="row">
                <!-- Margen izquierdo para alinear con la interfaz -->
                <div class="col-lg-8 ms-lg-3 text-start">
                    <!-- Etiqueta superior sutil -->
                    <span class="d-inline-flex align-items-center gap-2 px-3 py-1 mb-4 rounded-pill fw-medium text-white" style="background: rgba(139, 92, 246, 0.15); border: 1px solid rgba(167, 139, 250, 0.3); font-size: 0.85rem; letter-spacing: 0.5px; backdrop-filter: blur(8px); box-shadow: 0 0 15px rgba(139, 92, 246, 0.2);">
                        <i class="bi bi-hospital" style="color: #c084fc;"></i> Plataforma Médica Integrada
                    </span>

                    <!-- Título principal con tamaño aumentado para mayor presencia -->
                    <h1 class="fw-bold text-white mb-3 tracking-tight" style="font-size: 3.4rem; font-weight: 800; letter-spacing: -1px; line-height: 1.15;">
                        Panel de Control <span style="background: linear-gradient(135deg, #ffffff 0%, #c084fc 100%); background-clip: text; -webkit-background-clip: text; -webkit-text-fill-color: transparent;">MediSoft</span>
                    </h1>

                    <!-- Subtítulo con un punto más de tamaño para mejor lectura -->
                    <p class="mb-4 text-light opacity-85" style="font-size: 1.15rem; max-width: 580px; line-height: 1.6; font-weight: 400;">
                        Gestiona citas médicas, historial clínico y servicios complementarios desde un solo lugar con total seguridad y rapidez.
                    </p>

                    <!-- Botón de llamada a la acción estético y proporcionado -->
                    <div>
                        <a href="/citas" class="btn btn-glow px-4 py-2.5 text-white fw-semibold d-inline-flex align-items-center gap-2" style="background: linear-gradient(135deg, #8b5cf6 0%, #6d28d9 100%); border-radius: 0.75rem; border: none; font-size: 0.95rem; box-shadow: 0 6px 20px rgba(139, 92, 246, 0.4); transition: all 0.3s ease;">
                            <span>Agendar cita</span>
                            <i class="bi bi-arrow-right" style="font-size: 0.9rem;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

 <!-- =========================
         ACCESOS RÁPIDOS (ICONOS BLANCOS)
    ========================= -->
    <div class="container mb-5">
        <div class="row g-3 justify-content-center">
            
            <!-- Item 1: PQRD -->
            <div class="col-6 col-md-3 col-lg">
                <a href="/pqrd" class="card text-center text-decoration-none p-3 h-100 border-0 shadow-sm quick-access-card" style="background: rgba(30, 27, 75, 0.5); backdrop-filter: blur(12px); border: 1px solid rgba(56, 189, 248, 0.2) !important; border-radius: 1rem; transition: all 0.3s ease;">
                    <div class="card-body p-2">
                        <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle icon-box" style="width: 45px; height: 45px; background: rgba(56, 189, 248, 0.2); color: #ffffff; transition: all 0.3s ease;">
                            <i class="bi bi-envelope-paper fs-5"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-0" style="font-size: 0.9rem;">PQRD</h6>
                        <small class="text-light opacity-75" style="font-size: 0.75rem;">Solicitudes y quejas</small>
                    </div>
                </a>
            </div>

            <!-- Tarjeta: Laboratorios e Imágenes (Reemplazando o junto a Actualiza datos) -->
<div class="col">
    <div class="card h-100 text-center p-4 d-flex flex-column align-items-center justify-content-between" style="background: linear-gradient(145deg, rgba(20, 24, 45, 0.8), rgba(13, 17, 32, 0.85)); border: 1px solid rgba(56, 189, 248, 0.25); border-radius: 1.15rem; transition: all 0.3s ease;">
        <div>
            <!-- Icono con círculo de fondo acorde a tu diseño -->
            <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 55px; height: 55px; background: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.3);">
                <i class="bi bi-file-earmark-medical fs-4" style="color: #38bdf8;"></i>
            </div>
            <h5 class="text-white fw-bold mb-1" style="font-size: 1rem;">Laboratorios</h5>
            <p class="text-secondary mb-3" style="font-size: 0.75rem;">Resultados e imágenes</p>
        </div>
        <div class="w-100">
            <a href="{{ route('laboratorios.index') }}" class="btn btn-sm w-100 text-white fw-bold py-2 rounded-2 shadow-sm" style="background: linear-gradient(135deg, #38bdf8, #8b5cf6); border: none; font-size: 0.75rem;">
                Consultar
            </a>
        </div>
    </div>
</div>

            <!-- Item 3: Citas Médicas -->
            <div class="col-6 col-md-3 col-lg">
                <a href="/citas" class="card text-center text-decoration-none p-3 h-100 border-0 shadow-sm quick-access-card" style="background: rgba(30, 27, 75, 0.5); backdrop-filter: blur(12px); border: 1px solid rgba(56, 189, 248, 0.2) !important; border-radius: 1rem; transition: all 0.3s ease;">
                    <div class="card-body p-2">
                        <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle icon-box" style="width: 45px; height: 45px; background: rgba(56, 189, 248, 0.2); color: #ffffff; transition: all 0.3s ease;">
                            <i class="bi bi-heart-pulse fs-5"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Citas Médicas</h6>
                        <small class="text-light opacity-75" style="font-size: 0.75rem;">Gestiona tus consultas</small>
                    </div>
                </a>
            </div>

            <!-- Item 4: Directorio -->
            <div class="col-6 col-md-3 col-lg">
                <a href="/directorio" class="card text-center text-decoration-none p-3 h-100 border-0 shadow-sm quick-access-card" style="background: rgba(30, 27, 75, 0.5); backdrop-filter: blur(12px); border: 1px solid rgba(56, 189, 248, 0.2) !important; border-radius: 1rem; transition: all 0.3s ease;">
                    <div class="card-body p-2">
                        <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle icon-box" style="width: 45px; height: 45px; background: rgba(56, 189, 248, 0.2); color: #ffffff; transition: all 0.3s ease;">
                            <i class="bi bi-journal-medical fs-5"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Directorio</h6>
                        <small class="text-light opacity-75" style="font-size: 0.75rem;">Médicos y sedes</small>
                    </div>
                </a>
            </div>

            <!-- Item 5: Oficina Virtual -->
            <div class="col-6 col-md-3 col-lg">
                <a href="/oficina-virtual" class="card text-center text-decoration-none p-3 h-100 border-0 shadow-sm quick-access-card" style="background: rgba(30, 27, 75, 0.5); backdrop-filter: blur(12px); border: 1px solid rgba(56, 189, 248, 0.2) !important; border-radius: 1rem; transition: all 0.3s ease;">
                    <div class="card-body p-2">
                        <div class="mb-2 mx-auto d-flex align-items-center justify-content-center rounded-circle icon-box" style="width: 45px; height: 45px; background: rgba(56, 189, 248, 0.2); color: #ffffff; transition: all 0.3s ease;">
                            <i class="bi bi-laptop fs-5"></i>
                        </div>
                        <h6 class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Oficina Virtual</h6>
                        <small class="text-light opacity-75" style="font-size: 0.75rem;">Trámites y certificados</small>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- Estilos CSS para el movimiento -->
    <style>
        .quick-access-card:hover {
            transform: translateY(-6px);
            border-color: rgba(56, 189, 248, 0.5) !important;
            box-shadow: 0 10px 25px rgba(56, 189, 248, 0.25) !important;
            background: rgba(30, 41, 59, 0.7) !important;
        }
        .quick-access-card:hover .icon-box {
            background: rgba(56, 189, 248, 0.4) !important;
            transform: scale(1.08);
        }
    </style>

    
    <!-- =========================
         ESTADISTICAS (NUEVO DISEÑO ELEGANTE)
    ========================= -->
    <section class="container mb-5">
        <div class="row g-4">
            
            <!-- Tarjeta 1: Próximas -->
            <div class="col-md-4">
                <div class="elegant-stat-card card-purple d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge-tag badge-tag-purple">PRÓXIMAS</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-2">
                        <div>
                            <div class="stat-value text-white">2</div>
                            <p class="stat-desc">Citas Programadas</p>
                        </div>
                        <div class="stat-icon-box icon-box-purple">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2: Disponibles -->
            <div class="col-md-4">
                <div class="elegant-stat-card card-blue d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge-tag badge-tag-blue">DISPONIBLES</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-2">
                        <div>
                            <div class="stat-value text-white">15</div>
                            <p class="stat-desc">Especialistas Médicos</p>
                        </div>
                        <div class="stat-icon-box icon-box-blue">
                            <i class="bi bi-person-badge-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3: Notificaciones -->
            <div class="col-md-4">
                <div class="elegant-stat-card card-green d-flex flex-column justify-content-between">
                    <div>
                        <span class="badge-tag badge-tag-green">NUEVAS</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-end mt-2">
                        <div>
                            <div class="stat-value text-white">4</div>
                            <p class="stat-desc">Notificaciones</p>
                        </div>
                        <div class="stat-icon-box icon-box-green">
                            <i class="bi bi-bell-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- =========================
        SECCIÓN: PRÓXIMAS CITAS DEL PACIENTE (DISEÑO APP RECONSTRUIDO)
    ========================= -->
    <div class="container my-5" style="max-width: 1200px;">
        <!-- Encabezado de la sección -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span style="font-size: 0.65rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #38bdf8; background: rgba(56, 189, 248, 0.1); padding: 0.15rem 0.45rem; border-radius: 4px; border: 1px solid rgba(56, 189, 248, 0.2);">Agenda</span>
                    <span class="text-secondary" style="font-size: 0.78rem;">Vista general de consultas</span>
                </div>
                <h3 class="fw-bold text-white mb-0" style="font-size: 1.25rem; letter-spacing: -0.3px;">Mis Próximas Citas</h3>
            </div>
            <div>
                <a href="/citas/historial" class="text-secondary text-white-hover d-inline-flex align-items-center gap-1.5" style="font-size: 0.82rem; text-decoration: none; padding: 0.3rem 0.6rem; border-radius: 6px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.06); transition: all 0.15s ease;">
                    <span>Historial completo</span>
                    <i class="bi bi-arrow-right" style="font-size: 0.75rem;"></i>
                </a>
            </div>
        </div>

        <!-- Contenedor principal estilo SaaS Row -->
        <div style="background: #0b101d; border: 1px solid rgba(255, 255, 255, 0.07); border-radius: 10px; overflow: hidden;">
            
            <div class="p-3 p-md-3.5 app-appointment-row" style="transition: background-color 0.15s ease;">
                <div class="row align-items-center g-3">
                    
                    <!-- Columna 1: Fecha y Hora -->
                    <div class="col-lg-4 col-md-5">
                        <div class="d-flex align-items-center gap-3">
                            <!-- Mini widget de fecha -->
                            <div style="background: #050811; border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px; padding: 0.35rem 0.65rem; text-align: center; min-width: 52px;">
                                <span class="d-block fw-bold" style="font-size: 0.6rem; letter-spacing: 0.06em; color: #38bdf8;">OCT</span>
                                <span class="d-block fw-bold text-white" style="font-size: 1.15rem; line-height: 1.1; font-variant-numeric: tabular-nums;">12</span>
                            </div>
                            <!-- Hora y Estado con diseño de pastilla -->
                            <div>
                                <div class="d-inline-flex align-items-center gap-1 px-2 py-0.5 rounded-pill mb-1" style="background: rgba(52, 211, 153, 0.08); border: 1px solid rgba(52, 211, 153, 0.2);">
                                    <span style="width: 5px; height: 5px; background: #34d399; border-radius: 50%;"></span>
                                    <span style="font-size: 0.65rem; font-weight: 600; color: #34d399; letter-spacing: 0.03em; text-transform: uppercase;">Confirmada</span>
                                </div>
                                <div class="text-white fw-semibold" style="font-size: 0.88rem; font-variant-numeric: tabular-nums;">
                                    10:30 AM <span class="text-secondary fw-normal" style="font-size: 0.78rem;">· Lunes</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Columna 2: Doctor y Sede -->
                    <div class="col-lg-5 col-md-4">
                        <div class="ps-md-3" style="border-left: 1px solid rgba(255, 255, 255, 0.05);">
                            <div class="text-secondary mb-0.5" style="font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04em;">Medicina General</div>
                            <div class="text-white fw-bold" style="font-size: 0.95rem;">Dr. Carlos Mendoza</div>
                            <div class="text-secondary d-flex align-items-center gap-1 mt-0.5" style="font-size: 0.78rem;">
                                <i class="bi bi-geo-alt" style="font-size: 0.75rem;"></i> Consultorio 302 · Sede Principal
                            </div>
                        </div>
                    </div>

                    <!-- Columna 3: Botones de Acción Estilo Minimal -->
                    <div class="col-lg-3 col-md-3 text-md-end">
                        <div class="d-flex justify-content-md-end align-items-center gap-2">
                            <button class="btn-app-cancel" style="background: transparent; border: 1px solid rgba(239, 68, 68, 0.2); color: #f87171; border-radius: 6px; padding: 0.3rem 0.65rem; font-size: 0.75rem; font-weight: 500; transition: all 0.15s; cursor: pointer;">
                                Cancelar
                            </button>
                            <a href="/citas/detalles/1" class="btn-app-details" style="background: #111827; border: 1px solid rgba(255, 255, 255, 0.1); color: #fff; border-radius: 6px; padding: 0.3rem 0.75rem; font-size: 0.75rem; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 0.3rem; transition: all 0.15s;">
                                <span>Detalles</span>
                                <i class="bi bi-arrow-right" style="font-size: 0.7rem;"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- Estilos CSS específicos para esta sección -->
    <style>
        .app-appointment-row:hover {
            background-color: rgba(255, 255, 255, 0.015);
        }
        .text-white-hover:hover {
            color: #ffffff !important;
            border-color: rgba(255, 255, 255, 0.15) !important;
            background: rgba(255, 255, 255, 0.05) !important;
        }
        .btn-app-cancel:hover {
            background: rgba(239, 68, 68, 0.1) !important;
            border-color: rgba(239, 68, 68, 0.4) !important;
            color: #fca5a5 !important;
        }
        .btn-app-details:hover {
            background: #1f2937 !important;
            border-color: rgba(56, 189, 248, 0.3) !important;
            color: #38bdf8 !important;
        }
    </style>

   <!-- =========================
      ACCESOS RAPIDOS
========================= -->
<section class="container py-4">
    <h2 class="text-white fw-bold mb-4">Accesos Rápidos</h2>

    <div class="row g-4">
        
        <!-- Tarjeta 1: Citas (Morado) -->
        <div class="col-md-3">
            <div class="quick-access-card p-4 h-100 d-flex flex-column justify-content-between shadow-lg" style="background-image: url('https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=800&auto=format&fit=crop');">
                <div>
                    <div class="mb-3 fs-3" style="color: #c084fc;"><i class="bi bi-calendar-check"></i></div>
                    <h4 class="h5 text-white fw-bold mb-2">Citas</h4>
                    <p class="text-light small mb-4">Gestiona tus citas médicas de forma sencilla.</p>
                </div>
                <a href="/citas" class="btn btn-sm w-100 fw-semibold text-white py-2 btn-glow" style="background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%); border-radius: 0.5rem; border: none; box-shadow: 0 4px 15px rgba(124, 58, 237, 0.4);">
                    Ver citas
                </a>
            </div>
        </div>

        <!-- Tarjeta 2: Especialistas (Azul) -->
        <div class="col-md-3">
            <div class="quick-access-card p-4 h-100 d-flex flex-column justify-content-between shadow-lg" style="background-image: url('https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?q=80&w=800&auto=format&fit=crop');">
                <div>
                    <div class="mb-3 fs-3" style="color: #60a5fa;"><i class="bi bi-person-heart"></i></div>
                    <h4 class="h5 text-white fw-bold mb-2">Especialistas</h4>
                    <p class="text-light small mb-4">Consulta especialistas médicos disponibles.</p>
                </div>
                <a href="/especialistas" class="btn btn-sm w-100 fw-semibold text-white py-2 btn-glow" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border-radius: 0.5rem; border: none; box-shadow: 0 4px 15px rgba(37, 99, 235, 0.4);">
                    Ver especialistas
                </a>
            </div>
        </div>

        <!-- Tarjeta 3: Teleconsulta (Cian / Turquesa) -->
        <div class="col-md-3">
            <div class="quick-access-card p-4 h-100 d-flex flex-column justify-content-between shadow-lg" style="background-image: url('https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?q=80&w=800&auto=format&fit=crop');">
                <div>
                    <div class="mb-3 fs-3" style="color: #2dd4bf;"><i class="bi bi-camera-video-fill"></i></div>
                    <h4 class="h5 text-white fw-bold mb-2">Teleconsulta</h4>
                    <p class="text-light small mb-4">Atención médica virtual en línea.</p>
                </div>
                <a href="#" class="btn btn-sm w-100 fw-semibold text-white py-2 btn-glow" style="background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); border-radius: 0.5rem; border: none; box-shadow: 0 4px 15px rgba(13, 148, 136, 0.4);">
                    Ingresar
                </a>
            </div>
        </div>

        <!-- Tarjeta 4: Historial (Verde Esmeralda) -->
        <div class="col-md-3">
            <div class="quick-access-card p-4 h-100 d-flex flex-column justify-content-between shadow-lg" style="background-image: url('https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?q=80&w=800&auto=format&fit=crop');">
                <div>
                    <div class="mb-3 fs-3" style="color: #34d399;"><i class="bi bi-file-earmark-medical"></i></div>
                    <h4 class="h5 text-white fw-bold mb-2">Historial</h4>
                    <p class="text-light small mb-4">Consulta tus registros médicos previos.</p>
                </div>
                <a href="/historial" class="btn btn-sm w-100 fw-semibold text-white py-2 btn-glow" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border-radius: 0.5rem; border: none; box-shadow: 0 4px 15px rgba(5, 150, 105, 0.4);">
                    Historial
                </a>
            </div>
        </div>

    </div>
</section>

    <!-- =========================
      SERVICIOS EXTERNOS (AUDIFARMA)
========================= -->
<section class="container py-5">
    <h2 class="text-white fw-bold mb-4">Servicios en Alianza</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-lg-8">
            <div class="p-4 rounded-4 h-100 d-flex flex-column flex-md-row align-items-center gap-4 shadow-lg position-relative overflow-hidden interactive-alliance-card" 
                 style="background: linear-gradient(135deg, rgba(31, 41, 55, 0.9) 0%, rgba(17, 24, 39, 0.95) 100%); border: 1px solid rgba(139, 92, 246, 0.2); transition: all 0.3s ease;">
                
                <div class="d-flex align-items-center justify-content-center p-3 rounded-3 flex-shrink-0" style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); min-width: 140px;">
                    <div class="text-center">
                        <i class="bi bi-capsule-pill fs-2 mb-1 d-block" style="color: #c084fc;"></i>
                        <span class="fw-bold text-white tracking-wide" style="font-size: 0.95rem; letter-spacing: 1px;">AUDIFARMA</span>
                    </div>
                </div>

                <div class="flex-grow-1 text-center text-md-start">
                    <span class="badge mb-2 px-2 py-1 fw-semibold" style="background: rgba(139, 92, 246, 0.2); color: #c084fc; font-size: 0.7rem;">CONVENIO OFICIAL</span>
                    <h4 class="h5 text-white fw-bold mb-2">Portal de Medicamentos</h4>
                    <p class="text-light small mb-3">Consulta tus fórmulas, historial de entregas y agendamiento de medicamentos con Audifarma en línea.</p>
                   <a href="{{ url('/audifarma') }}" class="btn text-white fw-semibold rounded-pill px-4 py-2 text-xs d-inline-flex align-items-center gap-2" style="background: linear-gradient(135deg, #a855f7, #6366f1); border: none; box-shadow: 0 4px 15px rgba(168, 85, 247, 0.4);">
    Acceder a Audifarma <i class="bi bi-arrow-right"></i> </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .interactive-alliance-card:hover {
        transform: translateY(-5px);
        border-color: rgba(167, 139, 250, 0.6) !important;
        box-shadow: 0 15px 35px rgba(139, 92, 246, 0.25) !important;
    }
</style>

<style>
    .service-item:hover {
        transform: translateY(-6px);
        background: rgba(255, 255, 255, 0.05) !important;
        border-color: rgba(139, 92, 246, 0.4) !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    }
    .service-item:hover .icon-box {
        transform: scale(1.1);
        box-shadow: 0 0 15px currentColor;
    }
</style>

    <!-- =========================
         FOOTER
    ========================= -->
    <footer class="text-center py-4 mt-5" style="border-top: 1px solid rgba(167, 139, 250, 0.2); color: #ccc;">
        <div class="mb-2">
            <h5 class="text-white fw-bold d-inline-block mb-1 me-2" style="font-size: 1rem;">@MediSoft</h5>
            <span class="text-light small">| Sistema de Gestión de Servicios Médicos e Integraciones</span>
        </div>
        <p class="small mb-1">Alianza estratégica para la gestión de medicamentos con Audifarma S.A.</p>
        <p class="small mb-0">© 2026 Todos los derechos reservados</p>
    </footer>

  <!-- =========================
     CHATBOT FLOTANTE CON NOVA (MEDISOFT)
========================= -->

<!-- Botón flotante para abrir el chat -->
<button id="chatToggleBtn" class="btn position-fixed bottom-0 end-0 m-4 rounded-circle shadow-lg d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; background: #38bdf8; color: #0f172a; z-index: 1050; border: none; transition: transform 0.3s ease, box-shadow 0.3s ease;">
    <i class="bi bi-chat-dots-fill fs-3"></i>
</button>

<!-- Ventana del Chat (Oculta por defecto) -->
<div id="chatWindow" class="card position-fixed bottom-0 end-0 m-4 shadow-lg border-0" style="width: 350px; height: 450px; z-index: 1051; display: none; background: rgba(15, 23, 42, 0.95); backdrop-filter: blur(16px); border: 1px solid rgba(56, 189, 248, 0.3) !important; border-radius: 1rem;">
    
    <!-- Cabecera del chat con Nova -->
    <div class="card-header d-flex justify-content-between align-items-center py-3" style="background: rgba(30, 41, 59, 0.8); border-top-left-radius: 1rem; border-top-right-radius: 1rem; border-bottom: 1px solid rgba(56, 189, 248, 0.2);">
        <div class="d-flex align-items-center">
            <span class="rounded-circle d-inline-block me-2 shadow-sm" style="width: 10px; height: 10px; background: #38bdf8; box-shadow: 0 0 8px #38bdf8;"></span>
            <div>
                <h6 class="text-white fw-bold mb-0" style="font-size: 0.95rem;">Nova ✨</h6>
                <small class="text-light opacity-75" style="font-size: 0.7rem;">Asistente Virtual MediSoft</small>
            </div>
        </div>
        <button id="chatCloseBtn" class="btn btn-sm text-light p-0 shadow-none" style="background: none; border: none;">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <!-- Cuerpo de mensajes con bienvenida de Nova -->
    <div id="chatBody" class="card-body overflow-auto p-3" style="height: 320px; font-size: 0.85rem;">
        <div class="mb-3 text-start">
            <div class="d-inline-block p-3 rounded-4 text-white shadow-sm" style="background: rgba(56, 189, 248, 0.15); border: 1px solid rgba(56, 189, 248, 0.3);">
                ¡Hola! 👋 Soy <strong>Nova</strong>, tu asistente virtual en MediSoft. ¿En qué te puedo ayudar hoy con tus citas, datos o solicitudes?
            </div>
        </div>
    </div>

    <!-- Pie de entrada de texto -->
    <div class="card-footer p-2" style="background: rgba(30, 41, 59, 0.8); border-bottom-left-radius: 1rem; border-bottom-right-radius: 1rem; border-top: 1px solid rgba(56, 189, 248, 0.2);">
        <form id="chatForm" class="input-group">
            <input type="text" id="chatInput" class="form-control form-control-sm text-white border-0 shadow-none" placeholder="Escribe tu duda a Nova..." style="background: rgba(15, 23, 42, 0.6);">
            <button class="btn btn-sm px-3" type="submit" style="background: #38bdf8; color: #0f172a; font-weight: bold;">
                <i class="bi bi-send-fill"></i>
            </button>
        </form>
    </div>
</div>

<!-- Script de Interactividad -->
<script>
    const toggleBtn = document.getElementById('chatToggleBtn');
    const closeBtn = document.getElementById('chatCloseBtn');
    const chatWindow = document.getElementById('chatWindow');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');
    const chatBody = document.getElementById('chatBody');

    // Abrir y cerrar la ventana del chat
    toggleBtn.addEventListener('click', () => {
        chatWindow.style.display = chatWindow.style.display === 'none' ? 'flex' : 'none';
        toggleBtn.style.transform = chatWindow.style.display === 'flex' ? 'scale(0)' : 'scale(1)';
    });

    closeBtn.addEventListener('click', () => {
        chatWindow.style.display = 'none';
        toggleBtn.style.transform = 'scale(1)';
    });

    // Lógica para enviar mensajes y respuestas automáticas de Nova
    chatForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const text = chatInput.value.trim();
        if(!text) return;

        // Mensaje enviado por el usuario (alineado a la derecha)
        chatBody.innerHTML += `
            <div class="mb-3 text-end">
                <div class="d-inline-block p-3 rounded-4 text-white shadow-sm" style="background: rgba(139, 92, 246, 0.3); border: 1px solid rgba(139, 92, 246, 0.4);">
                    ${text}
                </div>
            </div>
        `;
        chatInput.value = '';
        chatBody.scrollTop = chatBody.scrollHeight;

        // Simulación de respuesta inteligente de Nova (medio segundo de retraso)
        setTimeout(() => {
            let respuesta = "Entiendo tu consulta. Puedes gestionar eso directamente desde la sección de 'Oficina Virtual' o revisar tus opciones en el menú principal de MediSoft.";
            
            const textoMinuscula = text.toLowerCase();
            if(textoMinuscula.includes('cita') || textoMinuscula.includes('medico') || textoMinuscula.includes('doctor')) {
                respuesta = "🩺 Para gestionar tus citas médicas, ve a la sección de 'Citas Médicas' en el panel principal o consulta los horarios disponibles en nuestro directorio.";
            } else if(textoMinuscula.includes('pqrd') || textoMinuscula.includes('queja') || textoMinuscula.includes('reclamo')) {
                respuesta = "📋 Puedes radicar tus peticiones, quejas o reclamos (PQRD) directamente desde el primer acceso rápido de la plataforma.";
            } else if(textoMinuscula.includes('datos') || textoMinuscula.includes('perfil') || textoMinuscula.includes('actualizar')) {
                respuesta = "🔄 Para mantener tu perfil al día, ingresa a la opción 'Actualiza datos' en los accesos rápidos.";
            }

            // Mensaje de respuesta de Nova (alineado a la izquierda)
            chatBody.innerHTML += `
                <div class="mb-3 text-start">
                    <div class="d-inline-block p-3 rounded-4 text-white shadow-sm" style="background: rgba(56, 189, 248, 0.15); border: 1px solid rgba(56, 189, 248, 0.3);">
                        ${respuesta}
                    </div>
                </div>
            `;
            chatBody.scrollTop = chatBody.scrollHeight;
        }, 600);
    });
</script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>