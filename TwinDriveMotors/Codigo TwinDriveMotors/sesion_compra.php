<?php 
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

$nombre = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            color: white;
        }

        
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            object-fit: cover;
        }
        

        
        .content {
            position: relative;
            z-index: 1;
            text-align: center;
            padding-top: 20px;
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
    
    <video id="video-background" autoplay muted loop>
        <source src="videobody.mp4" type="video/mp4">
    </video>

    
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
    <section class="content">
        <h2>¡Hola, <?php echo htmlspecialchars($nombre); ?>!</h2>
        <p class="container">
            ¡Bienvenido a tu tienda de autos de confianza! En nuestro panel de usuario, tendrás acceso a todas las herramientas que necesitas para explorar y adquirir el automóvil de tus sueños.hasta consultar el inventario completo y revisar las ofertas más exclusivas. Ya sea que estés buscando un clásico atemporal o el último modelo deportivo, nuestro sitio te ofrece una experiencia de compra personalizada y completa. Disfruta de un catálogo diverso y detallado que te ayudará a encontrar el carro perfecto para ti ¡Explora, compara y adquiere el auto que siempre has querido!
        </p>
    </section>
</body>
</html>

