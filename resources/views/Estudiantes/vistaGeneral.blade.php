<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Calificaciones</title>
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
        }

        .container {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        /* Filtros */
        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 10px 15px;
            background-color: var(--dark);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 5px;
            color: var(--light);
            outline: none;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            border-color: var(--primary);
        }

        /* Tabla de calificaciones */
        .grades-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: var(--dark);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .grades-table th {
            background-color: var(--primary);
            padding: 15px;
            text-align: left;
            font-weight: 500;
        }

        .grades-table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .grades-table tr:last-child td {
            border-bottom: none;
        }

        .grades-table tr:hover {
            background-color: rgba(255, 255, 255, 0.03);
        }

        .student-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .student-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: var(--secondary);
            color: var(--dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 14px;
        }

        .grade {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
        }

        .grade-high {
            background-color: rgba(0, 184, 148, 0.2);
            color: var(--success);
        }

        .grade-medium {
            background-color: rgba(253, 203, 110, 0.2);
            color: var(--warning);
        }

        .grade-low {
            background-color: rgba(214, 48, 49, 0.2);
            color: var(--danger);
        }

        .professor-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .professor-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--primary-dark);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }

        /* Resumen estadístico */
        .stats-summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--dark);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .stat-title {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 10px;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .stat-up {
            color: var(--success);
        }

        .stat-down {
            color: var(--danger);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .filters {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        @include('componentes.sidebar')
        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1><i class="fas fa-clipboard-list"></i> Registro de Calificaciones</h1>
                <div class="user-menu">
                    <div class="notification-bell">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-avatar">AD</div>
                </div>
            </div>

            <!-- Resumen estadístico -->
            <div class="stats-summary">
                <div class="stat-card">
                    <div class="stat-title">Total Estudiantes</div>
                    <div class="stat-value">{{ $totalEstudiantes }}</div>
                    <div class="stat-change stat-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>12% este mes</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Promedio General</div>
                    <div class="stat-value">{{ $promedioGeneral }}</div>
                    <div class="stat-change stat-up">
                        <i class="fas fa-arrow-up"></i>
                        <span>2.3% vs anterior</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Materias Activas</div>
                    <div class="stat-value">{{ $totalMaterias }}</div>
                    <div class="stat-change">
                        <i class="fas fa-equals"></i>
                        <span>Sin cambios</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-title">Aprobación</div>
                    <div class="stat-value">{{ $porcentajeAprobados }}%</div>
                    <div class="stat-change stat-down">
                        <i class="fas fa-arrow-down"></i>
                        <span>1.5% vs anterior</span>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="filters">
                <div class="filter-group">
                    <label for="student-filter"><i class="fas fa-user-graduate"></i> Estudiante</label>
                    <select id="student-filter">
                        <option value disabled selected>Todos los estudiantes</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label for="subject-filter"><i class="fas fa-book"></i> Materia</label>
                    <select id="subject-filter">
                        <option value disabled selected>Todas las materias</option>
                        @foreach ($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label for="period-filter"><i class="fas fa-calendar-alt"></i> Período</label>
                    <select id="period-filter">
                        <option value disabled selected>Todos los períodos</option>
                        @foreach ($calificaciones as $calificacion)
                            <option value="{{ $calificacion->created_at->format('Y-m') }}">
                                {{ $calificacion->created_at->format('Y-m') }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="filter-group">
                    <label for="search"><i class="fas fa-search"></i> Buscar</label>
                    <input type="text" id="search" placeholder="Buscar...">
                </div>
            </div>

            <!-- Tabla de calificaciones -->
            <table class="grades-table">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Materia</th>
                        <th>Calificación</th>
                        <th>Profesor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($calificaciones as $calificacion)
                        <tr>
                            <td>
                                <div class="student-info">
                                    <div class="student-avatar">{{ $calificacion->student->name[0] }}</div>
                                    <div>
                                        <div>{{ $calificacion->student->name }}</div>
                                        <div style="font-size: 12px; color: rgba(255,255,255,0.6);">CI:
                                            {{ $calificacion->student->ci }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $calificacion->materia->name }}</td>
                            <td>
                                @if($calificacion->nota >= 70)
                                <span class="grade grade-high">{{ $calificacion->nota }}</span>
                                @elseif($calificacion->nota >= 51)
                                <span class="grade grade-medium">{{ $calificacion->nota }}</span>
                                @else
                                <span class="grade grade-low">{{ $calificacion->nota }}</span>
                                @endif

                            </td>
                            <td>
                                <div class="professor-info">
                                    <div class="professor-avatar">{{ $calificacion->user->name[0] }}</div>
                                    <div>{{ $calificacion->user->name }}</div>
                                </div>
                            </td>
                            <td>{{ $calificacion->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Aquí iría la lógica para filtrar y cargar datos desde la base de datos
        document.getElementById('student-filter').addEventListener('change', function() {
            console.log('Filtrar por estudiante:', this.value);
            // Lógica para filtrar la tabla
        });

        document.getElementById('subject-filter').addEventListener('change', function() {
            console.log('Filtrar por materia:', this.value);
            // Lógica para filtrar la tabla
        });

        document.getElementById('search').addEventListener('input', function() {
            console.log('Buscar:', this.value);
            // Lógica para buscar en la tabla
        });
    </script>
</body>

</html>
