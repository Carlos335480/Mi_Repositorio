<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_app_web_pdo"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Conexión fallida: ' . $conn->connect_error]));
}

$nombre = '';
$rfc = '';
$email = '';
$clave = '';
$clave_2 = '';

// Incluir la librería de PHPMailer
require 'vendor/autoload.php'; // Asegúrate de que la ruta a autoload.php sea correcta
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $rfc = isset($_POST['rfc']) ? $_POST['rfc'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : ''; 
    $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
    $clave_2 = isset($_POST['clave_2']) ? $_POST['clave_2'] : '';

    if (empty($nombre) || empty($rfc) || empty($email) || empty($clave) || empty($clave_2)) {
        echo json_encode(['success' => false, 'message' => 'Faltan datos requeridos']);
        exit;
    }

    if ($clave !== $clave_2) {
        echo json_encode(['success' => false, 'message' => 'Las contraseñas no coinciden']);
        exit;
    }

    $query = "INSERT INTO usuario_ml (nombre, rfc, email, clave) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    $stmt->bind_param("ssss", $nombre, $rfc, $email, $clave); // Agregar el correo a los parámetros

    if ($stmt->execute()) {
        // Enviar correo electrónico
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true;
            $mail->Username   = 'cortescabreram506@gmail.com'; // Tu dirección de correo
            $mail->Password   = 'mgfkfatyjhqoptlj'; // Tu contraseña
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port       = 587; 

            // Destinatarios
            $mail->setFrom('no-reply@tu-dominio.com', 'ShopFly');
            $mail->addAddress($email);

            
            $mail->isHTML(true);
            $mail->Subject = "¡Gracias por registrarte en ShopFly!";
            $mail->Body    = '
                <html>
                <head><title>Registro Exitoso</title></head>
                <body>
                    <h2>¡Gracias por registrarte, ' . htmlspecialchars($nombre) . '!</h2>
                    <p>Tu registro ha sido exitoso.</p>
                    <p><strong>RFC:</strong> ' . htmlspecialchars($rfc) . '</p>
                    <p><strong>Email:</strong> ' . htmlspecialchars($email) . '</p>
                </body>
                </html>
            ';
            
            $mail->send();
            
            echo json_encode(['success' => true, 'message' => 'Registro exitoso y correo enviado.', 'redirect' => 'index.php']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Registro exitoso, pero error al enviar el correo: ' . $mail->ErrorInfo]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar: ' . $stmt->error]);
    }

    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>
