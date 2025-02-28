<?php
session_start();
if (!isset($_SESSION['nomcliente'])) {
  header("Location: sesion_inicio.php");
  exit();
}

$numcuenta = isset($_SESSION['numcuenta']) ? $_SESSION['numcuenta'] : '';
$nomcliente = isset($_SESSION['nomcliente']) ? $_SESSION['nomcliente'] : '';
$correo = isset($_SESSION['correo']) ? $_SESSION['correo'] : '';
$tipodecuenta = isset($_SESSION['tipodecuenta']) ? $_SESSION['tipodecuenta'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
$estado = isset($_SESSION['estado']) ? $_SESSION['estado'] : '';
$saldo = isset($_SESSION['saldo']) ? $_SESSION['saldo'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bancario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css"
        rel="stylesheet"
    />
    <style>
        .card-balance {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
        }

        .icon-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .icon-box {
            text-align: center;
            flex: 1;
        }

        .icon-box i {
            font-size: 24px;
            color: #007bff;
        }

        .icon-box p {
            margin-top: 8px;
            font-size: 14px;
            color: #333;
        }

        .testimonial-card .card-up {
        height: 120px;
        overflow: hidden;
        border-top-left-radius: 0.25rem;
        border-top-right-radius: 0.25rem;
        }

        .testimonial-card .avatar {
        width: 110px;
        margin-top: -60px;
        overflow: hidden;
        border: 3px solid #fff;
        border-radius: 50%;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light animate__animated animate__bounceInLeft">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img
        src="banco.png"
        height="50"
        alt="UNITY BANK Logo"
        class="me-2"
      />
      <span>UNITY BANK</span>
    </a>

    <span class="text-center flex-grow-1 mx-3">Bienvenido <?php echo $_SESSION['nomcliente']; ?></span>

    <div class="d-flex align-items-center">
      <div class="dropdown me-3">
        <a
          href="#"
          class="text-decoration-none position-relative text-warning"
          data-mdb-toggle="dropdown"
        >
          <i class="fas fa-bell fa-lg"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            1
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="#">Nueva notificación</a></li>
        </ul>
      </div>

      <a href="perfil.php" class="text-decoration-none">
        <img
          src="https://cdn-icons-png.flaticon.com/128/1057/1057240.png"
          class="rounded-circle"
          height="30"
          alt="User Avatar"
        />
      </a>
    </div>
  </div>
</nav>

<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  rel="stylesheet"
/>


    <div class="container mt-4">
        <div class="card-balance animate__animated animate__rollIn">
            <h5>Saldo:</h5>
            <h2 class="my-3">$<?php echo number_format($saldo, 2);?></h2>
            <div class="d-flex justify-content-center">
                <button class="btn btn-light btn-sm me-2">Depositar</button>
                <a href="transferir.php"><button class="btn btn-outline-light btn-sm">Transferir</button></a>
                <a href="historial.php"><button class="btn btn-outline-light btn-sm">Historial de Transferencias</button></a>
            </div>
        </div>
<div class="icon-container mt-4">
    <div class="icon-box">
        <img src="https://cdn-icons-gif.flaticon.com/12147/12147280.gif" alt="Dinero del extranjero" style="width: 80px; height: 80px;">
        <p></p>
        <button class="btn btn-sm btn-outline-primary mt-2">
        Dinero del Extranjero
        </button>
    </div>
    <div class="icon-box">
        <img src="https://cdn-icons-gif.flaticon.com/13896/13896444.gif" alt="Recargar tiempo aire" style="width: 80px; height: 80px;">
        <p></p>
        <button class="btn btn-sm btn-outline-primary mt-2">
        Recargar Tiempo Aire
        </button>
    </div>
    <div class="icon-box">
        <img src="https://cdn-icons-gif.flaticon.com/16875/16875074.gif" alt="Pagar un servicio" style="width: 80px; height: 80px;">
        <p></p>
        <button class="btn btn-sm btn-outline-primary mt-2">
        Pagar un Servicio
        </button>
    </div>
    <div class="icon-box">
        <img src="https://cdn-icons-gif.flaticon.com/15713/15713190.gif" alt="Tu negocio" style="width: 80px; height: 80px;">
        <p></p>
        <button class="btn btn-sm btn-outline-primary mt-2">
        Tu Negocio
        </button>
    </div>
</div>


        <div class="mt-4 animate__animated animate__rollIn">
            <h5>Mis Tarjetas</h5>
            <div class="d-flex align-items-center">
                <img src="https://cdn-icons-png.flaticon.com/128/194/194458.png" alt="Tarjeta Débito" class="me-3">
                
                <img src="https://cdn-icons-png.flaticon.com/128/609/609713.png" alt="Tarjeta Débito" class="me-3">
                
            </div>
        </div>
        

        <section>

  <div class="row text-center animate__animated animate__bounceInLeft">
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="card testimonial-card">
        <div class="card-up" style="background-color:rgb(62, 106, 226);"></div>
        <div class="avatar mx-auto bg-white">
          <img src="https://cdn-icons-png.flaticon.com/128/508/508250.png"
            class="rounded-circle img-fluid" />
        </div>
        <div class="card-body">
          <h4 class="mb-4">Seguridad y confianza</h4>
          <hr />
          <p class="dark-grey-text mt-4">
            <i class="fas fa-quote-left pe-2"></i>Protegemos tu dinero y tu información con tecnología de punta.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="card testimonial-card">
        <div class="card-up" style="background-color:rgb(35, 76, 189);"></div>
        <div class="avatar mx-auto bg-white">
          <img src="https://cdn-icons-png.flaticon.com/128/10872/10872061.png"
            class="rounded-circle img-fluid" />
        </div>
        <div class="card-body">
          <h4 class="mb-4">Tecnología avanzada</h4>
          <hr />
          <p class="dark-grey-text mt-4">
            <i class="fas fa-quote-left pe-2"></i>Nuestra banca en línea y app móvil te permiten gestionar tus finanzas 24/7, estés donde estés.
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-0">
      <div class="card testimonial-card">
        <div class="card-up" style="background-color:rgb(36, 18, 199);"></div>
        <div class="avatar mx-auto bg-white">
          <img src="https://cdn-icons-png.flaticon.com/128/8774/8774909.png"
            class="rounded-circle img-fluid" />
        </div>
        <div class="card-body">
          <h4 class="mb-4">Préstamos flexibles</h4>
          <hr />
          <p class="dark-grey-text mt-4">
            <i class="fas fa-quote-left pe-2"></i> Compra tu casa, tu auto o financia tus proyectos con tasas competitivas y planes a tu medida.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
    </div>

    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
    ></script>
</body>
</html>