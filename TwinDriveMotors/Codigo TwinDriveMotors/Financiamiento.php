<?php 
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';
if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
    
    header('Location: index.php');
    exit();
}

$nombreSesion = $_SESSION['nombre'];

$message = '';
$alertClass = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $telefono = htmlspecialchars($_POST['telefono']);
    $ingresos = htmlspecialchars($_POST['ingresos']);
    $vehiculo = htmlspecialchars($_POST['vehiculo']);
    
    
    if (empty($nombre) || empty($correo) || empty($telefono) || empty($ingresos) || empty($vehiculo)) {
        $message = "Todos los campos son obligatorios.";
        $alertClass = 'alert-warning';
    } else {
        
        $sql = "INSERT INTO solicitudes_financiamiento (nombre, correo, telefono, ingresos, vehiculo) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $cnnPDO->prepare($sql);
        
        if ($stmt->execute([$nombre, $correo, $telefono, $ingresos, $vehiculo])) {
            $message = "Solicitud enviada con éxito. Nos pondremos en contacto contigo pronto.";
            $alertClass = 'alert-success';
        } else {
            $message = "Error al enviar la solicitud. Por favor, intenta nuevamente.";
            $alertClass = 'alert-danger';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financiamiento</title>
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
        main {
            padding: 20px;
        }
        .section-title {
            color: #FFD700;
        }
        .form-control, .form-select {
            margin-bottom: 10px;
        }
        .btn-submit {
            background-color: #FFD700;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
        }
        .btn-submit:hover {
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
            <span class="navbar-brand" style="color:white;"><?php echo htmlspecialchars($nombreSesion); ?></span>
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
        <h1 class="section-title">Opciones de Financiamiento</h1>
        <br>
        <p>
            Nosotros, entendemos que cada cliente tiene necesidades financieras únicas. Es por eso que ofrecemos 
            una variedad de opciones de financiamiento para ayudarle a adquirir el vehículo que desea sin comprometer su presupuesto.
        </p>
        <p>
            Trabajamos con varias instituciones financieras de confianza para ofrecer tasas de interés competitivas y planes de pago 
            flexibles. Ya sea que tenga un excelente historial crediticio o esté trabajando para mejorar su crédito, nuestros expertos 
            en financiamiento están aquí para guiarle a través del proceso y encontrar la solución que mejor se adapte a su situación.
        </p>
        <p>
            Nuestro proceso de solicitud es sencillo y rápido, y estamos dedicados a hacer que su experiencia de compra sea lo más 
            libre de estrés posible. Visítenos hoy y descubra cómo podemos ayudarle a conducir el auto de sus sueños.
        </p>
    </section>
    <section class="container">
        <h2 class="section-title">Formulario de Solicitud de Financiamiento</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Número de Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="ingresos" class="form-label">Ingresos Mensuales</label>
                <input type="text" class="form-control" id="ingresos" name="ingresos" required>
            </div>
            <div class="mb-3">
                <label for="vehiculo" class="form-label">Vehículo de Interés</label>
                <input type="text" class="form-control" id="vehiculo" name="vehiculo" required>
            </div>
            <button type="submit" class="btn-submit">Enviar Solicitud</button>
            <?php if (!empty($message)) : ?>
            <div class="alert <?php echo $alertClass; ?> mt-3" role="alert">
                <?php echo $message; ?>
            </div>
            <?php endif; ?>
        </form>
    </section>
</main>
</body>
</html>


