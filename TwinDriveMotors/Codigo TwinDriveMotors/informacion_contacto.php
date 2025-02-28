<?php
session_start();

if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

try {
   
    $stmt_contactos = $cnnPDO->prepare("SELECT nombre, correo, mensaje FROM contactos");
    $stmt_contactos->execute();
    $contactos = $stmt_contactos->fetchAll(PDO::FETCH_ASSOC);

    
    $stmt_financiamiento = $cnnPDO->prepare("SELECT nombre, correo, telefono, ingresos, vehiculo FROM solicitudes_financiamiento");
    $stmt_financiamiento->execute();
    $financiamientos = $stmt_financiamiento->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los datos: " . $e->getMessage();
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de Contacto y Financiamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 20px;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            margin-top: 30px;
            color: #FFD700;
        }
        .table {
            width: 100%;
            margin-top: 20px;
            color: #fff;
            background-color: #333;
        }
        .table th, .table td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }
        .table th {
            background-color: #555;
        }
        .table-hover tbody tr:hover {
            background-color: #444;
        }
        .btn-back {
            margin-top: 20px;
            background-color: #FFD700;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #FFA500;
            color: #000;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Información de Contacto</h2>
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Mensaje</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto): ?>
            <tr>
                <td><?php echo htmlspecialchars($contacto['nombre']); ?></td>
                <td><?php echo htmlspecialchars($contacto['correo']); ?></td>
                <td><?php echo htmlspecialchars($contacto['mensaje']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Información de Financiamiento</h2>
    <table class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Ingresos Mensuales</th>
                <th>Vehículo de Interés</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($financiamientos as $financiamiento): ?>
            <tr>
                <td><?php echo htmlspecialchars($financiamiento['nombre']); ?></td>
                <td><?php echo htmlspecialchars($financiamiento['correo']); ?></td>
                <td><?php echo htmlspecialchars($financiamiento['telefono']); ?></td>
                <td><?php echo htmlspecialchars($financiamiento['ingresos']); ?></td>
                <td><?php echo htmlspecialchars($financiamiento['vehiculo']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="inicio_admin.php" class="btn-back">Regresar a Inicio</a>
</div>

</body>
</html>


