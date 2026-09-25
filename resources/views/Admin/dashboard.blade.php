<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - MediSoft</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-body: #050811;
            --bg-surface: #0b101d;
            --bg-sidebar: #080c17;
            --border-subtle: rgba(255, 255, 255, 0.06);
            --border-hover: rgba(255, 255, 255, 0.12);
            --text-primary: #f8fafc;
            --text-secondary: #8a99ad;
            --accent: #38bdf8;
            --accent-glow: rgba(56, 189, 248, 0.08);
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-primary);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            overflow-x: hidden;
        }

        /* Sidebar Tipo App SaaS */
        .app-sidebar {
            width: 260px;
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border-subtle);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-bottom: 1px solid var(--border-subtle);
            text-decoration: none;
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1rem;
        }

        .brand-icon-box {
            width: 32px;
            height: 32px;
            background: #111827;
            border: 1px solid var(--border-subtle);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            font-size: 0.95rem;
        }

        .sidebar-menu {
            padding: 1.25rem 0.85rem;
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
            flex-grow: 1;
        }

        .sidebar-section-title {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--text-secondary);
            padding: 0.75rem 0.75rem 0.35rem 0.75rem;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.65rem 0.75rem;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }

        .sidebar-link:hover {
            color: var(--text-primary);
            background: rgba(255, 255, 255, 0.03);
        }

        .sidebar-link.active {
            color: var(--text-primary);
            background: rgba(56, 189, 248, 0.08);
            border: 1px solid rgba(56, 189, 248, 0.15);
        }

        .sidebar-footer {
            padding: 1rem;
            border-top: 1px solid var(--border-subtle);
            background: rgba(0, 0, 0, 0.2);
        }

        /* Área de Contenido Principal */
        .app-main {
            margin-left: 260px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header de la App */
        .app-header {
            height: 64px;
            background: rgba(5, 8, 17, 0.8);
            border-bottom: 1px solid var(--border-subtle);
            backdrop-filter: blur(12px);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        /* Tarjetas Estilo Componente UI */
        .app-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            padding: 1.5rem;
            position: relative;
        }

        /* Tarjetas de Métricas con Barra de Progreso Interna */
        .metric-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            padding: 1.25rem 1.5rem;
            position: relative;
            overflow: hidden;
        }
        .metric-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--border-hover), transparent);
        }
        .metric-label {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
        }
        .metric-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-top: 0.2rem;
            font-variant-numeric: tabular-nums;
        }

        /* Controles y Filtros Tipo App */
        .app-input {
            background: var(--bg-body);
            border: 1px solid var(--border-subtle);
            border-radius: 8px;
            padding: 0.5rem 1rem 0.5rem 2.3rem;
            color: var(--text-primary);
            font-size: 0.85rem;
            width: 240px;
            transition: all 0.2s ease;
        }
        .app-input:focus {
            outline: none;
            border-color: var(--accent);
            background: var(--bg-surface);
            width: 280px;
        }

        .app-select {
            background: var(--bg-body);
            border: 1px solid var(--border-subtle);
            border-radius: 8px;
            padding: 0.5rem 0.85rem;
            color: var(--text-primary);
            font-size: 0.85rem;
            outline: none;
            cursor: pointer;
            transition: border-color 0.2s;
        }
        .app-select:focus {
            border-color: var(--accent);
        }

        /* Tablas Técnicas Limpias */
        .table-custom {
            color: var(--text-primary);
            margin-bottom: 0;
            font-size: 0.85rem;
        }
        .table-custom th {
            border-bottom: 1px solid var(--border-subtle);
            color: var(--text-secondary);
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 0.85rem 1rem;
            background: transparent !important;
        }
        .table-custom td {
            border-bottom: 1px solid var(--border-subtle);
            vertical-align: middle;
            padding: 0.85rem 1rem;
            background: transparent !important;
            color: #cbd5e1;
        }
        .table-custom tbody tr:last-child td {
            border-bottom: none !important;
        }
        .table-custom tbody tr {
            transition: background-color 0.15s ease;
        }
        .table-custom tbody tr:hover {
            background-color: rgba(255, 255, 255, 0.015) !important;
        }

        /* Avatar de Usuario */
        .user-avatar {
            width: 32px;
            height: 32px;
            background: #111827;
            border: 1px solid var(--border-subtle);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.75rem;
            color: var(--text-primary);
        }

        /* Acciones y Botones */
        .btn-app-action {
            background: #111827;
            border: 1px solid var(--border-subtle);
            color: var(--text-primary);
            border-radius: 6px;
            padding: 0.3rem 0.75rem;
            font-size: 0.78rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            text-decoration: none;
            transition: all 0.15s ease;
        }
        .btn-app-action:hover {
            background: #1f2937;
            border-color: var(--border-hover);
            color: #fff;
        }

        .role-badge {
            padding: 0.2rem 0.55rem;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }
        .role-badge.admin {
            background: rgba(56, 189, 248, 0.08);
            color: #38bdf8;
            border: 1px solid rgba(56, 189, 248, 0.15);
        }
        .role-badge.user {
            background: rgba(138, 153, 173, 0.06);
            color: var(--text-secondary);
            border: 1px solid var(--border-subtle);
        }

        .btn-logout {
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
            border-radius: 6px;
            padding: 0.3rem 0.75rem;
            font-size: 0.78rem;
            font-weight: 500;
            transition: all 0.15s ease;
        }
        .btn-logout:hover {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.4);
            color: #fca5a5;
        }

        /* Sistema de pestañas de navegación interna */
        .sub-nav-tabs {
            display: flex;
            gap: 0.5rem;
            border-bottom: 1px solid var(--border-subtle);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }
        .sub-tab {
            background: transparent;
            border: none;
            color: var(--text-secondary);
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.4rem 0.85rem;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.15s;
        }
        .sub-tab:hover {
            color: var(--text-primary);
            background: rgba(255, 255, 255, 0.03);
        }
        .sub-tab.active {
            color: var(--text-primary);
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border-subtle);
        }

        /* Dot indicador de estado */
        .status-dot {
            width: 7px;
            height: 7px;
            background-color: #22c55e;
            border-radius: 50%;
            box-shadow: 0 0 8px rgba(34, 197, 94, 0.4);
        }
    </style>
</head>
<body>

    <!-- Sidebar de la Aplicación -->
    <aside class="app-sidebar">
        <a href="#" class="sidebar-brand">
            <div class="brand-icon-box">
                <i class="bi bi-code-square"></i>
            </div>
            <span>MediSoft <span style="font-size: 0.7rem; color: var(--accent); background: var(--accent-glow); padding: 0.1rem 0.35rem; border-radius: 4px; border: 1px solid rgba(56,189,248,0.2);">v2.4</span></span>
        </a>

        <div class="sidebar-menu">
            <span class="sidebar-section-title">Plataforma</span>
            <a href="#" class="sidebar-link active">
                <i class="bi bi-grid-1x2"></i> Panel General
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-people"></i> Gestión de Usuarios
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-heart-pulse"></i> Registros Clínicos
            </a>

            <span class="sidebar-section-title mt-3">Sistema</span>
            <a href="#" class="sidebar-link">
                <i class="bi bi-shield-lock"></i> Permisos y Roles
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-terminal"></i> Logs de Actividad
            </a>
            <a href="#" class="sidebar-link">
                <i class="bi bi-sliders"></i> Configuración
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center gap-2">
                    <div class="status-dot"></div>
                    <span style="font-size: 0.75rem; color: var(--text-secondary);">Core Online</span>
                </div>
                <span style="font-size: 0.7rem; color: var(--text-secondary);">MySQL</span>
            </div>
        </div>
    </aside>

    <!-- Contenido Principal -->
    <div class="app-main">
        
        <!-- Header Superior -->
        <header class="app-header">
            <div class="d-flex align-items-center gap-2">
                <span class="text-secondary" style="font-size: 0.85rem;">Admin</span>
                <span class="text-secondary" style="font-size: 0.85rem;">/</span>
                <span class="text-white fw-semibold" style="font-size: 0.85rem;">Directorio General</span>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="user-avatar">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <span class="text-white small fw-medium d-none d-md-inline">{{ auth()->user()->name }}</span>
                </div>
                
                <form action="{{ url('/logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-logout d-flex align-items-center gap-1">
                        <i class="bi bi-box-arrow-right"></i> Salir
                    </button>
                </form>
            </div>
        </header>

        <!-- Contenedor del Cuerpo de la App -->
        <div class="p-4 p-md-4" style="max-width: 1350px; width: 100%;">
            
            <!-- Título de Sección -->
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
                <div>
                    <h1 class="fw-bold text-white fs-4 mb-1">Panel de Control</h1>
                    <p class="text-secondary small mb-0">Supervisión en tiempo real de cuentas y permisos activos.</p>
                </div>
                <div>
                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-10 px-2.5 py-2 rounded-2 fw-normal" style="font-size: 0.75rem;">
                        <i class="bi bi-clock me-1"></i> Actualizado: {{ now()->format('d/m/Y H:i') }}
                    </span>
                </div>
            </div>

            <!-- Navegación de Pestañas Internas -->
            <div class="sub-nav-tabs">
                <button class="sub-tab active">Vista General</button>
                <button class="sub-tab" onclick="alert('Sección de analíticas en desarrollo')">Analíticas de Acceso</button>
                <button class="sub-tab" onclick="alert('Sección de reportes del sistema en desarrollo')">Reportes del Sistema</button>
            </div>

            <!-- Tarjetas de Métricas -->
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <div class="metric-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="metric-label">Total Cuentas</span>
                            <i class="bi bi-people text-secondary" style="font-size: 0.9rem;"></i>
                        </div>
                        <div class="metric-value">{{ $totalUsuarios }}</div>
                        <div class="d-flex align-items-center gap-1 mt-2 text-secondary" style="font-size: 0.75rem;">
                            <i class="bi bi-arrow-up-right text-success"></i> <span class="text-success fw-medium">Activo</span> en el sistema
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="metric-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="metric-label">Administradores</span>
                            <i class="bi bi-shield-lock text-secondary" style="font-size: 0.9rem;"></i>
                        </div>
                        <div class="metric-value">{{ $usuariosAdmin }}</div>
                        <div class="d-flex align-items-center gap-1 mt-2 text-secondary" style="font-size: 0.75rem;">
                            <span class="text-info fw-medium">Control total</span> de privilegios
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="metric-card">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="metric-label">Usuarios Regulares</span>
                            <i class="bi bi-person text-secondary" style="font-size: 0.9rem;"></i>
                        </div>
                        <div class="metric-value">{{ $usuariosNormales }}</div>
                        <div class="d-flex align-items-center gap-1 mt-2 text-secondary" style="font-size: 0.75rem;">
                            <span class="text-secondary fw-medium">Pacientes / Operadores</span> estándar
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bloque de Tabla y Filtros -->
            <div class="row">
                <div class="col-12">
                    <div class="app-card">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4 pb-3 border-bottom border-secondary border-opacity-10">
                            <div>
                                <h5 class="text-white fw-bold fs-6 mb-1">Directorio de Registros</h5>
                                <span class="text-secondary" style="font-size: 0.78rem;">Base de datos centralizada de usuarios</span>
                            </div>

                            <!-- Controles de Filtrado Tipo App -->
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <select id="roleFilterSelect" class="app-select">
                                    <option value="">Todos los roles</option>
                                    <option value="admin">Administradores</option>
                                    <option value="user">Usuarios</option>
                                </select>

                                <div class="position-relative">
                                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-secondary" style="font-size: 0.8rem;"></i>
                                    <input type="text" id="userSearchInput" class="app-input" placeholder="Buscar usuario...">
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-custom align-middle" id="usersTable">
                               <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Usuario</th>
                                        <th>Correo Electrónico</th>
                                        <th>Rol del Sistema</th>
                                        <th>Fecha de Creación</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\User::all() as $u)
                                    <tr data-role="{{ $u->role }}">
                                        <td class="text-secondary fw-medium">#{{ $u->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2.5">
                                                <div class="user-avatar">
                                                    {{ strtoupper(substr($u->name, 0, 2)) }}
                                                </div>
                                                <span class="fw-semibold text-white">{{ $u->name }}</span>
                                            </div>
                                        </td>
                                        <td class="text-secondary">{{ $u->email }}</td>
                                        <td>
                                            @if($u->role === 'admin')
                                                <span class="role-badge admin">
                                                    <i class="bi bi-shield-check"></i> Admin
                                                </span>
                                            @else
                                                <span class="role-badge user">
                                                    <i class="bi bi-person"></i> Usuario
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-secondary" style="font-size: 0.78rem;">
                                            {{ $u->created_at ? $u->created_at->format('d/m/Y H:i') : 'N/A' }}
                                        </td>
                                        <td class="text-end">
                                            <button class="btn-app-action" onclick="alert('Configurando permisos de: {{ $u->name }}')">
                                                <i class="bi bi-sliders"></i> Editar
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script de Filtro y Búsqueda Combinados -->
    <script>
        function filterTable() {
            let searchFilter = document.getElementById('userSearchInput').value.toLowerCase();
            let roleFilter = document.getElementById('roleFilterSelect').value.toLowerCase();
            let rows = document.querySelectorAll('#usersTable tbody tr');

            rows.forEach(row => {
                let nameText = row.cells[1].textContent.toLowerCase();
                let emailText = row.cells[2].textContent.toLowerCase();
                let rowRole = row.getAttribute('data-role').toLowerCase();

                let matchesSearch = nameText.includes(searchFilter) || emailText.includes(searchFilter);
                let matchesRole = roleFilter === "" || rowRole === roleFilter;

                if (matchesSearch && matchesRole) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        document.getElementById('userSearchInput').addEventListener('keyup', filterTable);
        document.getElementById('roleFilterSelect').addEventListener('change', filterTable);
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>