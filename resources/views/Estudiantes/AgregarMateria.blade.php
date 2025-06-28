<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Materias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #6c5ce7;
            --primary-dark: #5649c0;
            --secondary: #00cec9;
            --dark: #2d3436;
            --darker: #1e272e;
            --light: #f5f6fa;
            --danger: #d63031;
            --warning: #fdcb6e;
            --success: #00b894;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--darker);
            color: var(--light);
            min-height: 100vh;
            padding-left: 250px;
        }

       
        /* Main Content */
        .main-content {
            padding: 30px;
            width: 100%;
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
            display: flex;
            align-items: center;
            gap: 10px;
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

        /* Formulario de Materias */
        .form-container {
            background-color: var(--dark);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        h2 {
            margin-bottom: 20px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 15px;
            background-color: var(--darker);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            color: var(--light);
            font-size: 14px;
            outline: none;
            transition: all 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.2);
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        /* Filtros */
        .filter-container {
            background-color: var(--dark);
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .filter-title {
            font-size: 16px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-content {
            display: none;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .filter-content.active {
            display: grid;
        }

        /* Tabla de Materias */
        .subjects-table-container {
            background-color: var(--dark);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        th {
            background-color: rgba(108, 92, 231, 0.2);
            color: var(--primary);
            font-weight: 500;
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: all 0.2s;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        .edit-btn:hover {
            color: var(--warning);
        }

        .delete-btn:hover {
            color: var(--danger);
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                padding-left: 0;
            }
            
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .sidebar-toggle {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 101;
                background: var(--primary);
                color: white;
                border: none;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
            }
        }
    </style>
</head>
<body>
 
    <!-- Botón para mostrar/ocultar sidebar en móviles -->
    <button class="sidebar-toggle" style="display: none;">
        <i class="fas fa-bars"></i>
    </button>

    @include('componentes.sidebar2')
    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1><i class="fas fa-book"></i> Gestión de Materias</h1>
            <div class="user-menu">
                <div class="user-avatar">AD</div>
            </div>
        </div>

        <!-- Formulario de Registro -->
        <div class="form-container">
            <h2><i class="fas fa-plus-circle"></i> {{ isset($materia) ? 'Editar' : 'Agregar' }} Materia</h2>
            @if(session()->has('success'))
            <div class="alert alert-success" style="color:#06faa9;">
                {{ session('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger" style="color:#ff5252;">
                {{ session('error') }}
            </div>
            @endif
            
            <form method="POST" action="{{ isset($materia) ? route('materias.update', $materia) : route('materias.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($materia))
                    @method('PUT')
                @endif
                
                
                <div class="input-group">
                    <label for="name"><i class="fas fa-book"></i> Nombre</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $materia->name ?? '') }}" required>
                </div>
                
                <div class="input-group">
                    <label for="description"><i class="fas fa-align-left"></i> Descripción</label>
                    <textarea id="description" name="description">{{ old('description', $materia->description ?? '') }}</textarea>
                </div>
                
        
                <div class="form-actions">
                    <a href="{{ route('materias.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> {{ isset($materia) ? 'Actualizar' : 'Guardar' }} Materia
                    </button>
                </div>
            </form>
        </div>

        <!-- Filtros -->
        <div class="filter-container">
            <div class="filter-header" id="filterToggle">
                <div class="filter-title">
                    <i class="fas fa-filter"></i> Filtros de Búsqueda
                </div>
                <i class="fas fa-chevron-down" id="filterIcon"></i>
            </div>
            
            <div class="filter-content" id="filterContent">
                <form method="GET" action="{{ route('materias.index') }}">
                   
                    <div class="input-group">
                        <label for="filtro_nombre">Nombre</label>
                        <input type="text" id="filtro_name" name="name" value="{{ request('name') }}" placeholder="Buscar por nombre">
                    </div>
                    
                
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('materias.index') }}" class="btn btn-secondary">
                            <i class="fas fa-undo"></i> Limpiar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabla de Materias -->
        <div class="subjects-table-container">
            <h2><i class="fas fa-list"></i> Listado de Materias</h2>
            
            @if($subjects->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha Creacion</th>
                        <th>Acciones</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($subjects as $materia)
                    <tr>
                        <td>{{ $materia->name }}</td>
                        <td>{{ $materia->description }}</td>
                        <td>{{ $materia->created_at->format('Y-m-d') }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('materias.edit', $materia) }}" class="action-btn edit-btn">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('materias.destroy', $materia) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="pagination">
                {{ $subjects->links('vendor.pagination.bootstrap-5') }}
            </div>
            @else
            <p>No se encontraron materias registradas.</p>
            @endif
        </div>
    </div>

    <!-- JavaScript solo para sidebar y toggle de filtros -->
    <script>
        // Toggle sidebar en móviles
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.sidebar-toggle');
            
            if (toggleBtn) {
                toggleBtn.addEventListener('click', function() {
                    sidebar.classList.toggle('active');
                });
            }
            
            // Toggle para filtros
            const filterToggle = document.getElementById('filterToggle');
            const filterContent = document.getElementById('filterContent');
            const filterIcon = document.getElementById('filterIcon');
            
            if (filterToggle) {
                filterToggle.addEventListener('click', function() {
                    filterContent.classList.toggle('active');
                    filterIcon.classList.toggle('fa-chevron-down');
                    filterIcon.classList.toggle('fa-chevron-up');
                });
            }
            
            // Cerrar sidebar al hacer clic fuera en móviles
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && sidebar && toggleBtn) {
                    if (!sidebar.contains(e.target) && e.target !== toggleBtn) {
                        sidebar.classList.remove('active');
                    }
                }
            });
            
            // Ajustar sidebar en móviles al cambiar tamaño de pantalla
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768 && sidebar) {
                    sidebar.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>