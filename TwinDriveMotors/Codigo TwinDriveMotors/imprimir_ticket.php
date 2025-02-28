<?php
session_start();


if (!isset($_SESSION['ticket'])) {
    echo "No hay ticket disponible para imprimir.";
    exit();
}

$ticket = $_SESSION['ticket'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #fff;
            background-color: #000;
        }
        .ticket-container {
            border: 1px solid #ccc;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #333;
            color: #fff;
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
        }
        p {
            font-size: 16px;
            margin: 5px 0;
        }
        .ticket-details {
            margin-top: 20px;
        }
        .ticket-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .btn-back {
            display: block; /* Asegura que el botón se muestre en pantalla */
            width: auto;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            margin: 20px auto;
            max-width: 150px; /* Limita el ancho del botón */
        }
        .btn-back:hover {
            background-color: #555;
        }

        @media print {
            .btn-back {
                display: none; /* Asegura que el botón no aparezca en la impresión */
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="ticket-container">
        <h1>Ticket de Compra</h1>
        <img src="<?php echo htmlspecialchars($ticket['imagen']); ?>" alt="Imagen del Auto" class="ticket-image">
        <p><strong>ID de Compra:</strong> <?php echo htmlspecialchars($ticket['id']); ?></p>
        <p><strong>Marca:</strong> <?php echo htmlspecialchars($ticket['marca']); ?></p>
        <p><strong>Modelo:</strong> <?php echo htmlspecialchars($ticket['modelo']); ?></p>
        <p><strong>Año:</strong> <?php echo htmlspecialchars($ticket['anio']); ?></p>
        <p><strong>Precio:</strong> $<?php echo htmlspecialchars($ticket['precio']); ?></p>
        <p><strong>Descripción:</strong> <?php echo htmlspecialchars($ticket['descripcion']); ?></p>
        <p><strong>Tarjeta:</strong> <?php echo htmlspecialchars($ticket['tarjeta']); ?></p>
    </div>
    <a href="inventario.php" class="btn-back">Regresar</a>
</body>
</html>
