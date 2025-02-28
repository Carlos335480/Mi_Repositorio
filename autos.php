<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    $id = $_POST['id'] ?? null;
    $marca = $_POST['marca'] ?? null;
    $modelo = $_POST['modelo'] ?? null;
    $anio = $_POST['anio'] ?? null;
    $precio = $_POST['precio'] ?? null;
    $descripcion = $_POST['descripcion'] ?? null;
    $imagen = $_POST['imagen'] ?? null;

    if ($accion == 'agregar' && $id && $marca && $modelo && $anio && $precio) {
        $sql = $cnnPDO->prepare("INSERT INTO autos (id, marca, modelo, anio, precio, descripcion, imagen) VALUES (:id, :marca, :modelo, :anio, :precio, :descripcion, :imagen)");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':marca', $marca);
        $sql->bindParam(':modelo', $modelo);
        $sql->bindParam(':anio', $anio);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->bindParam(':imagen', $imagen);
        $sql->execute();
    } elseif ($accion == 'editar' && $id && $marca && $modelo && $anio && $precio) {
        $sql = $cnnPDO->prepare("UPDATE autos SET marca = :marca, modelo = :modelo, anio = :anio, precio = :precio, descripcion = :descripcion, imagen = :imagen WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->bindParam(':marca', $marca);
        $sql->bindParam(':modelo', $modelo);
        $sql->bindParam(':anio', $anio);
        $sql->bindParam(':precio', $precio);
        $sql->bindParam(':descripcion', $descripcion);
        $sql->bindParam(':imagen', $imagen);
        $sql->execute();
    } elseif ($accion == 'eliminar' && $id) {
        $sql = $cnnPDO->prepare("DELETE FROM autos WHERE id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
    }
}

$autos = $cnnPDO->query("SELECT * FROM autos")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Autos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 20px;
        }
        .container {
            max-width: 1000px;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        h2 {
            color: #FFD700;
        }
        .form-control, .btn {
            background-color: #fff;
            color: #000;
            border: 1px solid #fff;
        }
        .table {
            margin-top: 20px;
            color: #fff;
            background-color: #333;
        }
        .table th, .table td {
            border: 1px solid #000;
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
        <h2>Gestión de Autos</h2>
        <form action="autos.php" method="post" class="form-inline mb-3">
            <input type="hidden" name="accion" value="agregar">
            <input type="number" name="id" placeholder="ID" class="form-control mr-2 mb-2" required>
            <input type="text" name="marca" placeholder="Marca" class="form-control mr-2 mb-2" required>
            <input type="text" name="modelo" placeholder="Modelo" class="form-control mr-2 mb-2" required>
            <input type="number" name="anio" placeholder="Año" class="form-control mr-2 mb-2" required>
            <input type="number" step="0.01" name="precio" placeholder="Precio" class="form-control mr-2 mb-2" required>
            <input type="text" name="descripcion" placeholder="Descripción" class="form-control mr-2 mb-2">
            <input type="text" name="imagen" placeholder="URL de la Imagen" class="form-control mr-2 mb-2">
            <button type="submit" class="btn btn-primary mb-2">Agregar</button>
        </form>
        <a href="inicio_admin.php" class="btn btn-secondary mb-3">Regresar</a>
        <table class="table table-dark table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Año</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($autos as $auto): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($auto['id']); ?></td>
                        <td><?php echo htmlspecialchars($auto['marca']); ?></td>
                        <td><?php echo htmlspecialchars($auto['modelo']); ?></td>
                        <td><?php echo htmlspecialchars($auto['anio']); ?></td>
                        <td>$<?php echo number_format($auto['precio'], 2); ?></td>
                        <td><?php echo htmlspecialchars($auto['descripcion']); ?></td>
                        <td><img src="<?php echo htmlspecialchars($auto['imagen']); ?>" alt="Imagen de Auto" width="100"></td>
                        <td>
                            <form action="autos.php" method="post" class="d-inline">
                                <input type="hidden" name="accion" value="editar">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($auto['id']); ?>">
                                <input type="text" name="marca" value="<?php echo htmlspecialchars($auto['marca']); ?>" class="form-control mr-2 mb-2" required>
                                <input type="text" name="modelo" value="<?php echo htmlspecialchars($auto['modelo']); ?>" class="form-control mr-2 mb-2" required>
                                <input type="number" name="anio" value="<?php echo htmlspecialchars($auto['anio']); ?>" class="form-control mr-2 mb-2" required>
                                <input type="number" step="0.01" name="precio" value="<?php echo htmlspecialchars($auto['precio']); ?>" class="form-control mr-2 mb-2" required>
                                <input type="text" name="descripcion" value="<?php echo htmlspecialchars($auto['descripcion']); ?>" class="form-control mr-2 mb-2">
                                <input type="text" name="imagen" value="<?php echo htmlspecialchars($auto['imagen']); ?>" class="form-control mr-2 mb-2">
                                <button type="submit" class="btn btn-warning mb-2">Editar</button>
                            </form>
                            <form action="autos.php" method="post" class="d-inline">
                                <input type="hidden" name="accion" value="eliminar">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($auto['id']); ?>">
                                <button type="submit" class="btn btn-danger mb-2">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
