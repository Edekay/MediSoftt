<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialistas - MediSoft</title>

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
        .search-input-medisoft {
            background-color: rgba(15, 23, 42, 0.75);
            border: 1px solid rgba(51, 65, 85, 0.8);
            color: #f8fafc;
            border-radius: 16px;
            padding: 0.75rem 1rem 0.75rem 3rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(8px);
        }
        .search-input-medisoft:focus {
            background-color: rgba(15, 23, 42, 0.95);
            border-color: #a855f7;
            box-shadow: 0 0 0 4px rgba(168, 85, 247, 0.15);
            color: #fff;
        }
        .filter-btn {
            background-color: rgba(30, 41, 59, 0.75);
            border: 1px solid rgba(51, 65, 85, 0.8);
            color: #94a3b8;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            transition: all 0.2s ease;
            backdrop-filter: blur(8px);
        }
        .filter-btn:hover, .filter-btn.active {
            background-color: #a855f7;
            border-color: #a855f7;
            color: #fff;
        }
        .testimonial-card {
            background: rgba(30, 41, 59, 0.4);
            border: 1px solid rgba(51, 65, 85, 0.6);
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
            border-color: rgba(168, 85, 247, 0.4);
        }
        /* Estilos para el banner de lado a lado con gradiente clínico */
        .hero-banner-full {
            position: relative;
            background-image: url('https://images.unsplash.com/photo-1532938911079-1b06ac7ceec7?q=80&w=1600&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            width: 100%;
            margin-top: -3rem; /* Eleva el banner para acoplarlo con el navbar */
            padding-top: 4.5rem;
            padding-bottom: 4.5rem;
            border-bottom: 1px solid rgba(51, 65, 85, 0.8);
            overflow: hidden;
        }
        .hero-banner-full::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom, rgba(11, 15, 25, 0.88), rgba(11, 15, 25, 0.97));
            z-index: 1;
        }
        .hero-banner-content {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body class="bg-medisoft text-slate-200 min-vh-100 d-flex flex-column position-relative overflow-x-hidden">

    <!-- Elementos Decorativos Neón de Fondo -->
    <div class="neon-glow neon-purple"></div>
    <div class="neon-glow neon-indigo" style="top: 70%; left: 70%;"></div>

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
        BANNER DE LADO A LADO (FULL-WIDTH)
    ========================= -->
    <div class="hero-banner-full mb-5">
        <div class="container max-w-7xl px-4 px-lg-5 hero-banner-content">
            <!-- Encabezado de la sección -->
            <div class="text-center mb-4 pb-2">
                <span class="badge badge-medisoft-pill px-3.5 py-2 text-xs fw-bold rounded-pill mb-3 text-uppercase tracking-wider">
                    <i class="bi bi-shield-plus me-1"></i> Staff Médico Certificado
                </span>
                <h1 class="text-white fw-extrabold hero-title-modern display-5 mb-3">
                    Nuestros <span class="text-purple-gradient">Especialistas</span>
                </h1>
                <p class="text-slate-300 mx-auto fs-6" style="max-width: 42rem;">
                    Excelencia médica y atención humanizada. Agenda tu cita con los mejores profesionales en cada área de la salud.
                </p>
            </div>

            <!-- Buscador y Filtros Interactivos -->
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Barra de búsqueda -->
                    <div class="position-relative mb-3">
                        <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-slate-400 fs-5" style="z-index: 3;">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" id="searchInput" class="form-control search-input-medisoft w-100" placeholder="Busca por nombre de doctor o especialidad (ej: Cardiología, Laura)...">
                    </div>

                    <!-- Botones de Filtro Rápido -->
                    <div class="d-flex flex-wrap justify-content-center gap-2" id="filterContainer">
                        <button class="filter-btn active" data-filter="todos">Todos</button>
                        <button class="filter-btn" data-filter="cardiología">Cardiología</button>
                        <button class="filter-btn" data-filter="pediatría">Pediatría</button>
                        <button class="filter-btn" data-filter="dermatología">Dermatología</button>
                        <button class="filter-btn" data-filter="neurología">Neurología</button>
                        <button class="filter-btn" data-filter="oftalmología">Oftalmología</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =========================
        CONTENIDO PRINCIPAL: ESPECIALISTAS
    ========================= -->
    <main class="flex-grow-1 position-relative pb-5" style="z-index: 2;">
        <div class="container max-w-7xl px-4 px-lg-5">

            @php
                $especialistas = [
                    ["nombre" => "Dra. Laura Gómez", "esp" => "Cardiología", "genero" => "mujer", "estrellas" => "★★★★★", "desc" => "Especialista en enfermedades cardiovasculares y control preventivo.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dr. Carlos Pérez", "esp" => "Pediatría", "genero" => "hombre", "estrellas" => "★★★★★", "desc" => "Atención médica integral para niños y adolescentes.", "dispo" => "Próximo turno: Mañana"],
                    ["nombre" => "Dra. Andrea Ruiz", "esp" => "Dermatología", "genero" => "mujer", "estrellas" => "★★★★☆", "desc" => "Diagnóstico y tratamiento de enfermedades de la piel.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dr. Andrés Martínez", "esp" => "Medicina General", "genero" => "hombre", "estrellas" => "★★★★★", "desc" => "Atención médica general, prevención y seguimiento de pacientes.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dra. Camila Torres", "esp" => "Ginecología", "genero" => "mujer", "estrellas" => "★★★★★", "desc" => "Atención especializada en salud femenina y control preventivo.", "dispo" => "Próximo turno: Jueves"],
                    ["nombre" => "Dr. Felipe Ramírez", "esp" => "Neurología", "genero" => "hombre", "estrellas" => "★★★★☆", "desc" => "Diagnóstico y tratamiento de enfermedades neurológicas.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dra. Valentina Castro", "esp" => "Oftalmología", "genero" => "mujer", "estrellas" => "★★★★★", "desc" => "Evaluación y cuidado integral de la salud visual.", "dispo" => "Próximo turno: Mañana"],
                    ["nombre" => "Dr. Sebastián López", "esp" => "Ortopedia", "genero" => "hombre", "estrellas" => "★★★★★", "desc" => "Tratamiento de lesiones y enfermedades del sistema musculoesquelético.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dra. Natalia Herrera", "esp" => "Endocrinología", "genero" => "mujer", "estrellas" => "★★★★☆", "desc" => "Atención especializada en trastornos hormonales y metabólicos.", "dispo" => "Próximo turno: Viernes"],
                    ["nombre" => "Dr. Juan David Pérez", "esp" => "Urología", "genero" => "hombre", "estrellas" => "★★★★★", "desc" => "Diagnóstico y tratamiento de enfermedades urológicas.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dra. Mariana Gómez", "esp" => "Psiquiatría", "genero" => "mujer", "estrellas" => "★★★★★", "desc" => "Atención integral para el bienestar emocional y mental.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dr. Nicolás Vargas", "esp" => "Traumatología", "genero" => "hombre", "estrellas" => "★★★★☆", "desc" => "Atención especializada en lesiones y traumatismos.", "dispo" => "Próximo turno: Mañana"],
                    ["nombre" => "Dra. Laura Sánchez", "esp" => "Otolaringología", "genero" => "mujer", "estrellas" => "★★★★★", "desc" => "Diagnóstico y tratamiento de enfermedades de oído, nariz y garganta.", "dispo" => "Disponible hoy"],
                    ["nombre" => "Dr. Mateo Rodríguez", "esp" => "Gastroenterología", "genero" => "hombre", "estrellas" => "★★★★★", "desc" => "Atención especializada del sistema digestivo.", "dispo" => "Próximo turno: Lunes"],
                    ["nombre" => "Dra. Daniela Moreno", "esp" => "Oftalmología", "genero" => "mujer", "estrellas" => "★★★★★", "desc" => "Evaluación, prevención y tratamiento de problemas visuales.", "dispo" => "Disponible hoy"]
                ];
            @endphp

            <!-- Grilla de Especialistas -->
            <div class="row g-4 mb-5" id="especialistasGrid">
                @foreach($especialistas as $esp)
                <div class="col-12 col-md-6 col-lg-4 especialista-card" data-nombre="{{ strtolower($esp['nombre']) }}" data-esp="{{ strtolower($esp['esp']) }}">
                    <div class="card card-medisoft card-purple-hover h-100 rounded-3xl d-flex flex-column justify-content-between p-4 border border-slate-800 position-relative">
                        <div>
                            <!-- Cabecera de la Tarjeta con Distinción de Color por Género -->
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="d-flex align-items-center gap-3">
                                    @if($esp['genero'] == 'mujer')
                                        <div class="d-flex align-items-center justify-content-center" style="width: 3rem; height: 3rem; border-radius: 14px; background: rgba(168, 85, 247, 0.15); color: #c084fc; border: 1px solid rgba(168, 85, 247, 0.3);">
                                            <i class="bi bi-person-fill fs-4"></i>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center justify-content-center" style="width: 3rem; height: 3rem; border-radius: 14px; background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3);">
                                            <i class="bi bi-person-fill fs-4"></i>
                                        </div>
                                    @endif

                                    <div>
                                        <span class="badge-medisoft-pill px-2.5 py-1 text-xs fw-semibold rounded-pill">
                                            {{ $esp['esp'] }}
                                        </span>
                                    </div>
                                </div>
                                <span class="badge bg-dark-inner text-muted border border-slate-800 rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                    @if($esp['genero'] == 'mujer')
                                        <i class="bi bi-patch-check-fill text-purple" style="font-size: 0.9rem;"></i>
                                    @else
                                        <i class="bi bi-patch-check-fill" style="font-size: 0.9rem; color: #60a5fa !important;"></i>
                                    @endif
                                </span>
                            </div>

                            <h3 class="fs-5 fw-bold text-white mb-1 tracking-tight">{{ $esp['nombre'] }}</h3>
                            
                            <!-- Indicador de Disponibilidad -->
                            <div class="mb-2">
                                <span class="text-xs fw-semibold {{ str_contains($esp['dispo'], 'Disponible') ? 'text-success' : 'text-muted' }}">
                                    <i class="bi {{ str_contains($esp['dispo'], 'Disponible') ? 'bi-dot fs-5 align-middle text-success' : 'bi-clock' }}"></i> {{ $esp['dispo'] }}
                                </span>
                            </div>

                            <div class="text-warning mb-3" style="font-size: 0.8rem; letter-spacing: 3px;">
                                {{ $esp['estrellas'] }}
                            </div>

                            <p class="card-desc-text mb-4 text-slate-400" style="font-size: 0.88rem; line-height: 1.6;">
                                {{ $esp['desc'] }}
                            </p>
                        </div>

                        <a href="{{ url('/citas') }}" class="btn {{ $esp['genero'] == 'mujer' ? 'btn-purple-glow' : 'btn-primary' }} w-100 py-2.5 rounded-xl fw-bold text-sm shadow-sm d-flex align-items-center justify-content-center gap-2" @if($esp['genero'] == 'hombre') style="background-color: #2563eb; border: none;" @endif>
                            <span>Solicitar cita</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Mensaje si no hay resultados -->
            <div id="noResults" class="text-center py-5 d-none">
                <div class="text-slate-500 fs-1 mb-2"><i class="bi bi-search"></i></div>
                <h4 class="text-white fw-bold">No se encontraron especialistas</h4>
                <p class="text-slate-400">Intenta buscando con otro término o categoría.</p>
            </div>

            <!-- =========================
                SECCIÓN: TESTIMONIOS DE PACIENTES
            ========================= -->
            <div class="mt-5 pt-5 border-top border-slate-800">
                <div class="text-center mb-5">
                    <span class="text-purple fw-bold text-uppercase tracking-wider fs-7 d-block mb-2">Opiniones reales</span>
                    <h2 class="text-white fw-extrabold fs-3">Lo que dicen nuestros <span class="text-purple-gradient">pacientes</span></h2>
                </div>

                <div class="row g-4">
                    <!-- Testimonio 1 -->
                    <div class="col-12 col-md-4">
                        <div class="testimonial-card p-4 rounded-3xl h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="text-warning mb-3 fs-7" style="letter-spacing: 2px;">★★★★★</div>
                                <p class="text-slate-300 fs-7 mb-4" style="line-height: 1.6;">
                                    "La atención de la Dra. Laura Gómez fue excelente. Muy profesional, me explicó todo detalladamente y el sistema de citas de MediSoft es súper rápido."
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-3 pt-3 border-top border-slate-800">
                                <div class="bg-purple-subtle text-purple rounded-circle d-flex align-items-center justify-content-center fw-bold fs-7" style="width: 40px; height: 40px;">
                                    MR
                                </div>
                                <div>
                                    <h6 class="text-white fw-bold mb-0 fs-7">Marcela Ríos</h6>
                                    <span class="text-slate-500 fs-8">Paciente de Cardiología</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonio 2 -->
                    <div class="col-12 col-md-4">
                        <div class="testimonial-card p-4 rounded-3xl h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="text-warning mb-3 fs-7" style="letter-spacing: 2px;">★★★★★</div>
                                <p class="text-slate-300 fs-7 mb-4" style="line-height: 1.6;">
                                    "Agendar con el Dr. Carlos Pérez para mi hijo fue facilísimo. El consultorio impecable y el doctor tiene una paciencia increíble con los niños."
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-3 pt-3 border-top border-slate-800">
                                <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold fs-7" style="width: 40px; height: 40px; background: rgba(59, 130, 246, 0.15); color: #60a5fa;">
                                    JR
                                </div>
                                <div>
                                    <h6 class="text-white fw-bold mb-0 fs-7">Julián Ramírez</h6>
                                    <span class="text-slate-500 fs-8">Padre de paciente</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonio 3 -->
                    <div class="col-12 col-md-4">
                        <div class="testimonial-card p-4 rounded-3xl h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="text-warning mb-3 fs-7" style="letter-spacing: 2px;">★★★★★</div>
                                <p class="text-slate-300 fs-7 mb-4" style="line-height: 1.6;">
                                    "Me encantó poder filtrar por especialidad y ver la disponibilidad de inmediato. La Dra. Andrea Ruiz resolvió mi problema dermatológico rápido."
                                </p>
                            </div>
                            <div class="d-flex align-items-center gap-3 pt-3 border-top border-slate-800">
                                <div class="bg-purple-subtle text-purple rounded-circle d-flex align-items-center justify-content-center fw-bold fs-7" style="width: 40px; height: 40px;">
                                    SV
                                </div>
                                <div>
                                    <h6 class="text-white fw-bold mb-0 fs-7">Sofía Valencia</h6>
                                    <span class="text-slate-500 fs-8">Paciente de Dermatología</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de Búsqueda y Filtros en Tiempo Real -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const filterButtons = document.querySelectorAll('.filter-btn');
            const cards = document.querySelectorAll('.especialista-card');
            const noResults = document.getElementById('noResults');

            let currentCategory = 'todos';

            function limpiarTexto(texto) {
                return texto.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
            }

            function filterCards() {
                const query = limpiarTexto(searchInput.value.trim());
                let visibleCount = 0;

                cards.forEach(card => {
                    const nombre = limpiarTexto(card.getAttribute('data-nombre'));
                    const especialidad = limpiarTexto(card.getAttribute('data-esp'));

                    const matchesSearch = nombre.includes(query) || especialidad.includes(query);
                    const matchesCategory = currentCategory === 'todos' || especialidad === limpiarTexto(currentCategory);

                    if (matchesSearch && matchesCategory) {
                        card.style.display = 'block';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (visibleCount === 0) {
                    noResults.classList.remove('d-none');
                } else {
                    noResults.classList.add('d-none');
                }
            }

            searchInput.addEventListener('input', filterCards);

            filterButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    filterButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    currentCategory = this.getAttribute('data-filter');
                    filterCards();
                });
            });
        });
    </script>
</body>

</html>