<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

try {
    
    $stmt = $cnnPDO->prepare("SELECT SUM(precio) AS total_ganado, COUNT(*) AS autos_vendidos FROM compra");
    $stmt->execute();
    $resultados = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_ganado = $resultados['total_ganado'];
    $autos_vendidos = $resultados['autos_vendidos'];

    
    $stmt = $cnnPDO->prepare("SELECT marca, modelo, anio, precio, tarjeta FROM compra");
    $stmt->execute();
    $autos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener los datos: " . $e->getMessage();
    exit();
}

$_SESSION['reporte'] = [
    'total_ganado' => $total_ganado,
    'autos_vendidos' => $autos_vendidos,
    'autos' => $autos
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 20px;
        }
        .reporte {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
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
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        .btn-primary {
            background-color: #FFD700;
            color: #000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary:hover {
            background-color: #FFA500;
            color: #000;
        }
        .btn-secondary {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-secondary:hover {
            background-color: #777;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="reporte">
        <h2>Reporte de Ventas</h2>
        <p>Total de dinero ganado: <strong>$<?php echo number_format($total_ganado, 2); ?></strong></p>
        <p>Total de autos vendidos: <strong><?php echo $autos_vendidos; ?></strong></p>

        <h4>Autos vendidos:</h4>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Número de Tarjeta</th> <!-- Nueva columna para el número de tarjeta -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autos as $auto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($auto['marca']); ?></td>
                    <td><?php echo htmlspecialchars($auto['modelo']); ?></td>
                    <td><?php echo htmlspecialchars($auto['anio']); ?></td>
                    <td>$<?php echo number_format($auto['precio'], 2); ?></td>
                    <td><?php echo htmlspecialchars($auto['tarjeta']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="btn-container">
            <form action="descargar_pdf.php" method="post" style="display: inline;">
                <button type="submit" class="btn-primary">Descargar Reporte en PDF</button>
            </form>

            <a href="inicio_admin.php" class="btn-secondary">Regresar a Inicio</a>
        </div>
    </div>
</body>
</html>
