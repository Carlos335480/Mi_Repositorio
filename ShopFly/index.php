<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopFly - Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: linear-gradient(to bottom right, #0055ff, #9ebeff);
            color: white;
            overflow-x: hidden; 
        }

        .navbar {
            background-color: #000;
            opacity: 0.9;
        }

        .navbar a {
            color: #f2f2f2;
        }

        .navbar a:hover {
            color: #e2c18b; /* Color dorado */
        }

        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-image: url('Image/hero_background¿.jpg'); /* Cambia esto por la URL de tu imagen de fondo */
            background-size: cover;
            background-position: center;
            position: relative;
            color: white;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5); /* Fondo oscuro con opacidad */
        }

        .hero-content {
            position: relative;
            z-index: 1; /* Asegúrate de que el contenido esté por encima del fondo */
        }

        .btn-custom {
            background-color: #0055ff;
            color: white;
            border-radius: 25px;
            padding: 10px 30px;
            margin: 10px;
            transition: background-color 0.3s, transform 0.3s;
            border: none;
        }

        .btn-custom:hover {
            background-color: #003bb5; /* Color más oscuro al pasar el mouse */
            transform: scale(1.05);
        }

        .service-card {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin: 20px 0;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .footer {
            background-color: #000;
            color: #f2f2f2;
            text-align: center;
            padding: 20px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="sesion_iniciada.php">
            <img src="Image/logo_ShopFly.png" alt="Logo de la tienda" style="height: 40px;">
        </a>
        <span class="navbar-text ms-3 fs-4">Bienvenido a ShopFly</span>
    </div>
</nav>

<div class="hero">
    <div class="hero-content">
        <h1 class="display-4">¡Bienvenido a ShopFly!</h1>
        <p class="lead">Tu tienda de confianza para los mejores productos.</p>
        <a href="Registro.php" class="btn btn-custom">Registrarse</a>
        <a href="inicio_se.php" class="btn btn-custom">Iniciar Sesión</a>
    </div>
</div>

<div class="container text-center mt-5">
    <h2>Nuestros Servicios</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="service-card">
                <h3>Compra de Productos</h3>
                <p>Explora nuestra amplia gama de productos electrónicos, ropa, y más, todo desde la comodidad de tu hogar.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card">
                <h3>Envío Rápido y Seguro</h3>
                <p>Recibe tus pedidos en tiempo récord con nuestro servicio de envío express, garantizando tu satisfacción.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="service-card">
                <h3>Soporte al Cliente 24/7</h3>
                <p>Nuestro equipo de atención al cliente está disponible 24/7 para resolver todas tus dudas y ayudarte en todo lo que necesites.</p>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 ShopFly - Todos los derechos reservados</p>
</div>

</body>
</html>
