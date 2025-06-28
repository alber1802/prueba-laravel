<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Bienvenida</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 40px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 28px;
        }

        .nav-menu {
            list-style: none;
            margin-top: 40px;
        }

        .nav-item {
            margin-bottom: 15px;
        }

        .nav-item a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .nav-item a:hover, .nav-item a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .nav-item i {
            font-size: 20px;
        }

        /* Main Content */
        .main-content {
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #764ba2;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .welcome-section {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .welcome-title {
            font-size: 28px;
            margin-bottom: 10px;
            color: #444;
        }

        .welcome-text {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .metrics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .metric-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .metric-title {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .metric-value {
            font-size: 28px;
            font-weight: bold;
            color: #444;
            margin-bottom: 10px;
        }

        .metric-change {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .up {
            color: #2ecc71;
        }

        .down {
            color: #e74c3c;
        }

        .recent-activity {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .section-title {
            font-size: 18px;
            margin-bottom: 20px;
            color: #444;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #764ba2;
        }

        .activity-text {
            flex: 1;
        }

        .activity-time {
            font-size: 12px;
            color: #999;
        }

        /* Icons (usando Unicode como ejemplo) */
        .icon-dashboard::before { content: "📊"; }
        .icon-users::before { content: "👥"; }
        .icon-settings::before { content: "⚙️"; }
        .icon-logout::before { content: "🚪"; }
        .icon-notification::before { content: "🔔"; }
        .icon-up::before { content: "↑"; }
        .icon-down::before { content: "↓"; }
    </style>
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">
                <i>📊</i> <span>MiDashboard</span>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="#" class="active">
                        <span class="icon-dashboard"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <span class="icon-users"></span>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#">
                        <span class="icon-settings"></span>
                        <span>Configuración</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}">
                        <span class="icon-logout"></span>
                        <span>Cerrar Sesión</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1>Bienvenido al Panel</h1>
                <div class="user-info">
                    <div class="user-avatar">JS</div>
                    <span>{{ $user->name }}</span>
                    <span class="icon-notification"></span>
                </div>
            </div>
            
            <div class="welcome-section">
                <h2 class="welcome-title">¡Hola, {{ $user->name }}!</h2>
                <p class="welcome-text">
                    Bienvenido a tu panel de control. Aquí puedes ver un resumen de tus actividades, 
                    estadísticas importantes y acceder rápidamente a las diferentes secciones del sistema.
                </p>
            </div>
            
            <div class="metrics">
                <div class="metric-card">
                    <span class="metric-title">Usuarios Activos</span>
                    <span class="metric-value">1,245</span>
                    <span class="metric-change up">
                        <span class="icon-up"></span>
                        <span>12% desde ayer</span>
                    </span>
                </div>
                
                <div class="metric-card">
                    <span class="metric-title">Nuevos Registros</span>
                    <span class="metric-value">56</span>
                    <span class="metric-change up">
                        <span class="icon-up"></span>
                        <span>5% desde ayer</span>
                    </span>
                </div>
                
                <div class="metric-card">
                    <span class="metric-title">Tasa de Conversión</span>
                    <span class="metric-value">32%</span>
                    <span class="metric-change down">
                        <span class="icon-down"></span>
                        <span>2% desde ayer</span>
                    </span>
                </div>
            </div>
            
            <div class="recent-activity">
                <h3 class="section-title">Actividad Reciente</h3>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">📝</div>
                        <div class="activity-text">Nuevo usuario registrado: María González</div>
                        <div class="activity-time">Hace 10 min</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">🔄</div>
                        <div class="activity-text">Actualización del sistema completada</div>
                        <div class="activity-time">Hace 2 horas</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">📊</div>
                        <div class="activity-text">Nuevo reporte generado: Estadísticas mensuales</div>
                        <div class="activity-time">Hace 5 horas</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">🔒</div>
                        <div class="activity-text">Cambio de contraseña exitoso</div>
                        <div class="activity-time">Ayer</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>