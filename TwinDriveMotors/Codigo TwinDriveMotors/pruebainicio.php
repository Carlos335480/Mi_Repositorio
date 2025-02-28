<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Compra de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Fondo de pantalla con imagen */
        .bg-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('background.jpg'); /* Aquí va la URL de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            z-index: -1;
            filter: brightness(50%); /* Oscurece la imagen para resaltar el contenido */
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        /* Tarjeta del formulario */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        /* Logo de la empresa */
        .logo img {
            width: 120px;
        }

        /* Estilos de los inputs */
        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            border: none;
            box-shadow: none;
        }

        /* Botón de inicio de sesión */
        .btn-primary {
            background-color: #ff5722;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #e64a19;
        }

        .text-light:hover {
            color: #ff5722;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="bg-image"></div>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-lg-4">
                <div class="card text-white bg-dark bg-opacity-75">
                    <div class="card-body text-center">
                        <div class="logo mb-4">
                            <img src="https://images.pexels.com/photos/1429775/pexels-photo-1429775.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Logo de Compra de Autos" class="img-fluid">
                        </div>
                        <h2 class="mb-4">Iniciar Sesión</h2>
                        <form>
                            <div class="mb-3">
                                <input type="email" class="form-control form-control-lg" placeholder="Correo Electrónico" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg" placeholder="Contraseña" required>
                            </div>
                            <div class="form-check mb-3 text-start">
                                <input type="checkbox" class="form-check-input" id="recordar">
                                <label class="form-check-label" for="recordar">Recordarme</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Iniciar Sesión</button>
                        </form>
                        <p class="mt-3"><a href="#" class="text-light">¿Olvidaste tu contraseña?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

