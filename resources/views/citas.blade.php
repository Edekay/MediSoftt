<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas - MediSoft</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Google Fonts (Outfit y Plus Jakarta Sans) -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0b0f19;
            color: #f8fafc;
            min-height: 100vh;
            margin: 0;
        }
        .hero-title-modern, .modal-title-modern {
            font-family: 'Outfit', sans-serif;
            letter-spacing: -0.02em;
        }
        /* Navbar Minimalista y Elegante */
        .navbar-medisoft {
            background: rgba(7, 5, 16, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            padding: 1.2rem 2rem;
        }
        /* Botón morado personalizado */
        .btn-purple-custom {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            color: #ffffff;
            border-radius: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 20px rgba(124, 58, 237, 0.4);
        }
        .btn-purple-custom:hover {
            background: linear-gradient(135deg, #6d28d9 0%, #5b21b6 100%);
            color: #ffffff;
            box-shadow: 0 6px 25px rgba(124, 58, 237, 0.6);
            transform: translateY(-2px);
        }
        /* Hero Section */
        .hero-citas {
            position: relative;
            background: linear-gradient(180deg, rgba(7, 5, 16, 0.85) 0%, rgba(7, 5, 16, 0.95) 100%), 
                        url('https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=1600&auto=format&fit=crop&q=80') center/cover no-repeat;
            padding: 70px 20px 50px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }
        .hero-action-box {
            background: linear-gradient(145deg, #130f24 0%, #0a0814 100%);
            border: 1px solid rgba(124, 58, 237, 0.35);
            border-radius: 1.25rem;
            padding: 2.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.6), 0 0 30px rgba(124, 58, 237, 0.2);
        }

        /* Tarjetas adicionales de información inferior */
        .extra-info-card {
            background: rgba(17, 13, 33, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 1rem;
            padding: 1.25rem;
            transition: all 0.3s ease;
            height: 100%;
        }
        .extra-info-card:hover {
            border-color: rgba(124, 58, 237, 0.4);
            transform: translateY(-3px);
            background: rgba(20, 15, 38, 0.9);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
        }
        .extra-icon-box {
            width: 40px;
            height: 40px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        /* Tarjetas de Estadísticas */
        .stat-card-modern {
            position: relative;
            background: #0f0c1b;
            border-radius: 1.15rem;
            padding: 1.5rem;
            border: 1px solid rgba(255, 255, 255, 0.07);
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .stat-card-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }
        .stat-card-purple::before { background: linear-gradient(to bottom, #a78bfa, #7c3aed); }
        .stat-card-emerald::before { background: linear-gradient(to bottom, #34d399, #059669); }
        .stat-card-cyan::before { background: linear-gradient(to bottom, #38bdf8, #0284c7); }

        .stat-card-modern:hover {
            transform: translateY(-4px);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }
        .stat-icon-wrapper {
            width: 52px;
            height: 52px;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* Tarjetas de Citas Programadas */
        .card-appointment {
            background: linear-gradient(145deg, #141028 0%, #0c091a 100%);
            border: 1px solid rgba(124, 58, 237, 0.2);
            border-radius: 1.25rem;
            padding: 1.8rem;
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }
        .card-appointment:hover {
            border-color: rgba(124, 58, 237, 0.6);
            transform: translateY(-4px);
            box-shadow: 0 15px 40px rgba(124, 58, 237, 0.25);
        }
        .appointment-icon {
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.2) 0%, rgba(124, 58, 237, 0.05) 100%);
            color: #c084fc;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
            font-size: 1.4rem;
            border: 1px solid rgba(124, 58, 237, 0.35);
        }
        .time-box-inner {
            background: rgba(7, 5, 16, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 0.9rem;
            padding: 1.1rem;
        }

        /* Estilos específicos para el Calendario del Modal */
        .calendar-box-left {
            background: #090712;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 1rem;
            padding: 1.5rem 1.2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 290px;
        }
        .calendar-grid {
            background: #090712;
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 1rem;
            padding: 1rem;
        }
        .cal-day-header {
            font-size: 0.72rem;
            color: #64748b;
            font-weight: 600;
            text-align: center;
        }
        .cal-day {
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.82rem;
            color: #cbd5e1;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .cal-day:hover {
            background: rgba(124, 58, 237, 0.2);
            color: #fff;
        }
        .cal-day.active {
            background: #7c3aed;
            color: #fff;
            font-weight: 600;
            box-shadow: 0 0 15px rgba(124, 58, 237, 0.5);
        }
        .cal-day.muted {
            color: #475569;
        }

        /* Sección de Horarios Disponibles que aparecerá */
        #seccionHorariosDisponibles {
            display: none;
            animation: fadeIn 0.4s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .hora-slot {
            background: #090712;
            border: 1px solid rgba(124, 58, 237, 0.3);
            color: #cbd5e1;
            border-radius: 0.5rem;
            padding: 0.5rem;
            font-size: 0.85rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .hora-slot:hover {
            background: rgba(124, 58, 237, 0.2);
            color: #fff;
            border-color: #7c3aed;
        }
        .hora-slot.seleccionada {
            background: #7c3aed;
            color: #fff;
            font-weight: 650;
            box-shadow: 0 0 10px rgba(124, 58, 237, 0.5);
        }

        #especialidadInput {
            max-height: 200px;
        }
    </style>
</head>
<body id="inicio">

    <!-- Barra de Navegación con redirección al dashboard de Laravel -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-medisoft sticky-top">
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center">
            <a class="navbar-brand d-flex align-items-center text-white text-decoration-none" href="{{ route('dashboard') }}">
                <div class="rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 34px; height: 34px; background: #7c3aed;">
                    <i class="bi bi-heart-fill text-white fs-6"></i>
                </div>
                <span class="fw-semibold fs-5 tracking-wide">MediSoft</span>
            </a>
            
            <!-- Botón Volver al Dashboard vinculado mediante la ruta de Laravel -->
            <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-light px-3 py-2 d-flex align-items-center" style="border-radius: 0.75rem; border-color: rgba(255, 255, 255, 0.15); font-size: 0.85rem; background: rgba(255, 255, 255, 0.03);">
                <i class="bi bi-house-door-fill me-2" style="color: #a78bfa;"></i> Volver al Dashboard
            </a>
        </div>
    </nav>

    <!-- Banner / Hero Section -->
    <section class="hero-citas">
        <div class="container position-relative" style="z-index: 2;">
            <span class="badge px-3 py-2 mb-3 rounded-pill hero-title-modern fw-medium" style="background: rgba(255, 255, 255, 0.05); color: #cbd5e1; border: 1px solid rgba(255, 255, 255, 0.1); letter-spacing: 0.08em; font-size: 0.75rem;">
                PORTAL CLÍNICO DE CITAS
            </span>
            <h1 class="display-5 fw-semibold mb-3 hero-title-modern text-white" style="letter-spacing: -0.03em;">
                Gestión avanzada de servicios médicos
            </h1>
            <p class="text-light opacity-75 mx-auto mb-4 fw-light" style="max-width: 580px; font-size: 1.02rem; line-height: 1.6;">
                Optimice la administración de sus consultas, supervise el historial de especialistas y mantenga el control absoluto de su salud con total fluidez.
            </p>
        </div>
    </section>

    <!-- Contenido Principal -->
    <div class="container py-5">
        
        <!-- Estadísticas Rápidas -->
        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stat-card-modern stat-card-purple">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase fw-bold text-secondary" style="font-size: 0.68rem; letter-spacing: 0.08em;">Próximas Citas</span>
                            <h3 id="contadorProximas" class="text-white fw-bold mb-0 mt-1 hero-title-modern fs-3">2 Activas</h3>
                            <span class="badge mt-2" style="font-size: 0.7rem; background: rgba(124,58,237,0.15); color: #c084fc;">En curso</span>
                        </div>
                        <div class="stat-icon-wrapper" style="background: rgba(124, 58, 237, 0.15); color: #c084fc; border: 1px solid rgba(124, 58, 237, 0.3);">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card-modern stat-card-emerald">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase fw-bold text-secondary" style="font-size: 0.68rem; letter-spacing: 0.08em;">Historial Médico</span>
                            <h3 class="text-white fw-bold mb-0 mt-1 hero-title-modern fs-3">8 Asistidas</h3>
                            <span class="badge mt-2" style="font-size: 0.7rem; background: rgba(16, 185, 129, 0.15); color: #34d399;">Completadas exitosas</span>
                        </div>
                        <div class="stat-icon-wrapper" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3);">
                            <i class="bi bi-shield-fill-check"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stat-card-modern stat-card-cyan">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-uppercase fw-bold text-secondary" style="font-size: 0.68rem; letter-spacing: 0.08em;">Red Clínica</span>
                            <h3 class="text-white fw-bold mb-0 mt-1 hero-title-modern fs-3">3 Centros</h3>
                            <span class="badge mt-2" style="font-size: 0.7rem; background: rgba(56, 189, 248, 0.15); color: #38bdf8;">Sedes habilitadas</span>
                        </div>
                        <div class="stat-icon-wrapper" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3);">
                            <i class="bi bi-hospital-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjeta Central CTA -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9">
                <div class="hero-action-box text-center">
                    <div class="mb-3">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle mb-2" style="width: 56px; height: 56px; background: rgba(124, 58, 237, 0.15); color: #a78bfa; border: 1px solid rgba(124, 58, 237, 0.3);">
                            <i class="bi bi-calendar-plus fs-4"></i>
                        </span>
                        <h3 class="text-white fw-semibold fs-4 mb-1 hero-title-modern">¿Necesitas una consulta médica?</h3>
                        <p class="text-secondary small mb-4">Selecciona tu especialidad y programa tu cita de manera inmediata sin complicaciones.</p>
                    </div>
                    <button class="btn btn-purple-custom px-5 py-3 fw-semibold hero-title-modern w-100 fs-5 shadow" data-bs-toggle="modal" data-bs-target="#agendarCitaModal">
                        <i class="bi bi-plus-circle-fill me-2"></i> Agendar Nueva Cita Ahora
                    </button>
                </div>
            </div>
        </div>

        <!-- Listado de Citas Programadas -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h3 class="text-white fw-semibold fs-5 mb-0 hero-title-modern">
                <i class="bi bi-clock-history me-2" style="color: #a78bfa;"></i> Próximas Consultas y Detalles Clínicos
            </h3>
            <span class="text-secondary small">Panel interactivo de seguimiento</span>
        </div>
        
        <div id="contenedorCitas" class="row g-4">
            <!-- Cita 1 por defecto -->
            <div class="col-lg-6 cita-item">
                <div class="card-appointment h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge px-3 py-1 rounded-pill fw-semibold" style="background: rgba(16, 185, 129, 0.15); color: #34d399; border: 1px solid rgba(16, 185, 129, 0.3); font-size: 0.75rem;">
                            <i class="bi bi-check-circle-fill me-1"></i> Confirmada
                        </span>
                        <small class="text-secondary font-monospace px-2 py-1 rounded" style="background: rgba(255,255,255,0.03);">#CIT-8492</small>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="appointment-icon me-3">
                            <i class="bi bi-clipboard2-pulse-fill"></i>
                        </div>
                        <div>
                            <h4 class="text-white fw-semibold mb-0 fs-5 hero-title-modern">Medicina General</h4>
                            <span class="text-secondary small d-flex align-items-center mt-1">
                                <i class="bi bi-person-badge me-1" style="color: #a78bfa;"></i> Dr. Carlos Mendoza
                            </span>
                        </div>
                    </div>

                    <div class="time-box-inner mb-3">
                        <div class="row text-center align-items-center">
                            <div class="col-6 border-end border-secondary border-opacity-10">
                                <span class="text-secondary small d-block mb-1" style="font-size: 0.7rem;">FECHA</span>
                                <strong class="text-white fw-semibold fs-6">24 Sep, 2026</strong>
                            </div>
                            <div class="col-6">
                                <span class="text-secondary small d-block mb-1" style="font-size: 0.7rem;">HORA</span>
                                <strong class="text-white fw-semibold fs-6" style="color: #c084fc;">10:30 AM</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-auto pt-2">
                        <p class="text-secondary small mb-0"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Sede Norte - Consultorio 302</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-light px-3 py-1.5" style="border-radius: 0.5rem; font-size: 0.8rem; border-color: rgba(255,255,255,0.15);">
                                <i class="bi bi-eye me-1"></i> Ver
                            </button>
                            <button class="btn btn-sm px-3 py-1.5 text-danger btn-cancelar" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); border-radius: 0.5rem; font-size: 0.8rem;">
                                <i class="bi bi-x-lg me-1"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cita 2 por defecto -->
            <div class="col-lg-6 cita-item">
                <div class="card-appointment h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge px-3 py-1 rounded-pill fw-semibold" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3); font-size: 0.75rem;">
                            <i class="bi bi-clock-fill me-1"></i> Programada
                        </span>
                        <small class="text-secondary font-monospace px-2 py-1 rounded" style="background: rgba(255,255,255,0.03);">#CIT-9015</small>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="appointment-icon me-3" style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border-color: rgba(56, 189, 248, 0.25);">
                            <i class="bi bi-emoji-smile-fill"></i>
                        </div>
                        <div>
                            <h4 class="text-white fw-semibold mb-0 fs-5 hero-title-modern">Odontología</h4>
                            <span class="text-secondary small d-flex align-items-center mt-1">
                                <i class="bi bi-person-badge me-1" style="color: #38bdf8;"></i> Dra. Andrea Gómez
                            </span>
                        </div>
                    </div>

                    <div class="time-box-inner mb-3">
                        <div class="row text-center align-items-center">
                            <div class="col-6 border-end border-secondary border-opacity-10">
                                <span class="text-secondary small d-block mb-1" style="font-size: 0.7rem;">FECHA</span>
                                <strong class="text-white fw-semibold fs-6">05 Oct, 2026</strong>
                            </div>
                            <div class="col-6">
                                <span class="text-secondary small d-block mb-1" style="font-size: 0.7rem;">HORA</span>
                                <strong class="text-white fw-semibold fs-6" style="color: #38bdf8;">02:00 PM</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-auto pt-2">
                        <p class="text-secondary small mb-0"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> Sede Principal - Consultorio 104</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-light px-3 py-1.5" style="border-radius: 0.5rem; font-size: 0.8rem; border-color: rgba(255,255,255,0.15);">
                                <i class="bi bi-eye me-1"></i> Ver
                            </button>
                            <button class="btn btn-sm px-3 py-1.5 text-danger btn-cancelar" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); border-radius: 0.5rem; font-size: 0.8rem;">
                                <i class="bi bi-x-lg me-1"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tarjetas adicionales inferiores -->
        <div class="row g-4 mt-2">
            <div class="col-md-6">
                <div class="extra-info-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="extra-icon-box me-3" style="background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.3);">
                            <i class="bi bi-file-earmark-medical"></i>
                        </div>
                        <div>
                            <h5 class="text-white fs-6 mb-0 fw-semibold">Recetas y Órdenes Médicas</h5>
                            <small class="text-secondary">Última actualización: Ayer</small>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3">Tienes 1 prescripción pendiente por retirar en farmacia aliada y 2 órdenes de laboratorio vigentes.</p>
                    <button class="btn btn-sm btn-outline-light px-3" style="border-radius: 0.5rem; font-size: 0.8rem; border-color: rgba(255,255,255,0.15);">
                        <i class="bi bi-download me-1"></i> Descargar Órdenes
                    </button>
                </div>
            </div>

            <div class="col-md-6">
                <div class="extra-info-card p-4">
                    <div class="d-flex align-items-center mb-3">
                        <div class="extra-icon-box me-3" style="background: rgba(20, 184, 166, 0.15); color: #2dd4bf; border: 1px solid rgba(20, 184, 166, 0.3);">
                            <i class="bi bi-journal-check"></i>
                        </div>
                        <div>
                            <h5 class="text-white fs-6 mb-0 fw-semibold">Recomendaciones del Especialista</h5>
                            <small class="text-secondary">Dr. Carlos Mendoza</small>
                        </div>
                    </div>
                    <p class="text-secondary small mb-3">Control de presión arterial sugerido cada 3 días en ayunas. Mantener hidratación constante.</p>
                    <span class="badge" style="background: rgba(20, 184, 166, 0.1); color: #2dd4bf; font-size: 0.75rem;">Seguimiento activo</span>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal para Agendar Cita -->
    <div class="modal fade" id="agendarCitaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content card-appointment border-0 shadow-lg p-3" style="background: #0f0c1b; color: #fff;">
                
                <div class="modal-header border-bottom border-secondary border-opacity-10 px-3 py-3">
                    <h5 class="modal-title modal-title-modern fw-semibold text-white fs-5 d-flex align-items-center">
                        <i class="bi bi-calendar-plus me-2 text-secondary fs-5"></i> Asignar Cita Médica
                    </h5>
                    <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <form id="formAgendarCita">
                        <!-- Tipo de Especialidad (35 Especialidades) -->
                        <div class="mb-4">
                            <label class="form-label text-secondary small fw-semibold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.05em;">Tipo de Especialidad (35 Disponibles)</label>
                            <select id="especialidadInput" class="form-select text-white border-secondary border-opacity-25 shadow-none py-2.5" style="background: #090712 !important; border-radius: 0.5rem; font-size: 0.95rem;" required>
                                <option value="" selected disabled>SELECCIONA UNA ESPECIALIDAD...</option>
                                <option value="Alergología e Inmunología">Alergología e Inmunología</option>
                                <option value="Anestesiología">Anestesiología</option>
                                <option value="Angiología y Cirugía Vascular">Angiología y Cirugía Vascular</option>
                                <option value="Cardiología">Cardiología</option>
                                <option value="Cirugía Cardiotorácica">Cirugía Cardiotorácica</option>
                                <option value="Cirugía General">Cirugía General</option>
                                <option value="Cirugía Pediátrica">Cirugía Pediátrica</option>
                                <option value="Cirugía Plástica, Estética y Reconstructiva">Cirugía Plástica, Estética y Reconstructiva</option>
                                <option value="Cirugía Maxilofacial">Cirugía Maxilofacial</option>
                                <option value="Dermatología">Dermatología</option>
                                <option value="Endocrinología">Endocrinología</option>
                                <option value="Gastroenterología">Gastroenterología</option>
                                <option value="Genética Médica">Genética Médica</option>
                                <option value="Geriatría">Geriatría</option>
                                <option value="Ginecología y Obstetricia">Ginecología y Obstetricia</option>
                                <option value="Hematología">Hematología</option>
                                <option value="Infectología">Infectología</option>
                                <option value="Medicina del Deporte">Medicina del Deporte</option>
                                <option value="Medicina Física y Rehabilitación">Medicina Física y Rehabilitación</option>
                                <option value="Medicina General">Medicina General</option>
                                <option value="Medicina Interna">Medicina Interna</option>
                                <option value="Nefrología">Nefrología</option>
                                <option value="Neumología">Neumología</option>
                                <option value="Neurología">Neurología</option>
                                <option value="Nutriología y Dietética">Nutriología y Dietética</option>
                                <option value="Odontología General">Odontología General</option>
                                <option value="Oftalmología">Oftalmología</option>
                                <option value="Oncología Médica">Oncología Médica</option>
                                <option value="Ortodoncia">Ortodoncia</option>
                                <option value="Ortopedia y Traumatología">Ortopedia y Traumatología</option>
                                <option value="Otorrinolaringología">Otorrinolaringología</option>
                                <option value="Pediatría">Pediatría</option>
                                <option value="Psiquiatría">Psiquiatría</option>
                                <option value="Reumatología">Reumatología</option>
                                <option value="Urología">Urología</option>
                            </select>
                        </div>

                        <!-- Panel de Calendario e Inputs -->
                        <div class="row g-3 mb-4">
                            <!-- Columna Izquierda: Fecha Seleccionada -->
                            <div class="col-md-5">
                                <div id="seccion-calendario" class="calendar-box-left">
                                    <div class="text-center">
                                        <span class="badge px-3 py-1 mb-3 rounded-pill fw-medium" style="background: rgba(255,255,255,0.05); color: #94a3b8; font-size: 0.65rem; letter-spacing: 0.08em;">FECHA SELECCIONADA</span>
                                        <div class="my-2">
                                            <h1 id="displayDiaNum" class="text-white fw-bold display-3 mb-0 hero-title-modern" style="line-height: 1;">24</h1>
                                        </div>
                                        <div class="mt-2">
                                            <span id="displayDiaLetra" class="text-uppercase fw-semibold" style="color: #c084fc; font-size: 0.85rem; letter-spacing: 0.1em;">JUEVES</span>
                                        </div>
                                    </div>
                                    <div class="border-top border-secondary border-opacity-10 pt-3 mt-3 text-start">
                                        <span class="text-secondary d-block" style="font-size: 0.75rem;">Estado: <strong class="text-success">Disponible</strong></span>
                                        <span class="text-muted" style="font-size: 0.7rem;">Haz clic en cualquier día del calendario.</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Columna Derecha: Cuadrícula del Calendario -->
                            <div class="col-md-7">
                                <div class="calendar-grid">
                                    <div class="d-flex justify-content-between align-items-center mb-3 px-1">
                                        <span class="text-white fw-semibold" style="font-size: 0.9rem;">septiembre 2026</span>
                                        <span class="text-secondary" style="font-size: 0.75rem;">Mes Actual</span>
                                    </div>
                                    <div class="row g-1 text-center mb-2">
                                        <div class="col cal-day-header">LU</div>
                                        <div class="col cal-day-header">MA</div>
                                        <div class="col cal-day-header">MI</div>
                                        <div class="col cal-day-header">JU</div>
                                        <div class="col cal-day-header">VI</div>
                                        <div class="col cal-day-header">SA</div>
                                        <div class="col cal-day-header">DO</div>
                                    </div>
                                    <!-- Fila 1 -->
                                    <div class="row g-1 text-center mb-1">
                                        <div class="col"><div class="cal-day muted" onclick="seleccionarFecha('31', 'LUNES')">31</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('01', 'MARTES')">1</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('02', 'MIÉRCOLES')">2</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('03', 'JUEVES')">3</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('04', 'VIERNES')">4</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('05', 'SÁBADO')">5</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('06', 'DOMINGO')">6</div></div>
                                    </div>
                                    <!-- Fila 2 -->
                                    <div class="row g-1 text-center mb-1">
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('07', 'LUNES')">7</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('08', 'MARTES')">8</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('09', 'MIÉRCOLES')">9</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('10', 'JUEVES')">10</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('11', 'VIERNES')">11</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('12', 'SÁBADO')">12</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('13', 'DOMINGO')">13</div></div>
                                    </div>
                                    <!-- Fila 3 -->
                                    <div class="row g-1 text-center mb-1">
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('14', 'LUNES')">14</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('15', 'MARTES')">15</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('16', 'MIÉRCOLES')">16</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('17', 'JUEVES')">17</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('18', 'VIERNES')">18</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('19', 'SÁBADO')">19</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('20', 'DOMINGO')">20</div></div>
                                    </div>
                                    <!-- Fila 4 -->
                                    <div class="row g-1 text-center mb-1">
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('21', 'LUNES')">21</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('22', 'MARTES')">22</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('23', 'MIÉRCOLES')">23</div></div>
                                        <div class="col"><div class="cal-day active" id="dia24" onclick="seleccionarFecha('24', 'JUEVES')">24</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('25', 'VIERNES')">25</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('26', 'SÁBADO')">26</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('27', 'DOMINGO')">27</div></div>
                                    </div>
                                    <!-- Fila 5 -->
                                    <div class="row g-1 text-center">
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('28', 'LUNES')">28</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('29', 'MARTES')">29</div></div>
                                        <div class="col"><div class="cal-day" onclick="seleccionarFecha('30', 'MIÉRCOLES')">30</div></div>
                                        <div class="col"><div class="cal-day muted" onclick="seleccionarFecha('01', 'JUEVES')">1</div></div>
                                        <div class="col"><div class="cal-day muted" onclick="seleccionarFecha('02', 'VIERNES')">2</div></div>
                                        <div class="col"><div class="cal-day muted" onclick="seleccionarFecha('03', 'SÁBADO')">3</div></div>
                                        <div class="col"><div class="cal-day muted" onclick="seleccionarFecha('04', 'DOMINGO')">4</div></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SECCIÓN QUE APARECE AL CONSULTAR DISPONIBILIDAD -->
                        <div id="seccionHorariosDisponibles" class="mb-4 p-3 rounded" style="background: rgba(124, 58, 237, 0.08); border: 1px solid rgba(124, 58, 237, 0.3);">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <span class="text-white fw-semibold small"><i class="bi bi-clock-fill text-purple me-1" style="color: #c084fc;"></i> Horarios disponibles para el <span id="lblFechaSeleccionada" class="text-info">24 Sep</span>:</span>
                                <span class="badge bg-success bg-opacity-10 text-success" style="font-size: 0.65rem;">4 cupos libres</span>
                            </div>
                            <div class="row g-2">
                                <div class="col-3"><div class="hora-slot" onclick="seleccionarHora(this, '08:00 AM')">08:00 AM</div></div>
                                <div class="col-3"><div class="hora-slot seleccionada" onclick="seleccionarHora(this, '09:30 AM')">09:30 AM</div></div>
                                <div class="col-3"><div class="hora-slot" onclick="seleccionarHora(this, '11:00 AM')">11:00 AM</div></div>
                                <div class="col-3"><div class="hora-slot" onclick="seleccionarHora(this, '03:30 PM')">03:30 PM</div></div>
                            </div>
                        </div>

                        <!-- Campos ocultos -->
                        <input type="hidden" id="fechaSeleccionadaHidden" value="24 Sep, 2026">
                        <input type="hidden" id="horaSeleccionadaHidden" value="09:30 AM">
                        <input type="hidden" id="medicoSeleccionadoHidden" value="Dr. Especialista Asignado">
                        <input type="hidden" id="sedeSeleccionadaHidden" value="Sede Principal - Consultorio Especializado">

                        <!-- Botón de Consultar Disponibilidad -->
                        <div class="mt-4 pt-2">
                            <button type="button" id="btnConsultar" class="btn btn-purple-custom w-100 py-3 fw-semibold hero-title-modern fs-6 shadow d-flex align-items-center justify-content-center">
                                CONSULTAR DISPONIBILIDAD <i class="bi bi-search ms-2"></i>
                            </button>
                        </div>

                        <!-- Botón Final para Confirmar Cita (aparece al consultar) -->
                        <div class="mt-2" id="contenedorBtnConfirmar" style="display: none;">
                            <button type="submit" class="btn btn-success w-100 py-3 fw-semibold hero-title-modern fs-6 shadow d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #059669 0%, #047857 100%); border:none;">
                                CONFIRMAR Y GUARDAR CITA <i class="bi bi-check-circle-fill ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script de Interactividad -->
    <script>
        let fechaActualElegida = "24 Sep, 2026";
        let diaLetraElegido = "JUEVES";

        function seleccionarFecha(dia, letra) {
            document.querySelectorAll('.cal-day').forEach(el => el.classList.remove('active'));
            event.target.classList.add('active');

            document.getElementById('displayDiaNum').innerText = dia;
            document.getElementById('displayDiaLetra').innerText = letra;

            fechaActualElegida = `${dia} Sep, 2026`;
            diaLetraElegido = letra;
            document.getElementById('lblFechaSeleccionada').innerText = `${dia} Sep`;
            
            document.getElementById('seccionHorariosDisponibles').style.display = 'none';
            document.getElementById('contenedorBtnConfirmar').style.display = 'none';
        }

        function seleccionarHora(elemento, hora) {
            document.querySelectorAll('.hora-slot').forEach(el => el.classList.remove('seleccionada'));
            elemento.classList.add('seleccionada');
            document.getElementById('horaSeleccionadaHidden').value = hora;
        }

        document.getElementById('btnConsultar').addEventListener('click', function(e) {
            const especialidad = document.getElementById('especialidadInput').value;
            if (!especialidad) {
                alert("Por favor selecciona una especialidad médica primero.");
                return;
            }

            document.getElementById('seccion-calendario').scrollIntoView({ behavior: 'smooth' });

            document.getElementById('seccionHorariosDisponibles').style.display = 'block';
            document.getElementById('contenedorBtnConfirmar').style.display = 'block';
        });

        document.getElementById('formAgendarCita').addEventListener('submit', function(e) {
            e.preventDefault();

            const especialidad = document.getElementById('especialidadInput').value;
            const medico = document.getElementById('medicoSeleccionadoHidden').value;
            const sede = document.getElementById('sedeSeleccionadaHidden').value;
            const horaFormateada = document.getElementById('horaSeleccionadaHidden').value;
            const codigoCita = '#CIT-' + Math.floor(1000 + Math.random() * 9000);

            const contenedor = document.getElementById('contenedorCitas');
            const nuevaColumna = document.createElement('div');
            nuevaColumna.className = 'col-lg-6 cita-item';
            nuevaColumna.innerHTML = `
                <div class="card-appointment h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge px-3 py-1 rounded-pill fw-semibold" style="background: rgba(124, 58, 237, 0.15); color: #c084fc; border: 1px solid rgba(124, 58, 237, 0.3); font-size: 0.75rem;">
                            <i class="bi bi-check-circle-fill me-1"></i> Confirmada vía Calendario
                        </span>
                        <small class="text-secondary font-monospace px-2 py-1 rounded" style="background: rgba(255,255,255,0.03);">${codigoCita}</small>
                    </div>

                    <div class="d-flex align-items-center mb-4">
                        <div class="appointment-icon me-3">
                            <i class="bi bi-hospital"></i>
                        </div>
                        <div>
                            <h4 class="text-white fw-semibold mb-0 fs-5 hero-title-modern">${especialidad}</h4>
                            <span class="text-secondary small d-flex align-items-center mt-1">
                                <i class="bi bi-person-badge me-1" style="color: #a78bfa;"></i> ${medico}
                            </span>
                        </div>
                    </div>

                    <div class="time-box-inner mb-3">
                        <div class="row text-center align-items-center">
                            <div class="col-6 border-end border-secondary border-opacity-10">
                                <span class="text-secondary small d-block mb-1" style="font-size: 0.7rem;">FECHA</span>
                                <strong class="text-white fw-semibold fs-6">${fechaActualElegida}</strong>
                            </div>
                            <div class="col-6">
                                <span class="text-secondary small d-block mb-1" style="font-size: 0.7rem;">HORA</span>
                                <strong class="text-white fw-semibold fs-6" style="color: #c084fc;">${horaFormateada}</strong>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-auto pt-2">
                        <p class="text-secondary small mb-0"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> ${sede}</p>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-light px-3 py-1.5" style="border-radius: 0.5rem; font-size: 0.8rem; border-color: rgba(255,255,255,0.15);">
                                <i class="bi bi-eye me-1"></i> Ver
                            </button>
                            <button class="btn btn-sm px-3 py-1.5 text-danger btn-cancelar" style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.2); border-radius: 0.5rem; font-size: 0.8rem;">
                                <i class="bi bi-x-lg me-1"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            `;

            contenedor.prepend(nuevaColumna);

            const totalCitas = document.querySelectorAll('.cita-item').length;
            document.getElementById('contadorProximas').innerText = totalCitas + ' Activas';

            document.getElementById('seccionHorariosDisponibles').style.display = 'none';
            document.getElementById('contenedorBtnConfirmar').style.display = 'none';
            
            const modalEl = document.getElementById('agendarCitaModal');
            const modalInstance = bootstrap.Modal.getInstance(modalEl);
            modalInstance.hide();
        });

        document.addEventListener('click', function(e) {
            if (e.target.closest('.btn-cancelar')) {
                const tarjetaItem = e.target.closest('.cita-item');
                if (tarjetaItem) {
                    tarjetaItem.remove();
                    const totalCitas = document.querySelectorAll('.cita-item').length;
                    document.getElementById('contadorProximas').innerText = totalCitas + ' Activas';
                }
            }
        });
    </script>
</body>
</html>