<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

try {
    $stmt = $cnnPDO->prepare("SELECT SUM(precio) AS total_ganado, COUNT(*) AS autos_vendidos FROM compra");
    $stmt->execute();
    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_ganado = $resultados['total_ganado'];
    $autos_vendidos = $resultados['autos_vendidos'];
} catch (PDOException $e) {
    echo "Error al obtener los datos: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="icon" href="proyecto/TWIN.jpg" type="image/jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .bg-body-tertiary {
            background-color: #333 !important;
        }
        .navbar-nav .nav-link {
            color: #fff !important;
        }
        .navbar-brand {
            color: #fff !important;
        }
        .card {
            background-color: #444;
            color: #fff;
        }
        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        .navbar {
            background-color: black;
        }

        .navbar-img {
            max-width: 50px;
            max-height: 50px;
        }

        .navbar a {
            color: #f2f2f2;
            text-align: center;
            padding: 8px 12px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .btn-link {
            color: #f2f2f2;
            text-align: center;
            padding: 8px 12px;
            text-decoration: none;
            border: none;
            background: none;
            font-size: 1rem;
        }

        .navbar .btn-link:hover {
            background-color: #ddd;
            color: black;
        }

        @media (max-width: 992px) {
            .navbar-nav .nav-item {
                text-align: center;
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <span class="navbar-brand"><img class="navbar-img" src="TWIN.jpg" alt="User Image"></span>
            <a class="navbar-brand" href="#">Panel de Administrador</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="inicio_admin.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="autos.php">Administrar Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">Gestión de usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reportes.php">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="informacion_contacto.php">Información de Contacto</a> <!-- Nueva opción -->
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="log out.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid" style="padding-top: 70px;">
    <h1 class="mt-4">Tablero</h1>
    <p>Bienvenido al panel de administración.</p>
    
    <div id="carCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://acnews.blob.core.windows.net/imgnews/extralarge/NAZ_729b4047cc394d00b8f5600ca8f9159f.webp" class="d-block w-100" alt="Auto 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.pexels.com/photos/20131555/pexels-photo-20131555/free-photo-of-vehiculo-lujo-rapido-coche-deportivo.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="d-block w-100" alt="Auto 2">
            </div>
            <div class="carousel-item">
                <img src="https://www.gmc.com.mx/content/dam/gmc/na/mx/es/index/trucks/2024-sierra/mov/01-images/2024-gmc-sierra-mov-mh-lg.jpg?imwidth=1200" class="d-block w-100" alt="Auto 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <div class="row mt-5">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Estadísticas</h5>
                    <p class="card-text">Número de autos vendidos: <?php echo $autos_vendidos; ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ingresos generados</h5>
                    <p class="card-text">Ingresos generados: $<?php echo number_format($total_ganado, 2); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
