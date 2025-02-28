<?php
require_once 'db_conexion.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$toastMessage = null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) { 
    $numcuenta = $_POST['numcuenta'];
    $nomcliente = $_POST['nomcliente'];
    $correo = $_POST['correo'];
    $tipodecuenta = $_POST['tipodecuenta'];

    if (!empty($numcuenta) && !empty($nomcliente) && !empty($correo) && !empty($tipodecuenta)) {

        $password = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);

        $sql = "INSERT INTO usuarios (numcuenta, nomcliente, correo, tipodecuenta, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if ($stmt->execute([$numcuenta, $nomcliente, $correo, $tipodecuenta, $password])) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'cortescabreram506@gmail.com';
                $mail->Password   = 'mgfkfatyjhqoptlj'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('no-reply@tu-dominio.com', 'Unity Bank');
                $mail->addAddress($correo);

                $activarcuenta="activarcuenta.php";

                $mail->isHTML(true);
                $mail->Subject = "Registro exitoso en Unity Bank";
                $mail->Body    = "
                    <html>
                    <head><title>Registro Exitoso</title></head>
                    <body>
                        <h2>¡Gracias por registrarte!</h2>
                        <p><strong>Nombre:</strong> $nomcliente</p>
                        <p><strong>Número de Cuenta:</strong> $numcuenta</p>
                        <p><strong>Email:</strong> $correo</p>
                        <p><strong>Tipo de Cuenta:</strong> $tipodecuenta</p>
                        <p><strong>Contraseña:</strong> $password</p>
                        <p>Utiliza esta contraseña para iniciar sesión en nuestra plataforma.</p>
                        <p>¡¡GRACIAS POR CONFIAR EN UNITY BANK!!</p>
                    </body>
                    </html>
                ";

                $mail->send();
                $toastMessage = json_encode([
                    'type' => 'success',
                    'message' => 'Registro exitoso. Te hemos enviado un correo con tus datos.'
                ]);
            } catch (Exception $e) {
                $toastMessage = json_encode([
                    'type' => 'warning',
                    'message' => 'Registro exitoso, pero no se pudo enviar el correo.'
                ]);
            }
        } else {
            $toastMessage = json_encode([
                'type' => 'error',
                'message' => 'Error al registrar los datos en la base de datos.'
            ]);
        }
        $stmt = null;
    } else {
        $toastMessage = json_encode([
            'type' => 'warning',
            'message' => 'Por favor, completa todos los campos.'
        ]);
    }
}
$conexion = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="registro.css">
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
        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }
        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }
        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-transparent">
  <div class="container-fluid">
    <a class="navbar-brand" href="activar_cuenta.php">Registro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a style="color:white;" class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a style="color:white;" class="nav-link active" aria-current="page" href="sesion_inicio.php">Inicio de Sesión</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5"> 
    <div class="row gx-lg-5 align-items-center mb-5">
        <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10 ">
            <h1 class="my-5 display-5 fw-bold ls-tight animate__animated animate__rotateIn" style="color: hsl(218, 81%, 95%)">
                UNITY BANK <br />
                <span class="animate__animated animate__rotateIn" style="color: hsl(218, 81%, 75%)">Registro</span>
            </h1>
            <p class="mb-4 opacity-70 animate__animated animate__rotateIn" style="color: hsl(218, 81%, 85%)">
                Aqui podras registrarte de una manera sencilla solamente tendras que poner los datos solicitados y nosotros nos encargamos del resto. ¡¡Disfruta tu estancia en Unity Bank!!
            </p>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
            <div class="card bg-glass animate__animated animate__rotateIn">
                <div class="card-body px-4 py-5 px-md-5 ">
                    <form action="registro.php" method="post">
                        <div class="form-outline mb-4">
                            <input type="text" name="numcuenta" id="numcuenta" class="form-control" required />
                            <label class="form-label" for="numcuenta">Número de Cuenta</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" name="nomcliente" id="nomcliente" class="form-control" required />
                            <label class="form-label" for="nomcliente">Nombre del Cliente</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" name="correo" id="correo" class="form-control" required />
                            <label class="form-label" for="correo">Correo Electrónico</label>
                        </div>
                        <div class="mb-4">
                            <label for="tipodecuenta" class="form-label">Tipo de Cuenta</label>
                            <select name="tipodecuenta" id="tipodecuenta" class="form-select" required>
                                <option value="">Seleccionar</option>
                                <option value="Debito">Debito</option>
                                <option value="Ahorro">Ahorro</option>
                                <option value="Tarjeta de Credito">Tarjeta de Credito</option>
                            </select>
                        </div>
                        <button type="submit" name="registrar" class="btn btn-primary btn-block mb-4">
                            Registrar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    <?php if (!empty($toastMessage)): ?>
        const toastData = <?= $toastMessage ?>;

        Toastify({
            text: toastData.message,
            duration: 3000,
            close: true,
            gravity: "top",
            position: "right", 
            backgroundColor: toastData.type === "success" ? "green" : toastData.type === "warning" ? "orange" : "red",
            stopOnFocus: true
        }).showToast();
    <?php endif; ?>
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
