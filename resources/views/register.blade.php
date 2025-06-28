<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-container {
            width: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            border: none;
            border-bottom: 1px solid #999;
            outline: none;
            background: transparent;
        }

        label {
            position: absolute;
            top: 10px;
            left: 0;
            font-size: 16px;
            color: #666;
            pointer-events: none;
            transition: 0.3s;
        }

        input:focus ~ label,
        input:valid ~ label {
            top: -15px;
            left: 0;
            color: #764ba2;
            font-size: 12px;
        }

        .highlight {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #764ba2;
            transition: 0.4s;
        }

        input:focus ~ .highlight {
            width: 100%;
        }

        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .input-group.error input {
            border-bottom-color: #e74c3c;
        }

        .input-group.error label {
            color: #e74c3c;
        }

        .input-group.error .highlight {
            background: #e74c3c;
        }

        .input-group.error .error-message {
            display: block;
        }

        .input-group.success input {
            border-bottom-color: #2ecc71;
        }

        .input-group.success label {
            color: #2ecc71;
        }

        .input-group.success .highlight {
            background: #2ecc71;
        }

        button {
            width: 100%;
            padding: 12px 0;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(to right, #667eea, #764ba2);
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: linear-gradient(to right, #764ba2, #667eea);
            transform: translateY(-2px);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #764ba2;
            text-decoration: none;
            font-weight: bold;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .password-strength {
            margin-top: 5px;
            height: 4px;
            background: #eee;
            border-radius: 2px;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0%;
            background: #e74c3c;
            transition: width 0.3s, background 0.3s;
        }

        .terms {
            display: flex;
            align-items: center;
            margin: 15px 0;
            font-size: 14px;
        }

        .terms input {
            width: auto;
            margin-right: 10px;
        }

        .terms label {
            position: static;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Crear Cuenta</h2>
        <form  action ={{route('registrase')}} method="POST">
            @csrf
            <div class="input-group">
                <input type="text" id="registerName" name="name" required>
                <label for="registerName">Nombre Completo</label>
                <span class="highlight"></span>
                <div class="error-message">Por favor ingresa tu nombre completo</div>
            </div>
            
            <div class="input-group">
                <input type="email" id="registerEmail" name="email"  required>
                <label for="registerEmail">Correo Electrónico</label>
                <span class="highlight"></span>
                <div class="error-message">Por favor ingresa un correo válido</div>
            </div>
            
            <div class="input-group">
                <input type="password" id="registerPassword"   name="password" required minlength="6" >
                <label for="registerPassword">Contraseña</label>
                <span class="highlight"></span>
                <div class="password-strength">
                    <div class="strength-bar" id="strengthBar"></div>
                </div>
                <div class="error-message">La contraseña debe tener al menos 6 caracteres</div>
            </div>
            
            <div class="input-group">
                <input type="password" id="confirmPassword" required>
                <label for="confirmPassword">Confirmar Contraseña</label>
                <span class="highlight"></span>
                <div class="error-message">Las contraseñas no coinciden</div>
            </div>
            
            <div class="terms">
                <input type="checkbox" id="acceptTerms" required>
                <label for="acceptTerms">Acepto los términos y condiciones</label>
            </div>
            
            <button type="submit"> Registrarse </button>
        </form>
        
        <div class="login-link">
            ¿Ya tienes una cuenta? <a href="{{route('login')}}">Inicia sesión</a>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validar formulario
            const name = document.getElementById('registerName');
            const email = document.getElementById('registerEmail');
            const password = document.getElementById('registerPassword');
            const confirmPassword = document.getElementById('confirmPassword');
            const terms = document.getElementById('acceptTerms');
            
            let isValid = true;
            
            // Validar nombre
            if(name.value.trim() === '') {
                name.parentElement.classList.add('error');
                isValid = false;
            } else {
                name.parentElement.classList.remove('error');
            }
            
            // Validar email
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if(!emailRegex.test(email.value)) {
                email.parentElement.classList.add('error');
                isValid = false;
            } else {
                email.parentElement.classList.remove('error');
            }
            
            // Validar contraseña
            if(password.value.length < 6) {
                password.parentElement.classList.add('error');
                isValid = false;
            } else {
                password.parentElement.classList.remove('error');
            }
            
            // Validar confirmación de contraseña
            if(password.value !== confirmPassword.value) {
                confirmPassword.parentElement.classList.add('error');
                isValid = false;
            } else {
                confirmPassword.parentElement.classList.remove('error');
            }
            
            // Validar términos
            if(!terms.checked) {
                terms.parentElement.style.color = '#e74c3c';
                isValid = false;
            } else {
                terms.parentElement.style.color = '#666';
            }
            
        });
        
        // Visualizador de fortaleza de contraseña
        document.getElementById('registerPassword').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('strengthBar');
            let strength = 0;
            
            if(password.length > 0) strength += 20;
            if(password.length >= 6) strength += 20;
            if(/[A-Z]/.test(password)) strength += 20;
            if(/[0-9]/.test(password)) strength += 20;
            if(/[^A-Za-z0-9]/.test(password)) strength += 20;
            
            strengthBar.style.width = strength + '%';
            
            if(strength < 40) {
                strengthBar.style.background = '#e74c3c';
            } else if(strength < 70) {
                strengthBar.style.background = '#f39c12';
            } else {
                strengthBar.style.background = '#2ecc71';
            }
        });
    </script>
</body>
</html>