<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "autosmarket";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}
if (strpos($campo['email'],'A')===0){
    header('Location: AdminSesion.php');
} else {
    header('Location: StarSession.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra y Venta de Autos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background-color: #000000;
        }
        .btn-custom {
            background-color: #28a745;
            border-color: #28a745;
            color: white;
        }
        .btn-custom:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .carousel {
            margin: 20px auto;
            width: 100%;
            border-radius: 15px;
            overflow: hidden;
        }
        .carousel-item img {
            width: 100%;
            border-radius: 15px;
        }
        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="#">AutosMarket</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-custom" href="#" data-toggle="modal" data-target="#registerModal">Registro</a>
                </li>
                <li class="nav-item ml-2">
                    <a class="btn btn-custom" href="#" data-toggle="modal" data-target="#loginModal">Inicio</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center">Bienvenido a AutosMarket</h1>
        <h5 class="text-center">Encuentra el auto de tus sueños o vende tu auto con nosotros.</h5>
        <h5 class="text-center">Regístrate o inicia sesión para acceder a todas nuestras funcionalidades.</h5>
    </div>

    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="form-group">
                            <label for="registerUsername">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="registerUsername" placeholder="Ingresa un nombre">
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Correo Electrónico</label>
                            <input type="email" class="form-control" id="registerEmail" placeholder="ejemplo@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Contraseña</label>
                            <input type="password" class="form-control" id="registerPassword" placeholder="Ingresa tu contraseña">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Inicio de Sesión</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="form-group">
                            <label for="loginUsername">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="loginUsername" placeholder="Ingresa tu nombre de usuario">
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Contraseña</label>
                            <input type="password" class="form-control" id="loginPassword" placeholder="Ingresa tu contraseña">
                        </div>
                        <div id="error-message" class="text-danger" style="display:none;">Los datos son incorrectos. Vuelve a intentarlo.</div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Iniciar Sesión</button>
                </div>
            </div>
        </div>
    </div>

    <div id="carousel" class="carousel slide mt-4" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.buttercms.com/3cx3rGvQFW7yzdJDej60" class="d-block w-100" alt="Imagen1">
            </div>
            <div class="carousel-item">
                <img src="https://resizer.iproimg.com/unsafe/1280x/filters:format(webp)/https://assets.iprofesional.com/assets/jpg/2020/03/492392.jpg" class="d-block w-100" alt="Imagen2">
            </div>
            <div class="carousel-item">
                <img src="https://ichef.bbci.co.uk/ace/ws/640/cpsprodpb/6B34/production/_94244472_9.jpg.webp" class="d-block w-100" alt="Imagen3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="https://www.latercera.com/resizer/I6XaWyhCokBSy1I1ebUbn2HWzbw=/900x600/smart/cloudfront-us-east-1.images.arcpublishing.com/copesa/J4AHAHSFNRGX7MCO6653MOPEFA.jpg" class="card-img-top" alt="Volkswagen Beetle">
                    <div class="card-body">
                        <h5 class="card-title">Volkswagen Beetle</h5>
                        <p class="card-text">Un clásico del automovilismo, el Beetle ha marcado historia por su diseño único y accesible.</p>
                        <a class="btn btn-primary" onclick="showAlert()">Saber Más</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://s3.amazonaws.com/nexu-ghost-blog/2021/03/cual-es-el-auto-mas-barato-en-mexico-2021.jpg" class="card-img-top" alt="Renault KWID">
                    <div class="card-body">
                        <h5 class="card-title">Renault KWID</h5>
                        <p class="card-text">El pequeño guerrero urbano, conocido por su economía y agilidad en la ciudad.</p>
                        <a class="btn btn-primary" onclick="showAlert()">Saber Más</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://wieck-nissanao-production.s3.amazonaws.com/photos/cb373dcc87a5addd31d5108aad69eeadd10d0e74/preview-928x522.jpg" class="card-img-top" alt="Nissan March">
                    <div class="card-body">
                        <h5 class="card-title">Nissan March</h5>
                        <p class="card-text">Conocido por su eficiencia y confiabilidad, el March es un favorito entre los conductores jóvenes.</p>
                        <a class="btn btn-primary" onclick="showAlert()">Saber Más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 AutosMarket. Todos los derechos reservados por el Equipo # siendo los integrantes:</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function showAlert() {
            alert('Necesitas iniciar sesion para saber mas');
        }
    </script>
</body>
</html>
