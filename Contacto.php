<?php 
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
   
    header('Location: index.php');
    exit();
}

$nombre = $_SESSION['nombre'];
$message = '';
$alertClass = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

    $nombre_form = htmlspecialchars($_POST['nombre']);
    $correo_form = htmlspecialchars($_POST['correo']);
    $mensaje_form = htmlspecialchars($_POST['mensaje']);

    
    $sql = "INSERT INTO contactos (nombre, correo, mensaje) VALUES (?, ?, ?)";

    $stmt = $cnnPDO->prepare($sql);
    if ($stmt->execute([$nombre_form, $correo_form, $mensaje_form])) {
        $message = "Mensaje enviado con éxito. Nos pondremos en contacto contigo pronto.";
        $alertClass = 'alert-success';
    } else {
        $message = "Error al enviar el mensaje. Por favor, intenta nuevamente.";
        $alertClass = 'alert-danger';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
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
        .form-group label {
            color: #FFD700;
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
        <h1 class="section-title">Contacto</h1>
        <br>
        <?php if (!empty($message)) : ?>
        <div class="alert <?php echo $alertClass; ?> mt-3" role="alert">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>
        <form action="Contacto.php" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <br>
            <button type="submit" class="btn-submit">Enviar</button>
        </form>
    </section>
</main>
</body>
</html>
