<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial - MediSoft</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Fuente Plus Jakarta Sans y Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS de MediSoft -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .historial-card-custom {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(51, 65, 85, 0.6);
            backdrop-filter: blur(12px);
            border-radius: 1.5rem;
            transition: all 0.3s ease;
        }
        .historial-card-custom:hover {
            border-color: rgba(168, 85, 247, 0.4);
        }
        .stat-card-medisoft {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(51, 65, 85, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 1.25rem;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }
        .stat-card-medisoft:hover {
            transform: translateY(-3px);
            border-color: rgba(168, 85, 247, 0.3);
        }
        .table-medisoft {
            color: #f8fafc;
            vertical-align: middle;
        }
        .table-medisoft th {
            background-color: rgba(15, 23, 42, 0.6);
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            border-bottom: 1px solid rgba(51, 65, 85, 0.8);
            padding: 1rem;
        }
        .table-medisoft td {
            background-color: transparent;
            color: #e2e8f0;
            border-bottom: 1px solid rgba(51, 65, 85, 0.4);
            padding: 1.1rem 1rem;
            font-size: 0.9rem;
        }
        .table-medisoft tr:last-child td {
            border-bottom: none;
        }
        /* Insignias de estado personalizadas con estilo neón */
        .badge-estado-atendida {
            background-color: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.3);
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
            font-weight: 600;
            font-size: 0.78rem;
        }
        .badge-estado-cancelada {
            background-color: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
            font-weight: 600;
            font-size: 0.78rem;
        }
        .badge-estado-pendiente {
            background-color: rgba(234, 179, 8, 0.15);
            color: #facc15;
            border: 1px solid rgba(234, 179, 8, 0.3);
            padding: 0.35rem 0.75rem;
            border-radius: 50rem;
            font-weight: 600;
            font-size: 0.78rem;
        }
    </style>
</head>

<body class="bg-medisoft text-slate-200 min-vh-100 d-flex flex-column position-relative overflow-x-hidden">

    <!-- Elementos Decorativos Neón de Fondo -->
    <div class="neon-glow neon-purple"></div>
    <div class="neon-glow neon-indigo" style="top: 70%; left: 60%;"></div>

    <!-- =========================
        NAVBAR MODERNO
    ========================= -->
    <nav class="navbar navbar-expand-lg border-bottom border-slate-800 bg-nav-medisoft sticky-top py-3" style="z-index: 10;">
        <div class="container-fluid max-w-7xl px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-3 text-white m-0" href="{{ url('/dashboard') }}">
                <div class="brand-icon-box shadow-purple">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.684a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <span class="fs-4 fw-extrabold text-white tracking-tight">MediSoft</span>
            </a>
            <div class="ms-auto">
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-slate btn-sm px-3 py-2 rounded-xl fw-semibold">
                    &larr; Volver al Dashboard
                </a>
            </div>
        </div>
    </nav>

    <!-- =========================
        CONTENIDO PRINCIPAL
    ========================= -->
    <main class="py-5 flex-grow-1 position-relative" style="z-index: 2;">
        <div class="container max-w-5xl px-4">

            <!-- ENCABEZADO DE LA VISTA -->
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-4 mb-5">
                <div>
                    <span class="badge badge-medisoft-pill px-3 py-1.5 text-xs fw-bold rounded-pill mb-2 text-uppercase tracking-wider">
                        <i class="bi bi-clock-history me-1"></i> Registro Clínico
                    </span>
                    <h1 class="text-white fw-extrabold display-6 mb-2">Historial de <span class="text-purple-gradient">Citas</span></h1>
                    <p class="text-slate-400 mb-0">Consulta el registro detallado de tus consultas médicas anteriores y su estado actual.</p>
                </div>
                <div class="d-flex align-items-center justify-content-center bg-dark-inner border border-slate-800 rounded-3xl p-3 shadow-lg" style="width: 4rem; height: 4rem;">
                    <i class="bi bi-journal-medical text-purple fs-3"></i>
                </div>
            </div>

            <!-- TARJETAS DE RESUMEN (ESTADÍSTICAS) -->
            <div class="row g-3 mb-5">
                <!-- TOTAL -->
                <div class="col-12 col-md-4">
                    <div class="stat-card-medisoft p-4 d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-2xl" style="width: 3.5rem; height: 3.5rem; background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3);">
                            <i class="bi bi-calendar-event fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-400 text-xs fw-semibold uppercase tracking-wider d-block mb-1">Total de citas</span>
                            <strong class="text-white fs-4 fw-extrabold">{{ $totalCitas }}</strong>
                        </div>
                    </div>
                </div>

                <!-- ATENDIDAS -->
                <div class="col-12 col-md-4">
                    <div class="stat-card-medisoft p-4 d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-2xl" style="width: 3.5rem; height: 3.5rem; background: rgba(34, 197, 94, 0.15); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.3);">
                            <i class="bi bi-check-circle fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-400 text-xs fw-semibold uppercase tracking-wider d-block mb-1">Atendidas</span>
                            <strong class="text-white fs-4 fw-extrabold">{{ $atendidas }}</strong>
                        </div>
                    </div>
                </div>

                <!-- CANCELADAS -->
                <div class="col-12 col-md-4">
                    <div class="stat-card-medisoft p-4 d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center rounded-2xl" style="width: 3.5rem; height: 3.5rem; background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3);">
                            <i class="bi bi-x-circle fs-4"></i>
                        </div>
                        <div>
                            <span class="text-slate-400 text-xs fw-semibold uppercase tracking-wider d-block mb-1">Canceladas</span>
                            <strong class="text-white fs-4 fw-extrabold">{{ $canceladas }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TABLA DE HISTORIAL -->
            <div class="historial-card-custom p-4 p-md-5 mb-4 border border-slate-800 shadow-xl">
                <div class="mb-4 pb-3 border-bottom border-slate-800">
                    <h2 class="text-white fw-bold fs-4 mb-1">Mis consultas anteriores</h2>
                    <p class="text-slate-400 text-sm mb-0">Listado completo sincronizado con el sistema.</p>
                </div>

                <div class="table-responsive">
                    <table class="table table-medisoft align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="rounded-start-xl">Paciente / Consulta</th>
                                <th>Especialidad</th>
                                <th>Fecha</th>
                                <th class="rounded-end-xl text-end">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($citas as $cita)
                            <tr>
                                <!-- PACIENTE -->
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="d-flex align-items-center justify-content-center fw-bold rounded-xl text-purple" style="width: 2.75rem; height: 2.75rem; background: rgba(168, 85, 247, 0.15); border: 1px solid rgba(168, 85, 247, 0.3); font-size: 0.85rem;">
                                            {{ strtoupper(substr($cita->nombre_completo, 0, 2)) }}
                                        </div>
                                        <div>
                                            <strong class="text-white d-block fw-bold">{{ $cita->nombre_completo }}</strong>
                                            <span class="text-slate-400 text-xs">{{ $cita->tipo_consulta }}</span>
                                        </div>
                                    </div>
                                </td>

                                <!-- ESPECIALIDAD -->
                                <td>
                                    <span class="text-slate-300 fw-medium">{{ $cita->especialidad }}</span>
                                </td>

                                <!-- FECHA -->
                                <td>
                                    <span class="text-slate-300 text-sm">
                                        <i class="bi bi-calendar3 me-1 text-slate-500"></i> {{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}
                                    </span>
                                </td>

                                <!-- ESTADO -->
                                <td class="text-end">
                                    @if($cita->estado == 'Atendida')
                                        <span class="badge-estado-atendida">
                                            <i class="bi bi-check2 me-1"></i> {{ $cita->estado }}
                                        </span>
                                    @elseif($cita->estado == 'Cancelada')
                                        <span class="badge-estado-cancelada">
                                            <i class="bi bi-x me-1"></i> {{ $cita->estado }}
                                        </span>
                                    @else
                                        <span class="badge-estado-pendiente">
                                            <i class="bi bi-clock me-1"></i> {{ $cita->estado }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-5 text-slate-400">
                                    <div class="fs-1 text-slate-600 mb-2"><i class="bi bi-folder2-open"></i></div>
                                    <p class="mb-0 fw-medium">No tienes citas registradas todavía.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- BOTÓN VOLVER -->
            <div class="text-center">
                <a href="{{ url('/dashboard') }}" class="btn btn-outline-slate px-4 py-2.5 rounded-xl fw-semibold text-sm">
                    &larr; Volver al inicio
                </a>
            </div>

        </div>
    </main>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>