<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $id = $_POST['id'] ?? null;
    $nuevo_id = $_POST['nuevo_id'] ?? null;
    $nombre = $_POST['nombre'] ?? null;
    $email = $_POST['email'] ?? null;

    if ($accion == 'editar' && $id && $nuevo_id && $nombre && $email) {
        $sql = $cnnPDO->prepare("UPDATE usuarios SET id = :nuevo_id, nombre = :nombre, email = :email WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':nuevo_id', $nuevo_id);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':email', $email);
        $sql->execute();
    } elseif ($accion == 'eliminar' && $id) {
        $sql = $cnnPDO->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
    }
}

$usuarios = $cnnPDO->query("SELECT * FROM usuarios")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 20px;
        }
        .container {
            max-width: 900px;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        h2 {
            color: #FFD700;
        }
        .form-control, .btn {
            background-color: #000;
            color: #fff;
            border: 1px solid #fff;
        }
        .table {
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
        .btn-primary, .btn-secondary, .btn-warning, .btn-danger {
            border-color: #fff;
        }
        .btn-warning {
            background-color: #FFD700;
            color: #000;
        }
        .btn-danger {
            background-color: #FF6347;
        }
        .btn-primary:hover, .btn-secondary:hover, .btn-warning:hover, .btn-danger:hover {
            background-color: #fff;
            color: #000;
        }
        a.btn-secondary {
            display: inline-block;
            margin-top: 20px;
            background-color: #555;
            color: #fff;
            border: 1px solid #fff;
        }
        a.btn-secondary:hover {
            background-color: #777;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Gestión de Usuarios</h2>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($usuario['id']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                        <td>
                            <form action="usuarios.php" method="post" class="d-inline">
                                <input type="hidden" name="accion" value="editar">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
                                <input type="number" name="nuevo_id" value="<?php echo htmlspecialchars($usuario['id']); ?>" class="form-control mr-2 mb-2" required>
                                <input type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" class="form-control mr-2 mb-2" required>
                                <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" class="form-control mr-2 mb-2" required>
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                            <form action="usuarios.php" method="post" class="d-inline">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($usuario['id']); ?>">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="inicio_admin.php" class="btn btn-secondary">Regresar</a>
    </div>
</body>
</html>
