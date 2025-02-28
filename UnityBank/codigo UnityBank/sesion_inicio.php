<?php
session_start();
require_once 'db_conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    try {

        $sql = "SELECT * FROM usuarios WHERE (correo = :correo OR numcuenta = :numcuenta) AND password = :password";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':numcuenta', $correo);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario_valido = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario_valido['estado'] == 0) {
                echo "<script>
                    alert('Cuenta desactivada. Contacta con soporte.');
                    window.location.href='sesion_inicio.php';
                </script>";
                exit();
            }

            $_SESSION['numcuenta'] = $usuario_valido['numcuenta'];
            $_SESSION['nomcliente'] = $usuario_valido['nomcliente'];
            $_SESSION['correo'] = $usuario_valido['correo'];
            $_SESSION['tipodecuenta'] = $usuario_valido['tipodecuenta'];
            $_SESSION['estado'] = $usuario_valido['estado'];
            $_SESSION['saldo'] = $usuario_valido['saldo'];

            header("Location: inicio.php");
            exit();
        } else {
            echo "<script>
                alert('Datos incorrectos. Inténtalo de nuevo.');
                window.location.href='sesion_inicio.php';
            </script>";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNITY BANK - Login</title>
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- MD Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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
        .bg-glass {
            background-color: hsl(233, 17.40%, 91.00%) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }
    </style>
</head>
<body>
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-5 fw-bold ls-tight animate__animated animate__rotateIn" style="color: hsl(218, 81%, 95%)">
                        ¡Bienvenido a UNITY BANK! <br />
                        <span style="color: hsl(218, 81%, 75%)">Tu socio financiero confiable.</span>
                    </h1>
                    <p class="mb-4 opacity-70 animate__animated animate__rotateIn" style="color: hsl(218, 81%, 85%)">
                        En UNITY BANK, trabajamos contigo para cumplir tus metas financieras. Nuestra misión es simplificar tu vida, ofreciéndote las herramientas y soluciones que necesitas para crecer y prosperar.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card bg-glass animate__animated animate__rotateIn">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="POST">
                                <div class="form-outline mb-4">
                                    <input type="text" id="correo" name="correo" class="form-control" required />
                                    <label class="form-label" for="correo">Email ó No. Cuenta</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control" required />
                                    <label class="form-label" for="password">Contraseña</label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

                                <div class="text-center">
                                    <p>Iniciar Sesión Con:</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
