<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';


// Verificar si las variables de sesión están definidas
if (!isset($_SESSION['color_fondo'])) {
    $_SESSION['color_fondo'] = '#FFFFFF'; // Valor predeterminado
}
if (!isset($_SESSION['color_texto'])) {
    $_SESSION['color_texto'] = '#000000'; // Valor predeterminado
}
if (!isset($_SESSION['nombre_sitio'])) {
    $_SESSION['nombre_sitio'] = 'Mi Sitio'; // Valor predeterminado
}

// Resto del código
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['color_fondo'] = $_POST['color_fondo'];
    $_SESSION['color_texto'] = $_POST['color_texto'];
    $_SESSION['nombre_sitio'] = $_POST['nombre_sitio'];
}
?>

// Aquí puedes agregar la lógica para manejar las configuraciones del sitio

// Creamos un formulario para configurar el sitio
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuraciones</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Configuraciones del Sitio</h2>
        <p>Aquí podrás ajustar las configuraciones del sitio.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="color_fondo">Color de fondo:</label>
                <input type="color" id="color_fondo" name="color_fondo" value="<?php echo $_SESSION['color_fondo']; ?>">
            </div>
            <div class="form-group">
                <label for="color_texto">Color de texto:</label>
                <input type="color" id="color_texto" name="color_texto" value="<?php echo $_SESSION['color_texto']; ?>">
            </div>
            <div class="form-group">
                <label for="nombre_sitio">Nombre del sitio:</label>
                <input type="text" id="nombre_sitio" name="nombre_sitio" value="<?php echo $_SESSION['nombre_sitio']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
</body>
</html>