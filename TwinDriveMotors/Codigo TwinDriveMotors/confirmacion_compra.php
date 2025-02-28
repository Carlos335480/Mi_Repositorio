<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

$nombre = $_SESSION['nombre'];


if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'] ?? null;

    if ($id) {
        try {
            
            $stmt = $cnnPDO->prepare("SELECT * FROM autos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $auto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($auto) {
               
                $compra_id = uniqid();

                
                $sql = $cnnPDO->prepare("
                    INSERT INTO compra (id, marca, modelo, anio, precio, descripcion, imagen, usuario_id) 
                    VALUES (:id, :marca, :modelo, :anio, :precio, :descripcion, :imagen, :usuario_id)
                ");
                $sql->bindParam(':id', $compra_id);
                $sql->bindParam(':marca', $auto['marca']);
                $sql->bindParam(':modelo', $auto['modelo']);
                $sql->bindParam(':anio', $auto['anio']);
                $sql->bindParam(':precio', $auto['precio']);
                $sql->bindParam(':descripcion', $auto['descripcion']);
                $sql->bindParam(':imagen', $auto['imagen']);
                $sql->bindParam(':usuario_id', $_SESSION['usuario_id']);
                $sql->execute();

                
                $ticket = [
                    'id' => $compra_id,
                    'marca' => $auto['marca'],
                    'modelo' => $auto['modelo'],
                    'anio' => $auto['anio'],
                    'precio' => $auto['precio'],
                    'descripcion' => $auto['descripcion'],
                    'imagen' => $auto['imagen']
                ];

                
                $_SESSION['ticket'] = $ticket;
                header('Location: imprimir_ticket.php');
                exit();
            } else {
                $compra_error = "Auto no encontrado.";
            }
        } catch (PDOException $e) {
            $compra_error = "Error en la inserción: " . $e->getMessage();
        }
    } else {
        $compra_error = "ID de auto no proporcionado.";
    }
} else {
    header('Location: inventario.php');
    exit();
}
?>

