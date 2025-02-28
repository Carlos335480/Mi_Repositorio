<?php
session_start(); 

if (!isset($_SESSION['nomcliente'])) {
    header("Location: sesion_inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bancario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
        }
        #radius-shape-1, #radius-shape-2 {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
        }
        #radius-shape-1 {
            height: 400px;
            width: 400px;
            top: 10%;
            left: 10%;
            background: radial-gradient(circle, rgba(144,0,255,1) 0%, rgba(119,30,230,0.8) 60%, transparent 100%);
        }
        #radius-shape-2 {
            height: 350px;
            width: 350px;
            bottom: 10%;
            right: 10%;
            background: radial-gradient(circle, rgba(144,0,255,1) 0%, rgba(119,30,230,0.8) 60%, transparent 100%);
        }
        .bg-glass {
            background-color: rgb(235, 232, 232) !important;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .card-balance {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border-radius: 16px;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body class="background-radial-gradient">
    <div id="radius-shape-1"></div>
    <div id="radius-shape-2"></div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light animate__animated animate__zoomInDown">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="banco.png" height="50" alt="UNITY BANK Logo" class="me-2" />
          <span>UNITY BANK</span>
        </a>
        <div class="d-flex align-items-center">
          <div class="dropdown me-3">
            <a href="#" class="text-decoration-none position-relative text-warning" data-mdb-toggle="dropdown">
              <i class="fas fa-bell fa-lg"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">1</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Nueva notificación</a></li>
            </ul>
          </div>
          <a href="inicio.php" class="text-decoration-none">
            <img src="https://cdn-icons-png.flaticon.com/128/2550/2550309.png" class="rounded-circle" height="30" alt="User Avatar" />
          </a>
        </div>
      </div>
    </nav>

    <section class="container my-5">
        <div class="card shadow-3-strong animate__animated animate__zoomInDown bg-glass">
            <div class="card-header text-center bg-primary text-white">
                <h3 class="mb-0">Perfil del Usuario</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="https://cdn-icons-png.flaticon.com/128/4086/4086591.png" alt="Foto de perfil" class="rounded-circle img-fluid mb-3">
                        <h5 class="text-primary">Hola, <?php echo $_SESSION['nomcliente']; ?></h5>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-primary">Número de cuenta:</th>
                                    <td><?php echo $_SESSION['numcuenta']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-primary">Nombre del cliente:</th>
                                    <td><?php echo $_SESSION['nomcliente']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-primary">Correo:</th>
                                    <td><?php echo $_SESSION['correo']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-primary">Tipo de cuenta:</th>
                                    <td><?php echo $_SESSION['tipodecuenta']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a href="#" class="btn btn-primary">Editar Perfil</a>
                <a href="logout.php" class="btn btn-danger" id="cerrarSesionBtn">Cerrar Sesión</a>
                <a href="#" class="btn btn-danger" id="desactivarCuentaBtn">Desactivar Cuenta</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <script>
      document.getElementById("cerrarSesionBtn").addEventListener("click", function (e) {
        e.preventDefault(); 
        alertify.confirm(
          "¿Estás seguro de que deseas cerrar sesión?",
          function () {
            alertify.success("Cerrando sesión...");
            window.location.href = "logout.php";
          },
          function () {
            alertify.error("Acción cancelada.");
          }
        );
      });

      document.getElementById("desactivarCuentaBtn").addEventListener("click", function (e) {
        e.preventDefault(); 
        alertify.confirm(
          "¿Estás seguro de que deseas desactivar tu cuenta? Esta acción no se puede deshacer.",
          function () {
            alertify.success("Desactivando cuenta...");
            window.location.href = "desactivar_cuenta.php";
          },
          function () {
            alertify.error("Acción cancelada.");
          }
        );
      });
    </script>
</body>
</html>
