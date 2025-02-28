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
    <title>Nosotros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
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
        .section-title {
            color: #FFD700;
        }
        .testimonial {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .cta .btn {
            background-color: #FFD700;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 10px;
        }
        .cta .btn:hover {
            background-color: #FFA500;
        }
                footer {
            background-color: #222;
            color: #fff;
            text-align: center;
            padding: 1rem;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <span class="navbar-brand"><img class="navbar-img" src="TWIN.jpg"alt="User Image"></span>
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
    <section class="container">
        <h1 class="section-title">Sobre Nosotros</h1>
        <br>
        <p>
            Bienvenido a su destino confiable para la compra y venta de vehículos de calidad. 
            Con años de experiencia en la industria automotriz, nos enorgullece ofrecer una amplia selección de autos 
            que cumplen con los más altos estándares de calidad y confiabilidad.
        </p>
        <p>
            Nuestro equipo de profesionales está comprometido con brindar un servicio excepcional, asegurando que cada 
            cliente encuentre el vehículo perfecto que se adapte a sus necesidades y presupuesto. Ya sea que esté buscando 
            su primer auto, un modelo de lujo o una camioneta para el trabajo, estamos aquí para ayudarle en cada paso del 
            proceso.
        </p>
        <p>
            Nosotros creemos en la transparencia y la honestidad. Todos nuestros vehículos son rigurosamente 
            inspeccionados y ofrecemos opciones de financiamiento flexibles para facilitar su compra. Visítenos hoy y descubra 
            por qué somos la elección preferida para la compra y venta de autos en [Nombre de la Ciudad].
        </p>
    </section>
    
    <section class="container">
        <h2 class="section-title">Misión</h2>
        <p>Nuestra misión es proporcionar vehículos de alta calidad y servicios excepcionales, asegurando la satisfacción y confianza de nuestros clientes en cada transacción.</p>
        
        <h2 class="section-title">Visión</h2>
        <p>Ser la empresa líder en la compra y venta de vehículos, reconocida por nuestra integridad, transparencia y compromiso con la excelencia.</p>
    </section>
    
    <section class="container">
        <h2 class="section-title">Testimonios de Clientes</h2>
        <div class="testimonial">
            <p>"Excelente servicio y vehículos de calidad. Estoy muy satisfecho con mi compra." - Cliente 1</p>
        </div>
        <div class="testimonial">
            <p>"La mejor experiencia de compra de autos que he tenido. Altamente recomendados." - Cliente 2</p>
        </div>
       
    </section>
    
    <section class="container cta">
        <h2 class="section-title">¿Listo para encontrar tu próximo vehículo?</h2>
        <a href="inventario.php" class="btn">Ver Inventario</a>
        <a href="contacto.php" class="btn">Contáctanos</a>
    </section>
</main>
</body>
</html>
