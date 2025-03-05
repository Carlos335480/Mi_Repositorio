<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_app_web_pdo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Conexión fallida: ' . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';

    if (empty($usuario) || empty($clave)) {
        echo json_encode(['success' => false, 'message' => 'Correo o RFC y contraseña son requeridos.']);
        exit;
    }

    // Verificar si el usuario está desactivado
    $query = "SELECT * FROM usuario_ml WHERE (email = ? OR rfc = ?) AND estado != 'desactivado'";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $usuario, $usuario);

    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Error en la preparación de la consulta: ' . $conn->error]);
        exit;
    }

    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        // Autenticación de usuario
        $select = $conn->prepare('SELECT * FROM usuario_ml WHERE (email = ? OR rfc = ?) AND clave = ?');
        $select->bind_param("sss", $usuario, $usuario, $clave);
        $select->execute();
        $campo = $select->get_result()->fetch_assoc();

        if ($campo) {
            session_start();
            $_SESSION['nombre'] = $campo['nombre'];
            $_SESSION['email'] = $campo['email'];
            echo json_encode(['success' => true, 'redirect' => 'sesion_ini.php']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Correo, RFC o contraseña incorrectos.']);
        }

        $select->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario no encontrado o desactivado.']);
    }

    $stmt->close();
}

$conn->close();
?>
