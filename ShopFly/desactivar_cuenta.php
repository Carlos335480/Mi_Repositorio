<?php
session_start();

// Depurar la sesión para verificar el contenido
var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'desactivar') {
   // Verificar si el email está en la sesión
   if (isset($_SESSION['email'])) {
       $email = $_SESSION['email']; 
       // Conexión a la base de datos
       include 'db_conexion.php';

       if ($email) {
          // Desactivar la cuenta del usuario en la base de datos usando el email
          $query = "UPDATE usuario_ml SET estado = 'desactivado' WHERE email = ?";
          $stmt = $conexion->prepare($query);

          // Ejecutar la consulta
          if ($stmt->execute([$email])) {
             // Cerrar sesión
             session_destroy();

             // Redirigir al login con un mensaje de éxito
             header('Location: inicio_se.php?mensaje=cuenta_desactivada');
             exit;
          } else {
             // Si ocurre un error, mostrar un mensaje de error
             echo "Error al desactivar la cuenta.";
          }
       }
   } else {
       echo "No se pudo obtener el email del usuario de la sesión.";
   }
}
?>
