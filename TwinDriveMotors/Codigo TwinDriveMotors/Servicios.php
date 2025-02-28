<?php 
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
    
    header('Location: index.php');
    exit();
}

$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #fff;
            background-color: #000;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
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
        .navbar-custom {
        background-color: black;
        }

        @media (max-width: 992px) {
            .navbar-nav .nav-item {
                text-align: center;
            }
        }
        main {
            padding: 2rem;
        }

        h1 {
            text-align: center;
        }

        .intro {
            margin-bottom: 2rem;
        }

        .services {
        text-align: center;
        }

        .service-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .service-item {
            background-color: #333;
            border-radius: 8px;
            padding: 1rem;
            width: 300px;
            }

        .service-item img {
            width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <span class="navbar-brand"><img class="navbar-img" src="TWIN.jpg" alt="User Image"></span>
            <span class="navbar-brand" style="color:white;"><?php echo htmlspecialchars($nombre); ?></span>
            <a class="navbar-brand" href="sesion_compra.php">Inicio</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="inventario.php">Inventario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Servicios.php">Servicios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Financiamiento.php">Financiamiento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contacto.php">Contacto</a>
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

    <main>
        <h1></h1>

        <section class="services">
            <h2>Nuestros Servicios</h2>
            <div class="service-grid">
                <div class="service-item">
                    <img src="Mantenimiento.jpg" alt="Servicio de Mantenimiento">
                    <h3>Mantenimiento</h3>
                    <p>Mantén tu vehículo en perfectas condiciones con nuestros servicios de mantenimiento preventivo y correctivo.</p>
                </div>
                <div class="service-item">
                    <img src="Reparacion.jpg" alt="Servicio de Reparación">
                    <h3>Reparación</h3>
                    <p>Reparamos cualquier tipo de avería que pueda presentar tu vehículo, asegurando su funcionamiento óptimo.</p>
                </div>
                <div class="service-item">
                    <img src="personalizacion.jpg" alt="Servicio de Personalización">
                    <h3>Personalización</h3>
                    <p>Personaliza tu coche según tus gustos y necesidades con nuestra amplia gama de accesorios y modificaciones.</p>
                </div>
                <div class="service-item">
                    <img src="inspeccion.jpg" alt="Servicio de Inspección">
                    <h3>Inspección</h3>
                    <p>Ofrecemos servicios de inspección completa para asegurar que tu vehículo esté en las mejores condiciones.</p>
                </div>
                <div class="service-item">
                    <img src="financiacion.jpg" alt="Servicio de Financiación">
                    <h3>Financiación</h3>
                    <p>Te ayudamos a encontrar las mejores opciones de financiamiento para que puedas adquirir el auto de tus sueños.</p>
                </div>
                <div class="service-item">
                    <img src="asesoria.jpg" alt="Servicio de Asesoría">
                    <h3>Asesoría</h3>
                    <p>Nuestros expertos te brindan asesoría personalizada para que tomes la mejor decisión de compra.</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>