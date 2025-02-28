<?php
session_start();

if (!isset($_SESSION['nomcliente'])) {
    header("Location: sesion_inicio.php");
    exit();
}

require_once "db_conexion.php";

$numcuenta = $_SESSION['numcuenta']; 

try {
    
    $stmt = $conexion->prepare("SELECT cuenta_destino, monto FROM historial WHERE cuenta_origen = :numcuenta ORDER BY id DESC");
    $stmt->bindParam(":numcuenta", $numcuenta, PDO::PARAM_STR);
    $stmt->execute();
    $transferencias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error al obtener el historial: " . $e->getMessage();
    $transferencias = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Transferencias</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light animate__animated animate__bounceInLeft">
  <div class="container-fluid d-flex align-items-center justify-content-between">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="banco.png" height="50" alt="UNITY BANK Logo" class="me-2"/>
      <span>UNITY BANK</span>
    </a>

    <span class="text-center flex-grow-1 mx-3">Bienvenido <?php echo $_SESSION['nomcliente']; ?></span>

    <div class="d-flex align-items-center">
      <a href="perfil.php" class="text-decoration-none">
        <img src="https://cdn-icons-png.flaticon.com/128/1057/1057240.png" class="rounded-circle" height="30" alt="User Avatar"/>
      </a>
    </div>
  </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">Historial de Transferencias</h2>
    <table class="table table-striped table-hover table-dark rounded">
        <thead>
            <tr>
                <th>Cuenta Destino</th>
                <th>Monto Enviado</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($transferencias) > 0): ?>
                <?php foreach ($transferencias as $transferencia): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($transferencia['cuenta_destino']); ?></td>
                        <td>$<?php echo number_format($transferencia['monto'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center">No hay transferencias registradas</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
