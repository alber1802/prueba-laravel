<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Formulario de Registro */
        .form-container {
            background-color: var(--dark);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .form-section {
            flex: 1;
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
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
        }

        input,
        select {
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

        input:focus,
        select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.2);
        }

        .file-input-container {
            margin: 20px 0;
        }

        .file-input-label {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .file-input-label:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        #file-input {
            display: none;
        }

        .file-name {
            margin-top: 8px;
            font-size: 12px;
            color: rgba(255, 255, 255, 0.6);
        }

        .preview-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .image-preview {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.05);
            border: 3px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: flex;
        }

        .default-icon {
            font-size: 50px;
            color: rgba(255, 255, 255, 0.3);
        }

        .student-info {
            background: rgba(255, 255, 255, 0.05);
            padding: 15px;
            border-radius: 8px;
            width: 100%;
        }

        .info-item {
            margin-bottom: 8px;
            display: flex;
        }

        .info-label {
            font-weight: bold;
            margin-right: 10px;
            min-width: 70px;
            color: rgba(255, 255, 255, 0.7);
        }

        .info-value {
            flex: 1;
            word-break: break-word;
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

        /* Tabla de Estudiantes */
        .students-table-container {
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

        th,
        td {
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

        .student-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
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
        @media (max-width: 992px) {
            .form-container {
                grid-template-columns: 1fr;
            }

            .preview-container {
                order: -1;
                margin-bottom: 30px;
            }
        }

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
    @include('componentes.sidebar2')

    <!-- Botón para mostrar/ocultar sidebar en móviles -->
    <button class="sidebar-toggle" style="display: none;">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1><i class="fas fa-user-graduate"></i> Registro de Estudiantes</h1>
            <div class="user-menu">
                <div class="user-avatar">AD</div>
            </div>
        </div>

        <!-- Formulario de Registro -->
        <div class="form-container">
            <div class="form-section">
                <h2><i class="fas fa-user-plus"></i> {{ isset($student) ? 'Editar' : 'Nueva' }} Estudiante</h2>
                 @if(session()->has('success'))
                 <div class="alert alert-success" style="color:#000000;">
                     {{ session('success') }}
                 </div>
                 @elseif(session()->has('error'))
                 <div class="alert alert-danger" style="color:#ff5252;">
                     {{ session('error') }}
                 </div>
                 @endif
                <form id="studentForm"  action="{{ isset($student) ? route('AgregarEstudiantes.update', $student) : route('AgregarEstudiantes.store') }}
                " method="POST"  enctype="multipart/form-data">
                    @csrf
                    @if(isset($student))
                        @method('PUT')
                    @endif
                    <div class="input-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" id="name" name="name" required value="{{ isset($student) ? $student->name : '' }}">
                    </div>

                    <div class="input-group">
                        <label for="ci">Cédula de Identidad</label>
                        <input type="text" id="ci" name="ci" required
                               minlength="8"          maxlength="15"         pattern="[0-9]{8,15}"  title="La cédula debe contener solo números y tener entre 8 y 15 dígitos."
                               inputmode="numeric"    value="{{ isset($student) ? $student->ci : '' }}">
                    </div>

                    <div class="input-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required value="{{ isset($student) ? $student->email : '' }}">
                    </div>

                    <div class="file-input-container">
                        <label for="file-input" class="file-input-label">
                            <i class="fas fa-camera"></i> Seleccionar Foto
                        </label>
                        <input type="file" id="file-input" name="foto" accept="image/*">
                        <div class="file-name" id="file-name">No se ha seleccionado archivo</div>
                    </div>

                    <button type="submit" class="btn btn-primary" id="submit-btn" >
                        <i class="fas fa-save"></i> {{ isset($student) ? 'Actualizar' : 'Registrar' }} Estudiante
                    </button>
                </form>
            </div>

            <div class="preview-container">
                <h2><i class="fas fa-eye"></i> Vista Previa</h2>

                <div class="image-preview">
                    <div class="default-icon"></div>
                    <img id="preview-image" src="{{ isset($student) ? Storage::url($student->foto) : '' }}" alt="Vista previa de la foto">
                </div>

                <div class="student-info">
                    <div class="info-item">
                        <span class="info-label">Nombre:</span>
                        <span class="info-value" id="preview-nombre">-</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">CI:</span>
                        <span class="info-value" id="preview-ci">-</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Email:</span>
                        <span class="info-value" id="preview-email">-</span>
                    </div>
                </div>
            </div>
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
                <form method="GET" action="{{ route('AgregarEstudiantes.index') }}">
                    <div class="input-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" value="{{ request('name') }}"
                            placeholder="Buscar por nombre">
                    </div>

                    <div class="input-group">
                        <label for="ci">Cédula</label>
                        <input type="text" id="ci" name="ci" value="{{ request('ci') }}"
                            placeholder="Buscar por CI">
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" value="{{ request('email') }}"
                            placeholder="Buscar por email">
                    </div>

                    <div class="input-group">
                        <label for="fecha">Fecha Registro</label>
                        <input type="date" id="fecha" name="fecha" value="{{ request('fecha') }}">
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Buscar
                        </button>
                        <a href="{{ route('AgregarEstudiantes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-undo"></i> Limpiar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Reemplaza la tabla de estudiantes por esto: -->
        <div class="students-table-container">
            <h2><i class="fas fa-list"></i> Lista de Estudiantes</h2>

            <table id="studentsTable">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Cédula</th>
                        <th>Email</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($estudiantes as $estudiante)
                        <tr>
                            <td>
                                @if ($estudiante->foto)
                                    <img src="{{ asset('storage/' . $estudiante->foto) }}"
                                        alt="{{ $estudiante->name }}" class="student-avatar">
                                @else
                                    <div class="student-avatar-default">{{ substr($estudiante->name, 0, 1) }}</div>
                                @endif
                            </td>
                            <td>{{ $estudiante->name }}</td>
                            <td>{{ $estudiante->ci }}</td>
                            <td>{{ $estudiante->email }}</td>
                            <td>{{ $estudiante->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('AgregarEstudiantes.actualizar', $estudiante) }}"
                                        class="action-btn edit-btn">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('AgregarEstudiantes.destroy', $estudiante) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete-btn"
                                            onclick="return confirm('¿Estás seguro?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="pagination">
                {{ $estudiantes->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </div>

    <script>
        // sidebar.js - Mantenemos igual que antes
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar en móviles
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.createElement('button');
            toggleBtn.className = 'sidebar-toggle';
            toggleBtn.innerHTML = '<i class="fas fa-bars"></i>';
            document.body.appendChild(toggleBtn);

            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Cerrar sidebar al hacer clic fuera en móviles
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768 && !sidebar.contains(e.target) && e.target !== toggleBtn) {
                    sidebar.classList.remove('active');
                }
            });
        });

        // preview.js - Para la vista previa de la imagen
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-input');
            const fileName = document.getElementById('file-name');
            const previewImage = document.getElementById('preview-image');
            const defaultIcon = document.querySelector('.default-icon');

            if (fileInput) {
                fileInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        fileName.textContent = file.name;

                        const reader = new FileReader();
                        reader.onload = function(event) {
                            previewImage.src = event.target.result;
                            previewImage.style.display = 'block';
                            defaultIcon.style.display = 'none';
                        }
                        reader.readAsDataURL(file);
                    } else {
                        fileName.textContent = 'No se ha seleccionado archivo';
                        previewImage.style.display = 'none';
                        defaultIcon.style.display = 'flex';
                    }
                });
            }
        });
         // Toggle para mostrar/ocultar filtros
         filterToggle.addEventListener('click', function() {
            filterContent.classList.toggle('active');
            filterIcon.classList.toggle('fa-chevron-down');
            filterIcon.classList.toggle('fa-chevron-up');
        });

         // Actualizar vista previa de los datos
        document.getElementById('name').addEventListener('input', updatePreview);
        document.getElementById('ci').addEventListener('input', updatePreview);
        document.getElementById('email').addEventListener('input', updatePreview);
        
        function updatePreview() {
            document.getElementById('preview-nombre').textContent = document.getElementById('name').value || '-';
            document.getElementById('preview-ci').textContent = document.getElementById('ci').value || '-';
            document.getElementById('preview-email').textContent = document.getElementById('email').value || '-';
        }
    </script>
</body>

</html>
