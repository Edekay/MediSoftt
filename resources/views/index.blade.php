<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediSoft - Tu Salud Más Organizada</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fuente Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-medisoft text-slate-200 min-vh-100 d-flex flex-column">

    <!-- NAV BAR -->
    <nav class="navbar navbar-expand-lg border-bottom border-slate-800 bg-nav-medisoft sticky-top py-3">
        <div class="container-fluid max-w-7xl px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-3 text-white m-0" href="{{ url('/') }}">
                <div class="brand-icon-box shadow-purple">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="24" height="24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.684a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                    </svg>
                </div>
                <span class="fs-4 fw-extrabold text-white tracking-tight">MediSoft</span>
            </a>

            <div class="d-flex align-items-center gap-3 ms-auto">
                <a href="{{ url('/login') }}" class="btn text-white text-sm fw-semibold border-0 px-3 py-2">
                    Iniciar Sesión
                </a>
             <a href="{{ url('/registro') }}" class="btn btn-sm px-4 py-2 rounded-3 fw-semibold text-white" style="background-color: #7c3aed; border: none;">Registrarse</a>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION CON IMAGEN ALARGADA -->
    <section class="hero-section position-relative overflow-hidden border-bottom border-slate-800">
        <div class="hero-overlay"></div>

        <div class="neon-glow neon-purple"></div>
        <div class="neon-glow neon-indigo"></div>

        <div class="container max-w-4xl text-center px-4 position-relative z-2">
            <span class="badge badge-medisoft-pill px-3 py-2 text-xs fw-bold rounded-pill mb-4">
                Plataforma Médica Integrada
            </span>

            <h1 class="hero-title text-white fw-extrabold mb-3">
                Tu salud <span class="text-purple-gradient">más organizada</span>
            </h1>

            <p class="hero-subtitle text-slate-300 mx-auto mb-4">
                Gestiona citas médicas, historial clínico y especialidades desde un solo lugar con total seguridad y rapidez.
            </p>

            <div class="pt-2">
                <a href="{{ url('/citas') }}" class="btn btn-hero-gradient text-white fw-bold px-4 py-3 rounded-2xl shadow-purple">
                    Comenzar ahora &rarr;
                </a>
            </div>
        </div>
    </section>

    <!-- CARDS SECTION (MÁS AMPLIAS) -->
    <main class="py-5 flex-grow-1">
        <div class="container max-w-7xl px-4 px-lg-5">
            <div class="row g-4">

                <!-- TARJETA 1: CITAS MÉDICAS -->
                <div class="col-12 col-md-4">
                    <div class="card card-medisoft card-purple-hover h-100 rounded-3xl d-flex flex-column justify-content-between">
                        <div>
                            <div class="icon-box icon-purple mb-4">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="28" height="28">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="fs-5 fw-bold text-white mb-2">Citas Médicas</h3>
                            <p class="card-desc-text mb-4">
                                Agenda y administra tus citas fácilmente con especialistas de manera rápida y transparente.
                            </p>
                        </div>
                        <a href="{{ url('/citas') }}" class="btn btn-purple-glow w-100 py-3 rounded-xl fw-bold text-sm">
                            Ver citas
                        </a>
                    </div>
                </div>

             <!-- TARJETA: AUDIFARMA & FÓRMULAS -->
<div class="col-12 col-md-6 col-lg-4">
    <div class="card card-medisoft card-emerald-hover rounded-3xl h-100 d-flex flex-column justify-content-between">
        <div>
            <div class="icon-box icon-emerald mb-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="28" height="28">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.605 15.13a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                    </path>
                </svg>
            </div>
            <h3 class="fs-5 fw-bold text-white mb-2">Audifarma & Fórmulas</h3>
            <p class="card-desc-text mb-4">
                Consulta el estado de tus fórmulas, autorizaciones de medicamentos y convenios activos.
            </p>
        </div>
        <a href="{{ url('/audifarma') }}" class="btn btn-emerald-glow w-100 py-3 rounded-xl fw-bold text-sm">
            Ver medicamentos
        </a>
    </div>
</div>

                <!-- TARJETA 3: NOTIFICACIONES -->
                <div class="col-12 col-md-4">
                    <div class="card card-medisoft card-violet-hover h-100 rounded-3xl d-flex flex-column justify-content-between">
                        <div>
                            <div class="icon-box icon-violet mb-4">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="28" height="28">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="fs-5 fw-bold text-white mb-2">Notificaciones</h3>
                            <p class="card-desc-text mb-4">
                                Recibe alertas de recordatorios importantes, confirmaciones de citas y estado de fórmulas.
                            </p>
                        </div>
                        <a href="{{ url('/notificaciones') }}" class="btn btn-violet-glow w-100 py-3 rounded-xl fw-bold text-sm">
                            Ver alertas
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Bootstrap 5 Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- SECCIÓN PREGUNTAS FRECUENTES -->
<section class="py-5">
    <div class="container max-w-4xl px-4 px-lg-5">
        <div class="text-center mb-5">
            <h2 class="fs-3 fw-bold text-white mb-2">Preguntas Frecuentes</h2>
            <p class="text-slate-300">Resuelve tus dudas sobre el uso de MediSoft y las consultas de medicamentos.</p>
        </div>

        <div class="accordion accordion-flush" id="faqAccordion">
            <!-- Pregunta 1 -->
            <div class="accordion-item bg-dark-inner border-slate-800 rounded-2xl mb-3 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent text-white fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        ¿Cómo puedo revisar la autorización de mi fórmula en Audifarma?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted text-sm">
                        Ingresa al módulo de <strong>Audifarma & Fórmulas</strong> con tu usuario y número de documento. Allí podrás consultar en tiempo real el estado de autorización y la disponibilidad en tu punto de entrega asignado.
                    </div>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div class="accordion-item bg-dark-inner border-slate-800 rounded-2xl mb-3 overflow-hidden">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed bg-transparent text-white fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        ¿Puedo cancelar o reprogramar una cita médica en línea?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body text-muted text-sm">
                        Sí, desde la sección de <strong>Citas Médicas</strong> puedes ver tu lista de citas agendadas, modificar el horario o cancelarla con al menos 2 horas de anticipación.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- METRICAS / ESTADÍSTICAS -->
<section class="py-4 border-bottom border-slate-800 bg-slate-900-50">
    <div class="container max-w-7xl px-4">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <h3 class="fs-2 fw-extrabold text-white mb-0">+10k</h3>
                <p class="text-slate-400 text-xs mb-0">Citas Agendadas</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fs-2 fw-extrabold text-white mb-0">99.9%</h3>
                <p class="text-slate-400 text-xs mb-0">Disponibilidad</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fs-2 fw-extrabold text-white mb-0">+500</h3>
                <p class="text-slate-400 text-xs mb-0">Especialistas</p>
            </div>
            <div class="col-6 col-md-3">
                <h3 class="fs-2 fw-extrabold text-white mb-0">24/7</h3>
                <p class="text-slate-400 text-xs mb-0">Soporte Continuo</p>
            </div>
        </div>
    </div>
</section>
</body>
</html>
