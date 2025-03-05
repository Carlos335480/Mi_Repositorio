<?php
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: index.php?error=not_logged_in");
    exit();
} else {
    $nombre = $_SESSION['nombre']; 
}

$_SESSION['nombre'] = $nombre;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesion Iniciada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            background: linear-gradient(to bottom, #0055ff, #9ebeff);
            min-height: 100vh; 
            background-attachment: fixed; 
            overflow-x: hidden; 
        }

        body {
            border-radius: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
            min-height: 100vh;
        }
        #tam_img {
            width: 100%;
            height: 500px;
            object-fit: scale-down;
        }

        .Tarjeta-img {
            width: 100%;
            height: 200px;
            object-fit: scale-down;
        }
        
        input {
            border-radius: 15px;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            background-color: #1c1c1c;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 30px;
        }

        .btn-danger {
            background-color: #dc3545;
            border-radius: 15px;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .navbar {
            background-color: black;
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

        .navbar-brand img {
            height: 40px;
            width: auto;
        }

        .navbar-text {
            color: white;
            margin-left: 15px;
        }
        
        .navbar-toggler-icon {
            filter: invert(100%);
        }

        .navbar .dropdown-menu {
            background-color: black;
            color: white;
        }

        .navbar .dropdown-item:hover {
            background-color: #ddd;
            color: black;
        }

        .card-desactivar {
            background-color: #2d2d2d; 
            color: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .card-desactivar:hover {
            transform: translateY(-10px); 
        }

        .card-desactivar .card-header {
            background-color: #343a40;
            color: white;
            border-bottom: none;
            font-size: 1.25rem;
        }

        .card-desactivar .card-body {
            padding: 20px;
        }

        .card-producto {
            background-color: white;
            color: black;
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .card-producto:hover {
            transform: translateY(-10px); 
        }

        .card-producto .card-body {
            padding: 20px;
        }

        .btn-link {
            color: white;
            border: none;
            background: none;
        }

        .btn-link:hover {
            color: #c82333;
        }

        .navbar-toggler-icon {
            filter: invert(100%);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="sesion_iniciada.php">
                <img src="Image/logo_ShopFly.png" alt="Logo de la tienda">
            </a>
            <span class="navbar-text ms-3 fs-4">
                <?php echo $_SESSION['nombre']; ?>
            </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="">Carrito</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Ofertas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Articulos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Nosotros</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div style="background-color: white;" class="container">
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="Image\Articulo.jpg" id="tam_img" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="Image\Articulo 2.jpg" id="tam_img" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="Image\Articulo 3.jpg" id="tam_img" class="d-block w-100" alt="...">
          </div>
        <br>
        <br>
      </div>
    </div>
  </div>


    <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-auto">
              <div class="card-producto" style="width: 18rem;">
                  <img src="Image\Articulo.jpg" class="card-img-top Tarjeta-img" alt="...">
                  <div class="card-body">
                      <h4 class="card-title">Chaqueta De Mezclilla Delgada</h4>
                      <p class="card-text">Color Azul corte Slim Para Hombre<br>Marca: Colorworld<br><strong>$275</strong></p>
                  </div>
              </div>
          </div>
          <div class="col-auto">
              <div class="card-producto" style="width: 18rem;">
                  <img src="Image\articulo 2.jpg" class="card-img-top Tarjeta-img" alt="...">
                  <div class="card-body">
                      <h4 class="card-title">Samsung Galaxy S24 Ultra</h4>
                      <p class="card-text">5G Dual SIM 256 GB negro titanio con 8 GB de Ram<br><strong>$20,400</strong></p>
                  </div>
              </div>
          </div>
          <div class="col-auto">
              <div class="card-producto" style="width: 18rem;">
                  <img src="Image\Articulo 3.jpg" class="card-img-top Tarjeta-img" alt="...">
                  <div class="card-body">
                      <h4 class="card-title">Consola Lenovo Legion Go</h4>
                      <p class="card-text">8.8" Amd 16gb Windows 11 Home Color Negro<br><strong>$14,106</strong></p>
                  </div>
              </div>
          </div>
          <div class="col-auto">
        <div class="card-producto" style="width: 18rem;">
          <img src="Image\Articulo 8.jpg" class="card-img-top Tarjeta-img" alt="...">
          <div class="card-body">
            <p class="card-text"><h4>Monitor gamer curvo Samsung</h4>F390 Series C27F390FH led 27"<br>De $4,999 a<br>$
              2,659</p>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <div class="card-producto" style="width: 18rem;">
          <img src="Image\Articulo 9.jpg" class="card-img-top Tarjeta-img" alt="...">
          <div class="card-body">
            <p class="card-text"><h4>Guante Portero Rinat Training Ad </h4> Sporta Mx<br>De $
              499 a<br>$
              472</p>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <div class="card-producto" style="width: 18rem;">
          <img src="Image\Articulo 10.jpg" class="card-img-top Tarjeta-img" alt="...">
          <div class="card-body">
            <p class="card-text"><h4>Reloj de pulsera Invicta Pro Diver</h4>para hombre color acero y oro<br>De $
              5,999 a<br>$
              1,424</p>
          </div>
        </div>
      </div>
      </div>
    </div>
    <div class="container mt-5">
        <div class="card-desactivar">
            <div class="card-header">
                Desactivar Cuenta
            </div>
            <div class="card-body">
                <p>Si desactivas tu cuenta, perderás acceso a todos los servicios. Esta acción es irreversible.</p>
                <form action="desactivar_cuenta.php" method="POST">
                    <input type="hidden" name="action" value="desactivar">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas desactivar tu cuenta?');">Desactivar Cuenta</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>



