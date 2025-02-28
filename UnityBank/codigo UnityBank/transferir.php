<?php
session_start();
require_once 'db_conexion.php';

if (!isset($_SESSION['nomcliente'])) {
    header("Location: sesion_inicio.php");
    exit();
}

$numcuenta = $_SESSION['numcuenta'];
$saldo = $_SESSION['saldo'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cuentaDestino = $_POST['cuentaDestino'] ?? '';
    $monto = $_POST['monto'] ?? 0;

    if ($cuentaDestino === $numcuenta) {
        echo "<script>alert('No puedes transferir dinero a tu propia cuenta'); window.location.href='inicio.php';</script>";
        exit();
    }

    if ($monto > 0 && $monto <= $saldo) {
        try {
            $conexion->beginTransaction();

            $stmt = $conexion->prepare("SELECT saldo FROM usuarios WHERE numcuenta = :cuentaDestino FOR UPDATE");
            $stmt->bindParam(":cuentaDestino", $cuentaDestino, PDO::PARAM_STR);
            $stmt->execute();
            $saldoDestino = $stmt->fetchColumn();

            if ($saldoDestino !== false) { 
                $stmt = $conexion->prepare("
                    UPDATE usuarios 
                    SET saldo = CASE 
                        WHEN numcuenta = :numcuenta THEN saldo - :monto
                        WHEN numcuenta = :cuentaDestino THEN saldo + :monto
                    END
                    WHERE numcuenta IN (:numcuenta, :cuentaDestino)
                ");
                $stmt->bindParam(":numcuenta", $numcuenta, PDO::PARAM_STR);
                $stmt->bindParam(":cuentaDestino", $cuentaDestino, PDO::PARAM_STR);
                $stmt->bindParam(":monto", $monto, PDO::PARAM_INT);
                $stmt->execute();

                // Insertar en la tabla historial
                $stmt = $conexion->prepare("INSERT INTO historial (cuenta_origen, cuenta_destino, monto) VALUES (:numcuenta, :cuentaDestino, :monto)");
                $stmt->bindParam(":numcuenta", $numcuenta, PDO::PARAM_STR);
                $stmt->bindParam(":cuentaDestino", $cuentaDestino, PDO::PARAM_STR);
                $stmt->bindParam(":monto", $monto, PDO::PARAM_INT);
                $stmt->execute();

                $conexion->commit();

                $_SESSION['saldo'] -= $monto;

                echo "<script>alert('Transferencia exitosa'); window.location.href='inicio.php';</script>";
            } else {
                $conexion->rollBack();
                echo "<script>alert('La cuenta de destino no existe'); window.location.href='inicio.php';</script>";
            }
        } catch (Exception $e) {
            $conexion->rollBack();
            echo "<script>alert('Error en la transferencia'); window.location.href='inicio.php';</script>";
        }
    } else {
        echo "<script>alert('Cantidad inválida'); window.location.href='inicio.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferir Dinero</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Unity Bank</a>
            <div class="d-flex">
                <a href="inicio.php" class="btn btn-primary">Volver al Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Formulario de Transferencia</h2>
        <form method="POST" action="transferir.php">
            <div class="mb-3">
                <label for="cuentaDestino" class="form-label">Cuenta de Destino</label>
                <input type="text" class="form-control" id="cuentaDestino" name="cuentaDestino" required>
            </div>
            <div class="mb-3">
                <label for="monto" class="form-label">Monto a Transferir</label>
                <input type="number" class="form-control" id="monto" name="monto" min="100" max="<?php echo $saldo; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Realizar Transferencia</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
