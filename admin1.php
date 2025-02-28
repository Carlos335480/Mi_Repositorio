<!DOCTYPE html>
<html>
<head>
    <title>Panel de Administrador</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Tu CSS personalizado -->
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Panel de Administrador</h1>

            <!-- Resumen de Actividad -->
            <div class="alert alert-info">
                <h4>Resumen de Actividad</h4>
                <p>Total de Autos: <!-- Aquí deberías agregar código para contar los autos --></p>
                <p>Total de Usuarios: <!-- Aquí deberías agregar código para contar los usuarios --></p>
                <p>Ventas Recientes: <!-- Aquí deberías agregar código para mostrar ventas recientes --></p>
            </div>

            <!-- Gestión de Autos -->
            <h2>Gestión de Autos</h2>
            <a href="add_auto.php" class="btn btn-primary mb-3">Añadir Nuevo Auto</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí deberías agregar código para listar los autos desde la base de datos -->
                </tbody>
            </table>

            <!-- Gestión de Usuarios -->
            <h2>Gestión de Usuarios</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí deberías agregar código para listar los usuarios desde la base de datos -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

