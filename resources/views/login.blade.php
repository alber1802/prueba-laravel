<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registro</title>
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

        .container {
            position: relative;
            width: 400px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .form-container {
            width: 800px;
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .login-form, .register-form {
            width: 400px;
            padding: 40px;
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

        input:focus ~ .highlight,
        input:valid ~ .highlight {
            width: 100%;
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

        .toggle-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: #764ba2;
            font-weight: bold;
            cursor: pointer;
            padding: 5px;
            width: auto;
            margin: 0;
        }

        .toggle-btn:hover {
            background: none;
            transform: none;
            text-decoration: underline;
        }

        .register-form {
            transform: translateX(400px);
        }

        .slide .login-form {
            transform: translateX(-400px);
        }

        .slide .register-form {
            transform: translateX(0);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container" id="formContainer">
            <div class="login-form">
                <h2>Iniciar Sesión</h2>
                <form action={{route("iniciarSesion")}} method="POST">
                 @csrf
                    <div class="input-group">
                        <input type="email" name="email" id="loginEmail" required>
                        <label for="loginEmail">Correo Electrónico</label>
                        <span class="highlight"></span>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" id="loginPassword" required>
                        <label for="loginPassword">Contraseña</label>
                        <span class="highlight"></span>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>
                <div class="toggle-container">
                    <a href="{{route('register')}}"> <button class="toggle-btn">¿No tienes cuenta? Regístrate</button></a>
                </div>
            </div>

            <div class="register-form">
               

                
            </div>
        </div>
    </div>

    <script>
        function toggleForms() {
            const formContainer = document.getElementById('formContainer');
            formContainer.classList.toggle('slide');
        }
    </script>
</body>
</html>