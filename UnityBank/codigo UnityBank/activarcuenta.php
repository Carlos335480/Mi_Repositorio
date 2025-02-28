<?php
require_once 'db_conexion.php';

session_start();

var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'desactivar') {
   // Verificar si el email está en la sesión
   if (isset($_SESSION['email'])) {
       $email = $_SESSION['email'];
       if ($email) {
          // Desactivar la cuenta del usuario en la base de datos usando el email
          $query = "UPDATE usuarios SET estado = '1' WHERE email OR numcuenta = ?";
          $stmt = $conexion->prepare($query);

          // Ejecutar la consulta
          if ($stmt->execute([$email])) {
             // Redirigir al login con un mensaje de éxito
             header('Location: sesion_inicio.php?mensaje=cuenta_desactivada');
             exit;
          } else {
             echo "Error al desactivar la cuenta.";
          }
       }
   } else {
       echo "No se pudo obtener el email del usuario de la sesión.";
   }
}
?>