<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MediSoft - Módulo Audifarma</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #04060f;
            color: #f1f5f9;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Banner Superior Ampliado */
        .hero-banner {
            position: relative;
            width: 100%;
            padding-top: 3.8rem;
            padding-bottom: 3.8rem;
            background: linear-gradient(135deg, rgba(8, 11, 26, 0.90), rgba(4, 6, 15, 0.95)), 
                        url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
            border-bottom: 1px solid rgba(168, 85, 247, 0.25);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.6);
            overflow: hidden;
        }

        .hero-banner::before {
            content: '';
            position: absolute;
            top: -30%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .badge-system-pill {
            background: rgba(139, 92, 246, 0.15);
            border: 1px solid rgba(192, 132, 252, 0.35);
            color: #d8b4fe;
            font-size: 0.72rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 0.35rem 0.85rem;
            border-radius: 50rem;
            backdrop-filter: blur(10px);
        }

        .banner-title {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffffff 30%, #c084fc 70%, #38bdf8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.8px;
            line-height: 1.2;
        }

        .banner-subtitle {
            font-size: 1rem;
            color: #94a3b8;
            max-width: 650px;
            line-height: 1.5;
        }

        .btn-volver-pro {
            background: rgba(20, 24, 45, 0.8);
            border: 1px solid rgba(56, 189, 248, 0.3);
            color: #e2e8f0;
            padding: 0.6rem 1.25rem;
            border-radius: 50rem;
            font-size: 0.82rem;
            font-weight: 600;
            backdrop-filter: blur(12px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .btn-volver-pro:hover {
            background: rgba(56, 189, 248, 0.15);
            border-color: #38bdf8;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(56, 189, 248, 0.25);
        }

        /* Barra de Control con Margen Superior Ajustado */
        .search-control-bar {
            background: linear-gradient(135deg, rgba(16, 20, 38, 0.85), rgba(10, 14, 28, 0.92));
            border: 1px solid rgba(168, 85, 247, 0.35);
            backdrop-filter: blur(25px);
            border-radius: 50rem;
            padding: 0.75rem 1.5rem;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5), inset 0 1px 1px rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .search-control-bar:focus-within {
            border-color: #38bdf8;
            box-shadow: 0 0 25px rgba(56, 189, 248, 0.25), 0 12px 35px rgba(0, 0, 0, 0.5);
        }

        .search-input-modern {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 0.9rem;
            box-shadow: none;
            outline: none;
            width: 100%;
        }
        .search-input-modern:focus {
            background: transparent;
            border: none;
            color: #fff;
            box-shadow: none;
            outline: none;
        }
        .search-input-modern::placeholder { color: #94a3b8; }

        .filters-pill-group {
            background: rgba(8, 11, 22, 0.6);
            border: 1px solid rgba(139, 92, 246, 0.2);
            border-radius: 50rem;
            padding: 0.25rem;
            display: inline-flex;
            gap: 4px;
        }

        .btn-filter-pill {
            border-radius: 50rem;
            padding: 0.45rem 1rem;
            font-size: 0.78rem;
            font-weight: 600;
            border: none;
            background: transparent;
            color: #94a3b8;
            transition: all 0.25s ease;
            white-space: nowrap;
        }
        
        .btn-filter-pill:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.05);
        }

        .btn-filter-pill.active {
            color: #ffffff;
            background: linear-gradient(135deg, #8b5cf6, #3b82f6);
            box-shadow: 0 4px 12px rgba(139, 92, 246, 0.4);
        }

        /* Tarjetas y Estilos Generales */
        .card-custom {
            background: linear-gradient(145deg, rgba(20, 24, 45, 0.8), rgba(13, 17, 32, 0.85));
            border: 1px solid rgba(168, 85, 247, 0.2);
            backdrop-filter: blur(20px);
            border-radius: 1.15rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
        }
        .card-custom:hover {
            border-color: rgba(56, 189, 248, 0.5);
            box-shadow: 0 12px 30px -5px rgba(124, 58, 237, 0.3);
            transform: translateY(-3px);
        }

        .text-purple { color: #c084fc !important; }
        .text-cyan { color: #38bdf8 !important; }

        .btn-gradient {
            background: linear-gradient(135deg, #8b5cf6, #3b82f6);
            border: none;
            color: #ffffff;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.4);
        }
        .btn-gradient:hover {
            opacity: 0.95;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.6);
            color: #ffffff;
        }

        .panel-turnos-card {
            background: linear-gradient(165deg, rgba(18, 22, 44, 0.95), rgba(10, 14, 28, 0.95));
            border: 1px solid rgba(56, 189, 248, 0.25);
            border-radius: 1.25rem;
            backdrop-filter: blur(20px);
            box-shadow: 0 10px 35px rgba(56, 189, 248, 0.1);
        }

        .empty-state-box {
            background: rgba(15, 23, 42, 0.5);
            border: 1px dashed rgba(139, 92, 246, 0.3);
            border-radius: 1rem;
        }
        .empty-icon-subtle {
            font-size: 2.5rem;
            color: #c084fc;
        }

        .ticket-card-item {
            background: rgba(25, 31, 56, 0.85);
            border: 1px solid rgba(56, 189, 248, 0.25);
            border-radius: 0.9rem;
            padding: 1.1rem;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }
        .ticket-card-item:hover {
            border-color: #c084fc;
            background: rgba(30, 38, 68, 0.95);
            box-shadow: 0 6px 20px rgba(192, 132, 252, 0.2);
        }

        .text-xxs { font-size: 0.75rem; }
        
        .badge-pending {
            background: rgba(234, 179, 8, 0.15);
            color: #fde047;
            border: 1px solid rgba(234, 179, 8, 0.35);
        }
        .badge-success-custom {
            background: rgba(34, 197, 94, 0.15);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.35);
        }
    </style>
</head>
<body class="pb-5">

    <!-- Banner Superior Ampliado -->
    <div class="hero-banner px-4 px-md-5 mb-4">
        <div class="container-fluid px-lg-5">
            
            <div class="row align-items-center justify-content-between g-4 mb-2">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="badge-system-pill d-inline-flex align-items-center gap-1.5 shadow-sm">
                            <i class="bi bi-shield-check text-cyan"></i> Sistema Clínico Seguro
                        </span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <span class="p-2.5 rounded-3 shadow-sm d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, rgba(139, 92, 246, 0.25), rgba(59, 130, 246, 0.25)); border: 1px solid rgba(192, 132, 252, 0.4);">
                            <i class="bi bi-capsule text-purple fs-4"></i>
                        </span>
                        <h1 class="banner-title mb-0">Módulo Audifarma</h1>
                    </div>
                    <p class="banner-subtitle mb-0">Verificación de stock en tiempo real, trazabilidad de órdenes médicas y generación de turnos digitales seguros.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ url('/dashboard') }}" class="btn btn-volver-pro d-inline-flex align-items-center gap-2 text-decoration-none">
                        <i class="bi bi-arrow-left text-cyan"></i> Volver al Inicio
                    </a>
                </div>
            </div>

            <!-- BARRA DE BÚSQUEDA MÁS ABAJO (Con mt-5) -->
            <div class="row mt-5">
                <div class="col-xl-10 mx-auto">
                    <div class="search-control-bar">
                        <div class="row align-items-center g-3">
                            
                            <!-- Input de Búsqueda -->
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center px-2">
                                    <i class="bi bi-search text-cyan fs-5 me-3 flex-shrink-0"></i>
                                    <input type="text" id="searchInput" class="search-input-modern" 
                                           placeholder="Buscar por código de orden, medicamento o médico..." oninput="filtrarOrdenes()">
                                </div>
                            </div>

                            <!-- Filtros en Píldoras -->
                            <div class="col-lg-5 text-lg-end">
                                <div class="filters-pill-group">
                                    <button class="btn-filter-pill active" onclick="filtrarPorEstado('todos', this)">
                                        <i class="bi bi-grid me-1"></i> Todas
                                    </button>
                                    <button class="btn-filter-pill" onclick="filtrarPorEstado('pendiente', this)">
                                        <i class="bi bi-clock me-1"></i> Pendientes
                                    </button>
                                    <button class="btn-filter-pill" onclick="filtrarPorEstado('disponible', this)">
                                        <i class="bi bi-check-circle me-1"></i> Disponibles
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Contenido Principal -->
    <div class="container-fluid px-4 px-md-5">
        <div class="row g-4">
            
            <!-- Órdenes Médicas -->
            <div class="col-xl-8">
                <div class="row g-4" id="ordersContainer">
                    
                    <!-- Orden 1 -->
                    <div class="col-md-6 order-card" data-status="pendiente">
                        <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-purple fw-bold text-xxs tracking-wider"><i class="bi bi-receipt me-1"></i> ORDEN #AUD-98241</span>
                                    <span class="badge badge-pending text-xxs px-2.5 py-1 rounded-pill fw-semibold">Pendiente Sede</span>
                                </div>
                                <h4 class="text-white fw-bold fs-6 mb-1">Acetaminofén 500mg / Ibuprofeno 400mg</h4>
                                <p class="text-secondary text-xxs mb-3"><strong>Médico:</strong> Dr. Carlos Gómez</p>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between text-xxs text-secondary mb-1">
                                        <span>Dosis: 1 c/8h</span>
                                        <span class="text-cyan fw-medium">Cant: 30 und</span>
                                    </div>
                                    <div class="text-xxs text-secondary">Válida hasta: <strong class="text-white">20 Oct 2026</strong></div>
                                </div>
                            </div>
                            <div id="api-stock-result-AUD-98241" class="mt-2">
                                <div class="p-3 rounded-2 border border-purple border-opacity-30 shadow-sm" style="background: rgba(15, 23, 42, 0.95);">
                                    <div class="text-success text-xxs fw-bold mb-2">
                                        <i class="bi bi-check-circle me-1"></i> Inventario verificado con éxito
                                    </div>
                                    <p class="text-secondary text-xxs mb-2">Sucursales con unidades disponibles:</p>
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <div class="d-flex justify-content-between align-items-center p-2 rounded-1 border border-secondary border-opacity-15" style="background: rgba(25, 31, 56, 0.6);">
                                            <span class="text-white text-xxs"><i class="bi bi-geo-alt text-cyan me-1"></i> Sede Norte (Calle 100 con 15)</span>
                                            <span class="badge badge-success-custom text-xxs">30 disp.</span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center p-2 rounded-1 border border-secondary border-opacity-15" style="background: rgba(25, 31, 56, 0.6);">
                                            <span class="text-white text-xxs"><i class="bi bi-geo-alt text-cyan me-1"></i> Sede Centro (Carrera 7 con 32)</span>
                                            <span class="badge badge-success-custom text-xxs">12 disp.</span>
                                        </div>
                                    </div>
                                    <button onclick="generarTurnoConToken('AUD-98241')" class="btn btn-sm w-100 btn-gradient py-2.5 rounded-2 text-xxs fw-bold shadow-sm">
                                        <i class="bi bi-qr-code-scan me-1"></i> Generar Turno Digital y Token Seguro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orden 2 -->
                    <div class="col-md-6 order-card" data-status="disponible">
                        <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-purple fw-bold text-xxs tracking-wider"><i class="bi bi-receipt me-1"></i> ORDEN #AUD-55410</span>
                                    <span class="badge badge-success-custom text-xxs px-2.5 py-1 rounded-pill fw-semibold">Disponible</span>
                                </div>
                                <h4 class="text-white fw-bold fs-6 mb-1">Amoxicilina 500mg Cápsulas</h4>
                                <p class="text-secondary text-xxs mb-3"><strong>Médico:</strong> Dra. Sofía Ramírez</p>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between text-xxs text-secondary mb-1">
                                        <span>Dosis: 1 c/12h</span>
                                        <span class="text-cyan fw-medium">Cant: 20 und</span>
                                    </div>
                                    <div class="text-xxs text-secondary">Válida hasta: <strong class="text-white">15 Nov 2026</strong></div>
                                </div>
                            </div>
                            <div id="api-stock-result-AUD-55410" class="mt-2">
                                <div class="p-3 rounded-2 border border-purple border-opacity-30 shadow-sm" style="background: rgba(15, 23, 42, 0.95);">
                                    <div class="text-success text-xxs fw-bold mb-2">
                                        <i class="bi bi-check-circle me-1"></i> Inventario verificado con éxito
                                    </div>
                                    <p class="text-secondary text-xxs mb-2">Sucursales con unidades disponibles:</p>
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <div class="d-flex justify-content-between align-items-center p-2 rounded-1 border border-secondary border-opacity-15" style="background: rgba(25, 31, 56, 0.6);">
                                            <span class="text-white text-xxs"><i class="bi bi-geo-alt text-cyan me-1"></i> Sede Principal (Av. El Dorado)</span>
                                            <span class="badge badge-success-custom text-xxs">20 disp.</span>
                                        </div>
                                    </div>
                                    <button onclick="generarTurnoConToken('AUD-55410')" class="btn btn-sm w-100 btn-gradient py-2.5 rounded-2 text-xxs fw-bold shadow-sm">
                                        <i class="bi bi-qr-code-scan me-1"></i> Generar Turno Digital y Token Seguro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orden 3 -->
                    <div class="col-md-6 order-card" data-status="pendiente">
                        <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-purple fw-bold text-xxs tracking-wider"><i class="bi bi-receipt me-1"></i> ORDEN #AUD-77312</span>
                                    <span class="badge badge-pending text-xxs px-2.5 py-1 rounded-pill fw-semibold">Pendiente Sede</span>
                                </div>
                                <h4 class="text-white fw-bold fs-6 mb-1">Losartana Potásica 50mg</h4>
                                <p class="text-secondary text-xxs mb-3"><strong>Médico:</strong> Dr. Alejandro Pérez</p>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between text-xxs text-secondary mb-1">
                                        <span>Dosis: 1 diaria</span>
                                        <span class="text-cyan fw-medium">Cant: 60 und</span>
                                    </div>
                                    <div class="text-xxs text-secondary">Válida hasta: <strong class="text-white">10 Dic 2026</strong></div>
                                </div>
                            </div>
                            <div id="api-stock-result-AUD-77312" class="mt-2">
                                <div class="p-3 rounded-2 border border-purple border-opacity-30 shadow-sm" style="background: rgba(15, 23, 42, 0.95);">
                                    <div class="text-success text-xxs fw-bold mb-2">
                                        <i class="bi bi-check-circle me-1"></i> Inventario verificado con éxito
                                    </div>
                                    <p class="text-secondary text-xxs mb-2">Sucursales con unidades disponibles:</p>
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <div class="d-flex justify-content-between align-items-center p-2 rounded-1 border border-secondary border-opacity-15" style="background: rgba(25, 31, 56, 0.6);">
                                            <span class="text-white text-xxs"><i class="bi bi-geo-alt text-cyan me-1"></i> Sede Sur (Auto Sur)</span>
                                            <span class="badge badge-success-custom text-xxs">60 disp.</span>
                                        </div>
                                    </div>
                                    <button onclick="generarTurnoConToken('AUD-77312')" class="btn btn-sm w-100 btn-gradient py-2.5 rounded-2 text-xxs fw-bold shadow-sm">
                                        <i class="bi bi-qr-code-scan me-1"></i> Generar Turno Digital y Token Seguro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orden 4 -->
                    <div class="col-md-6 order-card" data-status="disponible">
                        <div class="card card-custom p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-purple fw-bold text-xxs tracking-wider"><i class="bi bi-receipt me-1"></i> ORDEN #AUD-88904</span>
                                    <span class="badge badge-success-custom text-xxs px-2.5 py-1 rounded-pill fw-semibold">Disponible</span>
                                </div>
                                <h4 class="text-white fw-bold fs-6 mb-1">Omeprazol 20mg Cápsulas</h4>
                                <p class="text-secondary text-xxs mb-3"><strong>Médico:</strong> Dra. María F. López</p>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between text-xxs text-secondary mb-1">
                                        <span>Dosis: 1 en ayunas</span>
                                        <span class="text-cyan fw-medium">Cant: 30 und</span>
                                    </div>
                                    <div class="text-xxs text-secondary">Válida hasta: <strong class="text-white">05 Nov 2026</strong></div>
                                </div>
                            </div>
                            <div id="api-stock-result-AUD-88904" class="mt-2">
                                <div class="p-3 rounded-2 border border-purple border-opacity-30 shadow-sm" style="background: rgba(15, 23, 42, 0.95);">
                                    <div class="text-success text-xxs fw-bold mb-2">
                                        <i class="bi bi-check-circle me-1"></i> Inventario verificado con éxito
                                    </div>
                                    <p class="text-secondary text-xxs mb-2">Sucursales con unidades disponibles:</p>
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        <div class="d-flex justify-content-between align-items-center p-2 rounded-1 border border-secondary border-opacity-15" style="background: rgba(25, 31, 56, 0.6);">
                                            <span class="text-white text-xxs"><i class="bi bi-geo-alt text-cyan me-1"></i> Sede Norte (Calle 100 con 15)</span>
                                            <span class="badge badge-success-custom text-xxs">30 disp.</span>
                                        </div>
                                    </div>
                                    <button onclick="generarTurnoConToken('AUD-88904')" class="btn btn-sm w-100 btn-gradient py-2.5 rounded-2 text-xxs fw-bold shadow-sm">
                                        <i class="bi bi-qr-code-scan me-1"></i> Generar Turno Digital y Token Seguro
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Panel Lateral de Turnos -->
            <div class="col-xl-4">
                <div class="panel-turnos-card p-4 sticky-top" style="top: 2rem;">
                    
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-purple border-opacity-25">
                        <h5 class="text-white fw-bold fs-6 mb-0 d-flex align-items-center gap-2">
                            <i class="bi bi-ticket-perforated text-purple"></i> Panel de Turnos
                        </h5>
                        <span class="badge bg-purple bg-opacity-25 text-purple border border-purple border-opacity-40 text-xxs px-3 py-1 rounded-pill fw-bold" id="ticketCountBadge">
                            0 Activos
                        </span>
                    </div>
                    
                    <p class="text-secondary text-xxs mb-3">Los turnos digitales y tokens solicitados aparecerán en este espacio para su gestión:</p>
                    
                    <div id="ticketsPanelContainer" class="d-flex flex-column gap-3" style="max-height: 520px; overflow-y: auto; padding-right: 4px;">
                        
                        <div class="empty-state-box p-4 text-center">
                            <i class="bi bi-qr-code-scan empty-icon-subtle d-block mb-3"></i>
                            <h6 class="text-white fw-semibold text-xxs mb-1">No hay turnos activos aún</h6>
                            <p class="text-secondary text-xxs mb-0">Haz clic en <strong>"Generar Turno Digital"</strong> en cualquiera de las órdenes para visualizarlo aquí.</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script JavaScript -->
    <script>
        let currentStatusFilter = 'todos';
        let generatedTicketsCount = 0;

        function filtrarOrdenes() {
            let query = document.getElementById('searchInput').value.toLowerCase().trim();
            let cards = document.querySelectorAll('.order-card');

            cards.forEach(card => {
                let cardText = card.innerText.toLowerCase();
                let cardStatus = card.getAttribute('data-status');
                
                let matchesSearch = cardText.includes(query);
                let matchesStatus = (currentStatusFilter === 'todos' || cardStatus === currentStatusFilter);

                if (matchesSearch && matchesStatus) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        function filtrarPorEstado(status, btn) {
            currentStatusFilter = status;
            
            document.querySelectorAll('.btn-filter-pill').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            filtrarOrdenes();
        }

        async function generarTurnoConToken(orderCode) {
            try {
                let response = await fetch(`/api/audifarma/ticket/${orderCode}`, {
                    method: 'POST',
                    headers: { 
                        'Content-Type': 'application/json', 
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                let data = await response.json();

                if(data.success) {
                    const resultBox = document.getElementById(`api-stock-result-${orderCode}`);
                    resultBox.innerHTML += `
                        <div class="mt-2 p-2 rounded-2 border border-success border-opacity-25 bg-success bg-opacity-10 text-success text-xxs text-center fw-medium">
                            <i class="bi bi-check2 me-1"></i> Turno agregado al panel lateral.
                        </div>
                    `;

                    const panelContainer = document.getElementById('ticketsPanelContainer');
                    if(generatedTicketsCount === 0) {
                        panelContainer.innerHTML = ''; 
                    }

                    generatedTicketsCount++;
                    document.getElementById('ticketCountBadge').innerText = `${generatedTicketsCount} Activos`;

                    let ticketId = `ticket-${Date.now()}`;
                    let ticketHTML = `
                        <div class="ticket-card-item" id="${ticketId}">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-purple fw-bold text-xxs"><i class="bi bi-receipt me-1"></i> ${orderCode}</span>
                                <span class="badge bg-success text-white fw-bold text-xxs px-2.5 py-1 rounded-pill shadow-sm">
                                    <i class="bi bi-ticket-fill me-1"></i> ${data.ticket_number}
                                </span>
                            </div>
                            
                            <div class="p-2.5 rounded-2 mb-2" style="background: rgba(10, 14, 28, 0.8); border: 1px solid rgba(56, 189, 248, 0.2);">
                                <div class="d-flex justify-content-between align-items-center text-xxs mb-1">
                                    <span class="text-secondary">Token Seguro:</span>
                                    <button class="btn btn-link text-purple text-decoration-none text-xxs p-0 fw-bold" onclick="copiarToken('${data.authorization_token}', this)">
                                        <i class="bi bi-copy me-1"></i> Copiar
                                    </button>
                                </div>
                                <code class="text-cyan fw-bold text-xxs d-block">${data.authorization_token}</code>
                            </div>

                            <div class="d-flex justify-content-between align-items-center text-xxs text-secondary">
                                <span>Vence: <strong class="text-white">${data.expires_at}</strong></span>
                                <button class="btn btn-sm btn-link text-danger text-decoration-none p-0 text-xxs opacity-75" title="Descartar" onclick="eliminarTurno('${ticketId}')">
                                    <i class="bi bi-trash fs-6"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    panelContainer.insertAdjacentHTML('afterbegin', ticketHTML);
                }
            } catch (e) {
                console.error(e);
                alert('Ocurrió un error al generar el turno digital.');
            }
        }

        function copiarToken(token, btn) {
            navigator.clipboard.writeText(token);
            let prevHTML = btn.innerHTML;
            btn.innerHTML = `<i class="bi bi-check-lg text-success"></i> Copiado`;
            setTimeout(() => {
                btn.innerHTML = prevHTML;
            }, 2000);
        }

        function eliminarTurno(ticketId) {
            const ticketElem = document.getElementById(ticketId);
            if(ticketElem) {
                ticketElem.remove();
                generatedTicketsCount = Math.max(0, generatedTicketsCount - 1);
                document.getElementById('ticketCountBadge').innerText = `${generatedTicketsCount} Activos`;

                if(generatedTicketsCount === 0) {
                    document.getElementById('ticketsPanelContainer').innerHTML = `
                        <div class="empty-state-box p-4 text-center">
                            <i class="bi bi-qr-code-scan empty-icon-subtle d-block mb-3"></i>
                            <h6 class="text-white fw-semibold text-xxs mb-1">No hay turnos activos aún</h6>
                            <p class="text-secondary text-xxs mb-0">Haz clic en <strong>"Generar Turno Digital"</strong> en cualquiera de las órdenes para visualizarlo aquí.</p>
                        </div>
                    `;
                }
            }
        }
    </script>
</body>
</html>