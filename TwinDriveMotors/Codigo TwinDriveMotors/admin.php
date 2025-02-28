<?php
session_start(); // Iniciar la sesión
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';// Asegúrate de que el archivo de conexión esté correcto

// Verificar si el usuario está autenticado


// Obtener la lista de autos
try {
    $stmt = $cnnPDO->query("SELECT * FROM cars");
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana de Administrador</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Administrador</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Gestión de Autos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reportes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Configuración</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Bienvenido, Admin</div>
            <div class="card-body">
                <h5 class="card-title">Gestión de Autos</h5>
                <p class="card-text">Aquí puedes agregar, editar y eliminar autos.</p>

                <!-- Formulario para agregar y editar autos -->
                <form action="crud.php" method="POST" id="car-form">
                    <input type="hidden" name="car_id" id="car_id" value="">
                    <div class="form-group">
                        <label for="car_name">Nombre del Auto</label>
                        <input type="text" class="form-control" id="car_name" name="car_name" required>
                    </div>
                    <div class="form-group">
                        <label for="car_model">Modelo del Auto</label>
                        <input type="text" class="form-control" id="car_model" name="car_model" required>
                    </div>
                    <div class="form-group">
                        <label for="car_price">Precio del Auto</label>
                        <input type="number" class="form-control" id="car_price" name="car_price" required>
                    </div>
                    <button type="submit" name="save_car" class="btn btn-success">Guardar Auto</button>
                </form>

                <!-- Listado de autos -->
                <div class="mt-5">
                    <h5>Listado de Autos</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Modelo</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['id']); ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['model']); ?></td>
                                <td><?php echo htmlspecialchars($row['price']); ?></td>
                                <td>
                                    <a href="crud.php?edit=<?php echo $row['id']; ?>" class="btn btn-secondary">Editar</a>
                                    <a href="crud.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
