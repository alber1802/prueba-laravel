<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Sidebar */
    .sidebar {
        background-color: var(--dark);
        padding: 20px;
        border-right: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo i {
        font-size: 24px;
        color: var(--primary);
    }

    .logo span {
        font-size: 18px;
        font-weight: bold;
    }

    .nav-menu {
        list-style: none;
    }

    .nav-item {
        margin-bottom: 10px;
    }

    .nav-item a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px 15px;
        color: var(--light);
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3s;
    }

    .nav-item a:hover,
    .nav-item a.active {
        background-color: var(--primary);
    }

    .nav-item i {
        width: 20px;
        text-align: center;
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

    .header h1 {
        font-size: 24px;
        color: var(--light);
    }

    .user-menu {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<!-- Sidebar -->
<div class="sidebar">
    <div class="logo">
        <i class="fas fa-graduation-cap"></i>
        <span>AcademiaPlus</span>
    </div>

    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{route('General')}}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('AgregarCalificaciones')}}" class="active">
                <i class="fas fa-plus-circle"></i>
                <span>Registrar Notas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('AgregarEstudiantes.index')}}">
                <i class="fas fa-user-graduate"></i>
                <span>Estudiantes</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('materias.index')}}">
                <i class="fas fa-book"></i>
                <span>Materias</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#">
                <i class="fas fa-cog"></i>
                <span>Configuración</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
                <span>Cerrar Sesión</span>
            </a>
        </li>
    </ul>
</div>
