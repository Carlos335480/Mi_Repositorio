<?php

require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "INSERT INTO usuarios (id, nombre, email, password) VALUES (?, ?, ?, ?)";

    
    $stmt = $cnnPDO->prepare($sql);
    
    
    if ($stmt->execute([$id, $nombre, $email, $password])) {
        echo "Registro exitoso";
        
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }

    
    $stmt = null;
}


$cnnPDO = null;
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Twindrive Motors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            background-color: #000; 
            padding: 20px;
            border-radius: 10px;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 100%; 
            max-width: 100%; 
            height: auto; 
        }

        .card {
            background-color: black;
            border: none;
            padding: 20px;
            border-radius: 10px;
        }

        .card-title {
            color: #fff;
        }

        .form-label {
            color: #fff;
        }

        .form-control {
            background-color: #fff; 
            border: none;
            color: #000; 
        }

        .form-control:focus {
            background-color: #fff; 
            color: #000; 
        }

        .btn-warning {
            background-color: #ffcc00;
            border: none;
            color: #000;
            font-weight: bold;
        }

        .btn-warning:hover {
            background-color: #e6b800;
        }

        a {
            color: #ffcc00;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="logo-container">
                    <img src="TWIN.jpg" alt="Twindrive Motors Logo" class="img-fluid">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">Registro</h2>
                        <form action="registro.php" method="POST">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="id" name="id" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Crear Cuenta</button>
                        </form>
                        <p class="text-center mt-3">
                            <a href="index.php">Regresar al inicio de sesión</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
