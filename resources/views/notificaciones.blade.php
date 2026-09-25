<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones - MediSoft</title>

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
        .notif-card {
            background: rgba(30, 41, 59, 0.45);
            border: 1px solid rgba(51, 65, 85, 0.5);
            backdrop-filter: blur(16px);
            border-radius: 1.25rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .notif-card:hover {
            border-color: rgba(168, 85, 247, 0.4);
            background: rgba(30, 41, 59, 0.65);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px -10px rgba(168, 85, 247, 0.15);
        }
        .notif-unread {
            border-left: 4px solid #a855f7;
            background: rgba(30, 41, 59, 0.7);
        }
        .unread-dot {
            width: 8px;
            height: 8px;
            background-color: #a855f7;
            border-radius: 50%;
            box-shadow: 0 0 10px #a855f7;
        }
        .filter-btn {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(51, 65, 85, 0.6);
            color: #94a3b8;
            transition: all 0.2s ease;
        }
        .filter-btn:hover, .filter-btn.active {
            background: rgba(168, 85, 247, 0.15);
            border-color: rgba(168, 85, 247, 0.4);
            color: #ffffff;
        }
        .header-image-box {
            position: relative;
            width: 110px;
            height: 110px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, rgba(30, 41, 59, 0) 70%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .notif-icon-box {
            width: 3rem;
            height: 3rem;
            min-width: 3rem;
            min-height: 3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 1rem;
        }
        .search-box {
            background: rgba(30, 41, 59, 0.5);
            border: 1px solid rgba(51, 65, 85, 0.6);
            color: #ffffff;
            border-radius: 1rem;
        }
        .search-box:focus {
            background: rgba(30, 41, 59, 0.8);
            border-color: rgba(168, 85, 247, 0.6);
            color: #ffffff;
            box-shadow: 0 0 15px rgba(168, 85, 247, 0.15);
        }
        .action-icon-btn {
            background: rgba(51, 65, 85, 0.4);
            border: 1px solid rgba(51, 65, 85, 0.6);
            color: #94a3b8;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .action-icon-btn:hover {
            background: rgba(168, 85, 247, 0.2);
            color: #ffffff;
            border-color: rgba(168, 85, 247, 0.4);
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
        <div class="container max-w-7xl px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-3 text-white m-0" href="{{ url('/dashboard') }}">
                <div class="brand-icon-box shadow-purple d-flex align-items-center justify-content-center text-white rounded-xl" style="width: 2.5rem; height: 2.5rem; background: linear-gradient(135deg, #a855f7, #6366f1);">
                    <i class="bi bi-heart-pulse-fill fs-5"></i>
                </div>
                <span class="fs-4 fw-extrabold text-white tracking-tight">MediSoft</span>
            </a>
        </div>
    </nav>

    <!-- =========================
        CONTENIDO PRINCIPAL
    ========================= -->
    <main class="py-5 flex-grow-1 position-relative" style="z-index: 2;">
        <div class="container" style="max-width: 800px;">

            <!-- ENCABEZADO DE LA VISTA CON IMAGEN -->
            <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-4 mb-4 pb-4 border-bottom border-slate-800">
                <div class="text-center text-md-start">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-2 text-xs fw-bold text-purple" style="background: rgba(168, 85, 247, 0.1); border: 1px solid rgba(168, 85, 247, 0.2);">
                        <i class="bi bi-bell-fill"></i> CENTRO DE AVISOS
                    </div>
                    <h1 class="text-white fw-extrabold fs-2 mb-1">Tus <span class="text-purple-gradient">Notificaciones</span></h1>
                    <p class="text-slate-400 fs-sm mb-0">Mantente al tanto de tus próximas citas, recordatorios y alertas médicas.</p>
                </div>
                
                <!-- Imagen Ilustrativa Referente -->
                <div class="header-image-box flex-shrink-0">
                    <img src="https://cdn-icons-png.flaticon.com/512/3233/3233483.png" alt="Notificaciones MediSoft" class="img-fluid" style="width: 65px; height: 65px; filter: drop-shadow(0 0 12px rgba(168, 85, 247, 0.5));">
                </div>
            </div>

            <!-- BARRA DE BÚSQUEDA Y FILTROS -->
            <div class="row g-3 mb-4 align-items-center">
                <div class="col-12 col-md-6">
                    <div class="position-relative">
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-slate-400"></i>
                        <input type="text" id="search-notifications" onkeyup="filterNotifications()" class="form-control search-box ps-5 py-2 text-xs" placeholder="Buscar notificaciones...">
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-md-end gap-2 flex-wrap">
                    <button id="btn-all" onclick="setTab('all')" class="btn filter-btn active rounded-pill px-3 py-1.5 text-xs fw-semibold">Todas (<span id="count-all">5</span>)</button>
                    <button id="btn-unread" onclick="setTab('unread')" class="btn filter-btn rounded-pill px-3 py-1.5 text-xs fw-semibold">No leídas (<span id="count-unread">3</span>)</button>
                </div>
            </div>

            <!-- BOTÓN GLOBAL -->
            <div class="d-flex justify-content-end mb-3">
                <button onclick="markAllAsRead()" class="btn btn-sm filter-btn rounded-xl px-3 py-2 fw-semibold text-xs d-inline-flex align-items-center gap-2">
                    <i class="bi bi-check2-all"></i> Marcar todas como leídas
                </button>
            </div>

            <!-- LISTA DE NOTIFICACIONES -->
            <div class="d-flex flex-column gap-3" id="notifications-list">

                <!-- Notificación 1 (No leída - Cita) -->
                <div class="notif-card notif-unread p-4 shadow-lg position-relative" data-read="false">
                    <div class="d-flex align-items-start gap-3">
                        <div class="notif-icon-box text-purple flex-shrink-0" style="background: rgba(168, 85, 247, 0.15); border: 1px solid rgba(168, 85, 247, 0.3);">
                            <i class="bi bi-calendar-check fs-5"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h5 class="text-white fw-bold mb-0 fs-6 notif-title">Cita Confirmada con Éxito</h5>
                                    <span class="unread-dot" title="No leída"></span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-slate-400 text-xs">Hace 15 min</span>
                                    <button class="action-icon-btn" onclick="toggleReadStatus(this)" title="Marcar como leída"><i class="bi bi-check"></i></button>
                                    <button class="action-icon-btn" onclick="deleteNotification(this)" title="Eliminar"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                            <p class="text-slate-300 fs-sm mb-3 notif-desc">Tu solicitud de cita para Medicina General con el Dr. Carlos Ruiz ha sido registrada correctamente.</p>
                            <a href="{{ url('/historial') }}" class="text-purple text-xs fw-bold text-decoration-none d-inline-flex align-items-center gap-1.5">
                                Ver detalles <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Notificación 2 (No leída - Laboratorio) -->
                <div class="notif-card notif-unread p-4 shadow-lg position-relative" data-read="false">
                    <div class="d-flex align-items-start gap-3">
                        <div class="notif-icon-box text-info flex-shrink-0" style="background: rgba(59, 130, 246, 0.15); border: 1px solid rgba(59, 130, 246, 0.3);">
                            <i class="bi bi-file-earmark-medical fs-5"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h5 class="text-white fw-bold mb-0 fs-6 notif-title">Resultados de Laboratorio Disponibles</h5>
                                    <span class="unread-dot" title="No leída"></span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-slate-400 text-xs">Hace 2 horas</span>
                                    <button class="action-icon-btn" onclick="toggleReadStatus(this)" title="Marcar como leída"><i class="bi bi-check"></i></button>
                                    <button class="action-icon-btn" onclick="deleteNotification(this)" title="Eliminar"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                            <p class="text-slate-300 fs-sm mb-3 notif-desc">Tus exámenes de sangre rutinarios ya han sido analizados y cargados en tu expediente médico.</p>
                            <a href="{{ url('/historial') }}" class="text-info text-xs fw-bold text-decoration-none d-inline-flex align-items-center gap-1.5">
                                Descargar PDF <i class="bi bi-download"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Notificación 3 (No leída - Medicamento) -->
                <div class="notif-card notif-unread p-4 shadow-lg position-relative" data-read="false">
                    <div class="d-flex align-items-start gap-3">
                        <div class="notif-icon-box text-success flex-shrink-0" style="background: rgba(34, 197, 94, 0.15); border: 1px solid rgba(34, 197, 94, 0.3);">
                            <i class="bi bi-capsule fs-5"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <h5 class="text-white fw-bold mb-0 fs-6 notif-title">Recordatorio de Medicamento</h5>
                                    <span class="unread-dot" title="No leída"></span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-slate-400 text-xs">Hace 5 horas</span>
                                    <button class="action-icon-btn" onclick="toggleReadStatus(this)" title="Marcar como leída"><i class="bi bi-check"></i></button>
                                    <button class="action-icon-btn" onclick="deleteNotification(this)" title="Eliminar"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                            <p class="text-slate-300 fs-sm mb-0 notif-desc">Es hora de tomar tu dosis de Amoxicilina (500mg) indicada por el especialista. Sigue las instrucciones al pie de la letra.</p>
                        </div>
                    </div>
                </div>

                <!-- Notificación 4 (Leída - Cancelación/Cambio) -->
                <div class="notif-card p-4 shadow-lg opacity-75" data-read="true">
                    <div class="d-flex align-items-start gap-3">
                        <div class="notif-icon-box text-warning flex-shrink-0" style="background: rgba(234, 179, 8, 0.15); border: 1px solid rgba(234, 179, 8, 0.3);">
                            <i class="bi bi-exclamation-triangle fs-5"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <h5 class="text-white fw-bold mb-0 fs-6 notif-title">Aviso de reprogramación</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-slate-400 text-xs">Hace 2 días</span>
                                    <button class="action-icon-btn" onclick="toggleReadStatus(this)" title="Marcar como no leída"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    <button class="action-icon-btn" onclick="deleteNotification(this)" title="Eliminar"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                            <p class="text-slate-300 fs-sm mb-0 notif-desc">Tu cita de Odontología programada para el martes ha sido pospuesta por solicitud del centro médico. Selecciona un nuevo horario.</p>
                        </div>
                    </div>
                </div>

                <!-- Notificación 5 (Leída - Bienvenida) -->
                <div class="notif-card p-4 shadow-lg opacity-75" data-read="true">
                    <div class="d-flex align-items-start gap-3">
                        <div class="notif-icon-box text-info flex-shrink-0" style="background: rgba(59, 130, 246, 0.15); border: 1px solid rgba(59, 130, 246, 0.3);">
                            <i class="bi bi-shield-check fs-5"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <h5 class="text-white fw-bold mb-0 fs-6 notif-title">Bienvenido a MediSoft</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="text-slate-400 text-xs">Hace 3 días</span>
                                    <button class="action-icon-btn" onclick="toggleReadStatus(this)" title="Marcar como no leída"><i class="bi bi-arrow-counterclockwise"></i></button>
                                    <button class="action-icon-btn" onclick="deleteNotification(this)" title="Eliminar"><i class="bi bi-x"></i></button>
                                </div>
                            </div>
                            <p class="text-slate-300 fs-sm mb-0 notif-desc">Tu cuenta se ha configurado de forma correcta. Ya puedes agendar consultas presenciales o teleconsultas de manera rápida.</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- ESTADO VACÍO (Oculto por defecto) -->
            <div id="empty-state" class="text-center py-5 d-none">
                <i class="bi bi-bell-slash fs-1 text-slate-500 mb-3 d-block"></i>
                <h5 class="text-white fw-bold">No hay notificaciones</h5>
                <p class="text-slate-400 text-sm">No se encontraron avisos que coincidan con tu búsqueda o filtro.</p>
            </div>

            <!-- BOTÓN VOLVER INFERIOR -->
            <div class="text-center mt-5">
                <a href="{{ url('/dashboard') }}" class="btn filter-btn px-4 py-2.5 rounded-xl fw-semibold text-sm d-inline-flex align-items-center gap-2">
                    <i class="bi bi-arrow-left"></i> Volver al inicio
                </a>
            </div>

        </div>
    </main>

    <!-- Bootstrap Bundle JS & Script de Funcionalidad Avanzada -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentTab = 'all';

        function setTab(tab) {
            currentTab = tab;
            const btnAll = document.getElementById('btn-all');
            const btnUnread = document.getElementById('btn-unread');

            if (tab === 'all') {
                btnAll.classList.add('active');
                btnUnread.classList.remove('active');
            } else {
                btnUnread.classList.add('active');
                btnAll.classList.remove('active');
            }
            filterNotifications();
        }

        function filterNotifications() {
            const query = document.getElementById('search-notifications').value.toLowerCase();
            const cards = document.querySelectorAll('.notif-card');
            let visibleCount = 0;

            cards.forEach(card => {
                const title = card.querySelector('.notif-title').innerText.toLowerCase();
                const desc = card.querySelector('.notif-desc').innerText.toLowerCase();
                const isRead = card.getAttribute('data-read') === 'true';

                const matchesSearch = title.includes(query) || desc.includes(query);
                const matchesTab = (currentTab === 'all') || (currentTab === 'unread' && !isRead);

                if (matchesSearch && matchesTab) {
                    card.style.display = 'block';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Mostrar estado vacío si no hay resultados
            const emptyState = document.getElementById('empty-state');
            if (visibleCount === 0) {
                emptyState.classList.remove('d-none');
            } else {
                emptyState.classList.add('d-none');
            }

            updateCounters();
        }

        function updateCounters() {
            const cards = document.querySelectorAll('.notif-card');
            let total = cards.length;
            let unread = 0;

            cards.forEach(card => {
                if (card.getAttribute('data-read') === 'false') {
                    unread++;
                }
            });

            document.getElementById('count-all').innerText = total;
            document.getElementById('count-unread').innerText = unread;
        }

        function toggleReadStatus(button) {
            const card = button.closest('.notif-card');
            const isRead = card.getAttribute('data-read') === 'true';

            if (isRead) {
                // Marcar como no leída
                card.setAttribute('data-read', 'false');
                card.classList.add('notif-unread');
                card.style.opacity = '1';
                // Agregar puntito si no lo tiene
                const header = card.querySelector('.d-flex.align-items-center.gap-2');
                if (header && !header.querySelector('.unread-dot')) {
                    const dot = document.createElement('span');
                    dot.className = 'unread-dot';
                    dot.title = 'No leída';
                    header.appendChild(dot);
                }
                button.innerHTML = '<i class="bi bi-check"></i>';
                button.title = 'Marcar como leída';
            } else {
                // Marcar como leída
                card.setAttribute('data-read', 'true');
                card.classList.remove('notif-unread');
                card.style.opacity = '0.75';
                const dot = card.querySelector('.unread-dot');
                if (dot) dot.remove();
                button.innerHTML = '<i class="bi bi-arrow-counterclockwise"></i>';
                button.title = 'Marcar como no leída';
            }
            filterNotifications();
        }

        function markAllAsRead() {
            const cards = document.querySelectorAll('.notif-card');
            cards.forEach(card => {
                card.setAttribute('data-read', 'true');
                card.classList.remove('notif-unread');
                card.style.opacity = '0.75';
                const dot = card.querySelector('.unread-dot');
                if (dot) dot.remove();
                const readBtn = card.querySelector('.action-icon-btn[title*="leída"]');
                if (readBtn) {
                    readBtn.innerHTML = '<i class="bi bi-arrow-counterclockwise"></i>';
                    readBtn.title = 'Marcar como no leída';
                }
            });
            filterNotifications();
        }

        function deleteNotification(button) {
            const card = button.closest('.notif-card');
            card.remove();
            filterNotifications();
        }

        // Inicializar contadores al cargar
        updateCounters();
    </script>
</body>

</html>