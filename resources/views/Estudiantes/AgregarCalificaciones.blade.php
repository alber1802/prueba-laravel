<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Calificaciones</title>
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

        /* Formulario */
        .form-container {
            background-color: var(--dark);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: 0 auto;
        }

        .form-title {
            font-size: 20px;
            margin-bottom: 25px;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-col {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        select, input {
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

        select:focus, input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.2);
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
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: var(--darker);
            color: var(--light);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Nota actual */
        .current-grade {
            text-align: center;
            margin-top: 20px;
        }

        .grade-display {
            font-size: 48px;
            font-weight: bold;
            color: var(--primary);
            margin: 10px 0;
        }

        .grade-slider {
            width: 100%;
            margin: 20px 0;
            -webkit-appearance: none;
            height: 8px;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            outline: none;
        }

        .grade-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--primary);
            cursor: pointer;
            transition: all 0.2s;
        }

        .grade-slider::-webkit-slider-thumb:hover {
            transform: scale(1.1);
        }

        .grade-labels {
            display: flex;
            justify-content: space-between;
            margin-top: -10px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 12px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .sidebar {
                display: none;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
       @include('componentes.sidebar')

        
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <h1><i class="fas fa-plus-circle"></i> Registrar Nueva Calificación</h1>
                <div class="user-menu">
                    <div class="user-avatar">AD</div>
                </div>
            </div>
            
            <div class="form-container">
                <h2 class="form-title"><i class="fas fa-edit"></i> Información de la Calificación</h2>

                @include('componentes.alerta')
                
                <form id="gradeForm" action="{{ route('Agregar') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="student"><i class="fas fa-user-graduate"></i> Estudiante</label>
                                <select id="student" name="student_id" required>
                                    <option selected disabled> Seleccione un estudiante</option>
                                    @foreach ($estudiantes as $estudiante)
                                        <option value="{{ $estudiante->id }}">{{ $estudiante->name }} (CI: {{ $estudiante->ci }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-col">
                            <div class="form-group">
                                <label for="subject"><i class="fas fa-book"></i> Materia</label>
                                <select id="subject" name="materia_id" required>
                                    <option selected disabled >Seleccione una materia</option>
                                    @foreach ($materias as $materia)
                                        <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div class="form-row">
                        <div class="form-col">
                            <div class="form-group">
                                <label for="period"><i class="fas fa-calendar-alt"></i> Profesor</label>
                                <select id="period" required>
                                    <option selectedInvalid>Seleccione un profesor</option>
                                    @foreach ($profesores as $profesor)
                                        <option value="{{ $profesor->id }}">{{ $profesor->name }} (CI: {{ $profesor->ci }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="form-col">
                            <div class="form-group">
                                <label for="date"><i class="fas fa-calendar-day"></i> Fecha de Evaluación</label>
                                <input type="date" id="date" required>
                            </div>
                        </div> 
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="grade"><i class="fas fa-star"></i> Calificación (0-100)</label>
                        <input type="range" name="nota" id="grade" min="35" max="100" step="1" value="70" class="grade-slider">
                        <div class="grade-labels">
                            <span>0</span>
                            <span>25</span>
                            <span>50</span>
                            <span>75</span>
                            <span>100</span>
                        </div>
                        <div class="current-grade">
                            <div>Nota actual:</div>
                            <div class="grade-display" id="gradeValue">70</div>
                            <div id="gradeStatus" style="color: #00b894;">Aprobado</div>
                        </div>
                    </div>
                     
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancelar
                        </button>

                        <button type="submit" class="btn btn-primary">
                             Guardar Calificación
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Actualizar el valor de la nota en tiempo real
        const gradeSlider = document.getElementById('grade');
        const gradeValue = document.getElementById('gradeValue');
        const gradeStatus = document.getElementById('gradeStatus');
        
        gradeSlider.addEventListener('input', function() {
            const value = this.value;
            gradeValue.textContent = value;
            
            // Cambiar color según la nota
            if(value < 60) {
                gradeStatus.textContent = "Reprobado";
                gradeStatus.style.color = "#e74c3c";
                gradeValue.style.color = "#e74c3c";
            } else if(value < 80) {
                gradeStatus.textContent = "Aprobado";
                gradeStatus.style.color = "#f39c12";
                gradeValue.style.color = "#f39c12";
            } else {
                gradeStatus.textContent = "Excelente";
                gradeStatus.style.color = "#00b894";
                gradeValue.style.color = "#6c5ce7";
            }
        });
        
        
        
        
    </script>
</body>
</html>