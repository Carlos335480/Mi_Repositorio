<?php

session_start();

if (!isset($_SESSION['correo'])) {
    die("Error: No se pudo obtener el email del usuario de la sesión.");
}
$correo = $_SESSION['correo']; 
var_dump($correo);
include 'db_conexion.php';
if (!$conexion) {
    die("Error de conexión a la base de datos.");
}
$query = "UPDATE usuarios SET estado = 0 WHERE correo = ?";
$stmt = $conexion->prepare($query);

if ($stmt->execute([$correo])) {
    session_destroy();

    header('Location: sesion_inicio.php?mensaje=cuenta_desactivada');
    exit;
} else {
    var_dump($stmt->errorInfo());
    die("Error al desactivar la cuenta.");
}

?>
