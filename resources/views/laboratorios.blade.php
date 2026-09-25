<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MediSoft - Laboratorios e Imágenes Diagnósticas</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --app-bg: #07090e;
            --surface-main: #0d121f;
            --surface-card: #131c31;
            --surface-card-hover: #1a2642;
            --border-subtle: rgba(255, 255, 255, 0.12);
            --border-focus: rgba(56, 189, 248, 0.5);
            --accent-cyan: #38bdf8;
            --accent-purple: #a855f7;
            --text-main: #ffffff;
            --text-muted: #ffffff;
        }

        body {
            background-color: var(--app-bg);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            background-image: 
                radial-gradient(circle at 10% 10%, rgba(56, 189, 248, 0.05) 0%, transparent 45%),
                radial-gradient(circle at 90% 90%, rgba(168, 85, 247, 0.05) 0%, transparent 45%);
        }

        /* Hero App Header */
        .app-hero {
            background: linear-gradient(180deg, rgba(13, 18, 31, 0.9) 0%, rgba(7, 9, 14, 0.98) 100%);
            border-bottom: 1px solid var(--border-subtle);
            padding: 2.5rem 0 2rem 0;
            backdrop-filter: blur(12px);
        }

        .app-badge {
            background: rgba(56, 189, 248, 0.12);
            border: 1px solid rgba(56, 189, 248, 0.3);
            color: var(--accent-cyan);
            font-size: 0.75rem;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            padding: 0.35rem 0.9rem;
            border-radius: 50rem;
            font-weight: 700;
        }

        .app-title {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #ffffff;
        }

        .app-subtitle {
            font-size: 0.95rem;
            color: #e2e8f0;
            max-width: 600px;
        }

        .btn-back-app {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-subtle);
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 50rem;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-back-app:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.25);
        }

        /* Search Bar & Filters UI */
        .search-dock {
            background: var(--surface-main);
            border: 1px solid var(--border-subtle);
            border-radius: 50rem;
            padding: 0.5rem 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .search-input-app {
            background: transparent;
            border: none;
            color: #ffffff;
            font-size: 0.9rem;
            outline: none;
            width: 100%;
        }
        .search-input-app::placeholder { color: #ffffff; opacity: 0.7; }

        .filter-chip {
            border-radius: 50rem;
            padding: 0.45rem 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid transparent;
            background: transparent;
            color: #ffffff;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .filter-chip:hover { color: #ffffff; background: rgba(255, 255, 255, 0.08); }
        .filter-chip.active {
            color: var(--accent-cyan);
            background: rgba(56, 189, 248, 0.15);
            border-color: rgba(56, 189, 248, 0.35);
        }

        /* Glass Cards App Style */
        .app-card {
            background: var(--surface-card);
            border: 1px solid var(--border-subtle);
            border-radius: 1.1rem;
            transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.4);
        }
        .app-card:hover {
            background: var(--surface-card-hover);
            border-color: rgba(56, 189, 248, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 14px 35px rgba(0, 0, 0, 0.5);
        }

        /* Botones de Acción Estilizados */
        .btn-app-primary {
            background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            border-radius: 0.65rem;
            transition: all 0.2s;
        }
        .btn-app-primary:hover {
            background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(2, 132, 199, 0.4);
        }

        .btn-app-subtle {
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-subtle);
            color: #ffffff;
            border-radius: 0.65rem;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-app-subtle:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.25);
        }

        .btn-app-danger {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #fca5a5;
            border-radius: 0.65rem;
            font-weight: 600;
            transition: all 0.2s;
        }
        .btn-app-danger:hover {
            background: rgba(239, 68, 68, 0.18);
            border-color: rgba(239, 68, 68, 0.45);
            color: #ffffff;
        }

        /* Panel Lateral de Alertas */
        .app-sidebar-panel {
            background: var(--surface-main);
            border: 1px solid var(--border-subtle);
            border-radius: 1.1rem;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.5);
        }

        .alert-item-card {
            background: rgba(239, 68, 68, 0.06);
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-left: 3.5px solid #ef4444;
            border-radius: 0.75rem;
            padding: 0.85rem 1rem;
        }

        .empty-state-app {
            background: rgba(255, 255, 255, 0.03);
            border: 1px dashed rgba(255, 255, 255, 0.2);
            border-radius: 0.9rem;
        }

        .status-badge {
            background: rgba(234, 179, 8, 0.2);
            color: #fde047;
            border: 1px solid rgba(234, 179, 8, 0.4);
            font-weight: 700;
            padding: 0.3rem 0.75rem;
            border-radius: 50rem;
            font-size: 0.75rem;
        }

        .text-xxs { font-size: 0.8rem; }
        .text-xs { font-size: 0.85rem; }

        /* Modal App UI */
        .modal-content {
            background: var(--surface-main);
            border: 1px solid var(--border-subtle);
            border-radius: 1.1rem;
            color: #ffffff;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.8);
        }
        .modal-header, .modal-footer { border-color: var(--border-subtle); }
    </style>
</head>
<body class="pb-5">

    <!-- Hero Header App -->
    <div class="app-hero px-4 px-md-5 mb-4">
        <div class="container-fluid px-lg-5">
            <div class="row align-items-center justify-content-between g-3 mb-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="app-badge"><i class="bi bi-shield-check me-1"></i> Synlab & Idime API Hub</span>
                    </div>
                    <h1 class="app-title mb-2">Laboratorios e Imágenes</h1>
                    <p class="app-subtitle mb-0">Gestión clínica centralizada, órdenes en red aliada, notificaciones en tiempo real y analítica de tendencias diagnósticas.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('dashboard') }}" class="btn btn-back-app d-inline-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> Volver al Inicio
                    </a>
                </div>
            </div>

            <!-- Barra de búsqueda flotante -->
            <div class="row">
                <div class="col-xl-10 mx-auto">
                    <div class="search-dock">
                        <div class="row align-items-center g-2">
                            <div class="col-lg-7">
                                <div class="d-flex align-items-center px-2">
                                    <i class="bi bi-search text-info fs-5 me-2"></i>
                                    <input type="text" id="searchInput" class="search-input-app" 
                                           placeholder="Buscar por código, examen o paciente..." oninput="filtrarOrdenes()">
                                </div>
                            </div>
                            <div class="col-lg-5 text-lg-end">
                                <div class="d-inline-flex gap-1">
                                    <button class="filter-chip active" onclick="filtrarPorEstado('todos', this)">Todas</button>
                                    <button class="filter-chip" onclick="filtrarPorEstado('pendiente', this)">Pendientes</button>
                                    <button class="filter-chip" onclick="filtrarPorEstado('procesado', this)">Listas</button>
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
            
            <!-- Listado de Órdenes -->
            <div class="col-xl-8">
                <div class="row g-4" id="ordersContainer">
                    
                    <!-- Tarjeta Orden 1 -->
                    <div class="col-md-6 order-card" data-status="pendiente">
                        <div class="app-card p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-info font-monospace text-xs px-3 py-1 rounded-pill fw-bold" style="background: rgba(56, 189, 248, 0.15); border: 1px solid rgba(56, 189, 248, 0.3);">
                                        <i class="bi bi-file-earmark-medical me-1"></i> #LAB-40192
                                    </span>
                                    <span class="status-badge">Pendiente Agendar</span>
                                </div>
                                <h4 class="text-white fw-bold mb-2 fs-5">Hemograma Completo + Glicemia</h4>
                                <p class="text-white text-xs mb-3 fw-medium">Solicitante: <span class="text-white fw-bold">Dra. Marcela Uribe</span></p>
                                
                                <!-- Recuadro interno con fondo más sutil y buen espaciado -->
                                <div class="px-3 py-3 rounded-3 mb-4" style="background: rgba(0, 0, 0, 0.2); border: 1px solid rgba(255, 255, 255, 0.08);">
                                    <div class="d-flex justify-content-between align-items-center mb-2 text-xs">
                                        <span class="text-white fw-bold">Paciente</span>
                                        <span class="text-white fw-bold">Carlos Andrés Pérez</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center text-xs">
                                        <span class="text-white fw-bold">Red aliada</span>
                                        <span class="text-info fw-bold">Synlab, Idime</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-2.5">
                                <button onclick="simularAgendamiento('LAB-40192', 'Synlab Central')" class="btn w-100 btn-app-primary py-2.5 text-xs fw-bold">
                                    <i class="bi bi-calendar-plus me-1"></i> Agendar Cita de Toma
                                </button>
                                <div class="d-flex gap-2">
                                    <button onclick="verTendencias('Carlos Andrés Pérez', 'Glicemia en Ayunas')" class="btn flex-fill btn-app-subtle py-2 text-xs">
                                        <i class="bi bi-graph-up me-1"></i> Tendencias
                                    </button>
                                    <button onclick="descargarResultadoPDF('LAB-40192', 'Carlos Andrés Pérez')" class="btn flex-fill btn-app-subtle py-2 text-xs">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> PDF
                                    </button>
                                </div>
                                <button onclick="simularWebhookLaboratorio('LAB-40192', 'Glicemia', 145, 'mg/dL', 'CRÍTICO')" class="btn w-100 btn-app-danger py-2 text-xs mt-1">
                                    <i class="bi bi-exclamation-triangle me-1"></i> Simular Resultado Crítico
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta Orden 2 -->
                    <div class="col-md-6 order-card" data-status="pendiente">
                        <div class="app-card p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-info font-monospace text-xs px-3 py-1 rounded-pill fw-bold" style="background: rgba(56, 189, 248, 0.15); border: 1px solid rgba(56, 189, 248, 0.3);">
                                        <i class="bi bi-file-earmark-image me-1"></i> #IMG-88210
                                    </span>
                                    <span class="status-badge">Pendiente Agendar</span>
                                </div>
                                <h4 class="text-white fw-bold mb-2 fs-5">Ecografía Abdominal Total</h4>
                                <p class="text-white text-xs mb-3 fw-medium">Solicitante: <span class="text-white fw-bold">Dr. Esteban Hoyos</span></p>
                                
                                <!-- Recuadro interno con fondo más sutil y buen espaciado -->
                                <div class="px-3 py-3 rounded-3 mb-4" style="background: rgba(0, 0, 0, 0.2); border: 1px solid rgba(255, 255, 255, 0.08);">
                                    <div class="d-flex justify-content-between align-items-center mb-2 text-xs">
                                        <span class="text-white fw-bold">Paciente</span>
                                        <span class="text-white fw-bold">Ana María Gómez</span>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center text-xs">
                                        <span class="text-white fw-bold">Red aliada</span>
                                        <span class="text-info fw-bold">Idime Imágenes</span>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex flex-column gap-2.5">
                                <button onclick="simularAgendamiento('IMG-88210', 'Idime Norte')" class="btn w-100 btn-app-primary py-2.5 text-xs fw-bold">
                                    <i class="bi bi-calendar-plus me-1"></i> Agendar Cita Imagen
                                </button>
                                <div class="d-flex gap-2">
                                    <button onclick="verTendencias('Ana María Gómez', 'Ecografía Abdominal')" class="btn flex-fill btn-app-subtle py-2 text-xs">
                                        <i class="bi bi-graph-up me-1"></i> DICOM
                                    </button>
                                    <button onclick="descargarResultadoPDF('IMG-88210', 'Ana María Gómez')" class="btn flex-fill btn-app-subtle py-2 text-xs">
                                        <i class="bi bi-file-earmark-pdf me-1"></i> Reporte
                                    </button>
                                </div>
                                <button onclick="simularWebhookLaboratorio('IMG-88210', 'Ecografía', 'Sin alteraciones', 'N/A', 'Normal')" class="btn w-100 btn-app-subtle py-2 text-xs mt-1 border-info border-opacity-50 text-info">
                                    <i class="bi bi-check-circle me-1"></i> Simular Resultado Normal
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Panel Lateral de Alertas -->
            <div class="col-xl-4">
                <div class="app-sidebar-panel p-4 sticky-top" style="top: 1.5rem;">
                    <div class="d-flex align-items-center justify-content-between mb-3 pb-2 border-bottom border-danger border-opacity-25">
                        <h5 class="text-white fw-bold mb-0 d-flex align-items-center gap-2 fs-6">
                            <i class="bi bi-exclamation-octagon text-danger fs-5"></i> Alertas Rojas Médicas
                        </h5>
                        <span class="badge bg-danger bg-opacity-25 text-danger border border-danger border-opacity-40 text-xs px-3 py-1 rounded-pill fw-bold" id="alertCountBadge">
                            0 Activas
                        </span>
                    </div>

                    <p class="text-white text-xs mb-3">Recepción automatizada de laboratorios y estudios para valores críticos:</p>
                    
                    <div id="alertasContainer" class="d-flex flex-column gap-3" style="max-height: 480px; overflow-y: auto;">
                        <div class="empty-state-app p-4 text-center">
                            <i class="bi bi-shield-check text-info fs-3 mb-2 d-block"></i>
                            <span class="text-white fw-bold text-xs d-block mb-1">Sin alertas pendientes</span>
                            <span class="text-white text-xs opacity-90">Los resultados críticos aparecerán automáticamente aquí.</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal Tendencias -->
    <div class="modal fade" id="modalTendencias" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-white fw-bold fs-5 d-flex align-items-center gap-2">
                        <i class="bi bi-graph-up-arrow text-info"></i> Analítica de Tendencias
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3">
                    <p class="text-white text-xs mb-3">Historial evolutivo para <strong id="modalExamenNombre" class="text-white">Examen</strong>:</p>
                    <div class="px-3 py-3 rounded-3 mb-2" style="background: rgba(0, 0, 0, 0.2); border: 1px solid rgba(255, 255, 255, 0.08);">
                        <div class="d-flex justify-content-between mb-2 text-xs">
                            <span class="text-white fw-bold">Paciente:</span>
                            <span id="modalPacienteNombre" class="text-white fw-bold">Nombre</span>
                        </div>
                        <hr class="border-secondary opacity-40 my-2">
                        <div class="d-flex justify-content-between align-items-center mb-2 text-xs">
                            <span class="text-white fw-bold">Hace 3 meses:</span>
                            <span class="text-white fw-semibold">98 mg/dL <span class="badge bg-success bg-opacity-25 text-success ms-1">Normal</span></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2 text-xs">
                            <span class="text-white fw-bold">Hace 1 mes:</span>
                            <span class="text-white fw-semibold">112 mg/dL <span class="badge bg-warning bg-opacity-25 text-warning ms-1">Elevado</span></span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center text-xs">
                            <span class="text-info fw-bold">Actual:</span>
                            <span class="text-info fw-bold">145 mg/dL <span class="badge bg-danger bg-opacity-25 text-danger ms-1">Crítico</span></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-app-primary w-100 text-xs py-2.5 fw-bold" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts de Interacción -->
    <script>
        let currentStatusFilter = 'todos';
        let alertCount = 0;

        function filtrarOrdenes() {
            let query = document.getElementById('searchInput').value.toLowerCase().trim();
            let cards = document.querySelectorAll('.order-card');

            cards.forEach(card => {
                let cardText = card.innerText.toLowerCase();
                let cardStatus = card.getAttribute('data-status');
                
                let matchesSearch = cardText.includes(query);
                let matchesStatus = (currentStatusFilter === 'todos' || cardStatus === currentStatusFilter);

                card.style.display = (matchesSearch && matchesStatus) ? 'block' : 'none';
            });
        }

        function filtrarPorEstado(status, btn) {
            currentStatusFilter = status;
            document.querySelectorAll('.filter-chip').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            filtrarOrdenes();
        }

        function simularAgendamiento(ordenId, sede) {
            alert(`Cita agendada con éxito en ${sede} para la orden ${ordenId}.`);
        }

        function descargarResultadoPDF(ordenId, paciente) {
            alert(`Generando reporte PDF oficial para la orden #${ordenId} de ${paciente}...`);
        }

        function verTendencias(paciente, examen) {
            document.getElementById('modalPacienteNombre').innerText = paciente;
            document.getElementById('modalExamenNombre').innerText = examen;
            let modal = new bootstrap.Modal(document.getElementById('modalTendencias'));
            modal.show();
        }

        function simularWebhookLaboratorio(ordenId, examen, valor, unidad, estadoClinico) {
            const container = document.getElementById('alertasContainer');
            
            if (alertCount === 0) {
                container.innerHTML = '';
            }
            alertCount++;
            document.getElementById('alertCountBadge').innerText = `${alertCount} Activas`;

            let alertaId = `alerta-${Date.now()}`;

            let alertaHTML = `
                <div class="alert-item-card" id="${alertaId}">
                    <div class="d-flex justify-content-between align-items-center mb-1.5">
                        <span class="text-danger fw-bold text-xs"><i class="bi bi-bell-fill me-1"></i> ${ordenId}</span>
                        <span class="badge bg-danger text-white text-xs px-2.5 py-0.5 rounded-1 fw-bold">Urgente</span>
                    </div>
                    <p class="text-white text-xs mb-2">Examen: <strong>${examen}</strong><br>Resultado: <strong class="text-danger">${valor} ${unidad}</strong></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-white text-xs">Notificación Automática</span>
                        <button class="btn btn-sm btn-app-subtle text-xs py-1 px-2.5 fw-bold text-white" onclick="atenderAlerta('${alertaId}')">
                            <i class="bi bi-check2 me-1"></i> Atender
                        </button>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('afterbegin', alertaHTML);
        }

        function atenderAlerta(alertaId) {
            const elem = document.getElementById(alertaId);
            if (elem) {
                elem.remove();
                alertCount = Math.max(0, alertCount - 1);
                document.getElementById('alertCountBadge').innerText = `${alertCount} Activas`;

                if (alertCount === 0) {
                    document.getElementById('alertasContainer').innerHTML = `
                        <div class="empty-state-app p-4 text-center">
                            <i class="bi bi-shield-check text-info fs-3 mb-2 d-block"></i>
                            <span class="text-white fw-bold text-xs d-block mb-1">Sin alertas pendientes</span>
                            <span class="text-white text-xs opacity-90">Los resultados críticos aparecerán automáticamente aquí.</span>
                        </div>
                    `;
                }
            }
        }
    </script>
</body>
</html>