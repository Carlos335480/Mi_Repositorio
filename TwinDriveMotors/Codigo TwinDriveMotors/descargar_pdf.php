<?php
session_start();

if (!isset($_SESSION['reporte'])) {
    header('Location: reporte_ventas.php');
    exit();
}

$reporte = $_SESSION['reporte'];
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
            background-color: #fff;
            color: #000;
        }
        .reporte {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        @media print {
            .btn-container {
                display: none;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="reporte">
        <h2>Reporte de Ventas</h2>
        <p>Total de dinero ganado: <strong>$<?php echo number_format($reporte['total_ganado'], 2); ?></strong></p>
        <p>Total de autos vendidos: <strong><?php echo $reporte['autos_vendidos']; ?></strong></p>

        <h4>Autos vendidos:</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Número de Tarjeta</th> <!-- Nueva columna para mostrar el número de tarjeta -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reporte['autos'] as $auto): ?>
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
            <a href="reportes.php" class="btn btn-primary">Volver al Reporte</a>
        </div>
    </div>
</body>
</html>
