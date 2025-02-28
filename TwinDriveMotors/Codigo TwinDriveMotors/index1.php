<?php
session_start();
require_once 'db_conexion.php';

if (isset($_POST['iniciar_sesion'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Correo y contraseña son requeridos.";
    } else {
        $select = $cnnPDO->prepare('SELECT * FROM usuarios WHERE email = ? AND password = ?');
        $select->execute([$email, $password]);
        $count = $select->rowCount();
        $campo = $select->fetch();

        if ($count > 0) {
            $_SESSION['nombre'] = $campo['nombre'];
            $_SESSION['email'] = $campo['email'];

            if (strpos($campo['email'], 'A') === 0) {
                header('Location: inicio_admin.php');
            } else {
                header('Location: sesion_compra.php');
            }
            exit();
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio Sesion</title>
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

        .container {
            position: relative;
            z-index: 1;
            display: flex;
            width: 80%;
            max-width: 1200px;
            background-color: rgba(0, 0, 0, 0.7);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            color: white;
            margin: auto;
            top: 50%;
            transform: translateY(-50%);
            padding: 20px;
            border-radius: 15px;
        }

        .izquierda, .derecha {
            flex: 1;
            padding: 20px;
        }

        .izquierda img {
            width: 100%;
            height: auto;
            object-fit: fill;
        }

        .derecha h2 {
            margin-bottom: 20px;
            font-size: 55px;
            text-align: center;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 15px;
            border: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #FFD700;
            color: black;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-size: 25px;
        }

        button:hover {
            background-color: #FFA500;
        }

        .derecha a {
            color: white;
        }
    </style>
</head>
<body>

    <video id="video-background" autoplay muted loop>
        <source src="videobody.mp4" type="video/mp4">
    </video>

    <div class="container">
        <div class="izquierda">
            <img src="TWIN.jpg" alt="">
        </div>
        <div class="derecha">
            <h2 class="display-1">Inicio de Sesión</h2>
            <form action="" method="post">
                <div class="form-group h4">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group h4">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
                <br>
                <br>
                <center><a style="color:white;" href="registro.php">Crea una Cuenta</a></center>
            </form>
        </div>
    </div>
</body>
</html>
