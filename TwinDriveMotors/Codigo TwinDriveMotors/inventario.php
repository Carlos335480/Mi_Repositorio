<?php
session_start();
require_once 'C:\xampp\htdocs\codigosphp\codigosphp\crud\db_conexion.php';

if (!isset($_SESSION['nombre']) || !isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

$nombre = $_SESSION['nombre'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'comprar') {
    $id = $_POST['id'] ?? null;
    $tarjeta = $_POST['numero_tarjeta'] ?? '';

    if ($id && $tarjeta) {
        try {
           
            $_SESSION['tarjeta'] = [
                'numero_tarjeta' => $tarjeta,
            ];

            
            $stmt = $cnnPDO->prepare("SELECT * FROM autos WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $auto = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($auto) {
                
                $compra_id = uniqid();

                
                $sql = $cnnPDO->prepare("
                    INSERT INTO compra (id, marca, modelo, anio, precio, descripcion, imagen, usuario_id, tarjeta) 
                    VALUES (:id, :marca, :modelo, :anio, :precio, :descripcion, :imagen, :usuario_id, :tarjeta)
                ");
                $sql->bindParam(':id', $compra_id);
                $sql->bindParam(':marca', $auto['marca']);
                $sql->bindParam(':modelo', $auto['modelo']);
                $sql->bindParam(':anio', $auto['anio']);
                $sql->bindParam(':precio', $auto['precio']);
                $sql->bindParam(':descripcion', $auto['descripcion']);
                $sql->bindParam(':imagen', $auto['imagen']);
                $sql->bindParam(':usuario_id', $_SESSION['usuario_id']);
                $sql->bindParam(':tarjeta', $tarjeta);
                $sql->execute();

                // Guardar los datos del ticket en la sesión
                $_SESSION['ticket'] = [
                    'id' => $compra_id,
                    'marca' => $auto['marca'],
                    'modelo' => $auto['modelo'],
                    'anio' => $auto['anio'],
                    'precio' => $auto['precio'],
                    'descripcion' => $auto['descripcion'],
                    'tarjeta' => $tarjeta,
                    'imagen' => $auto['imagen']
                ];

                
                header('Location: imprimir_ticket.php');
                exit();
            }
        } catch (PDOException $e) {
            $compra_error = "Error en la inserción: " . $e->getMessage();
        }
    }
}


$marca = isset($_GET['marca']) ? $_GET['marca'] : '';
$sql = "SELECT * FROM autos WHERE marca LIKE :marca";
$stmt = $cnnPDO->prepare($sql);
$stmt->bindValue(':marca', '%' . $marca . '%');
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .card {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        .card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .info {
            opacity: 1;
        }

        body {
            font-family: Arial, sans-serif;
            color: #fff;
            background-color: #000;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
        }

        .navbar-img {
            max-width: 50px;
            max-height: 50px;
        }

        .navbar a {
            color: #f2f2f2;
            text-align: center;
            padding: 8px 12px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .navbar .btn-link {
            color: #f2f2f2;
            text-align: center;
            padding: 8px 12px;
            text-decoration: none;
            border: none;
            background: none;
            font-size: 1rem;
        }

        .navbar .btn-link:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar-custom {
            background-color: black;
        }

        @media (max-width: 992px) {
            .navbar-nav .nav-item {
                text-align: center;
            }
        }
        main {
            padding: 2rem;
        }

        h1 {
            text-align: center;
        }

        .intro {
            margin-bottom: 2rem;
        }

        .services {
            text-align: center;
        }

        .service-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .service-item {
            background-color: #333;
            border-radius: 8px;
            padding: 1rem;
            width: 300px;
        }

        .service-item img {
            width: 100%;
            border-radius: 8px;
        }

        .container {
            padding: 2rem;
        }

        .card {
            background-color: #333;
            color: #fff;
        }

        .card img {
            border-radius: 8px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <span class="navbar-brand"><img class="navbar-img" src="image/foto inicio s2.png" alt="User Image"></span>
            <span class="navbar-brand" style="color:white;"><?php echo htmlspecialchars($nombre); ?></span>
            <a class="navbar-brand" href="sesion_compra.php">Inicio</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="inventario.php">Inventario</a></li>
                <li class="nav-item"><a class="nav-link" href="Servicios.php">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="Financiamiento.php">Financiamiento</a></li>
                <li class="nav-item"><a class="nav-link" href="Nosotros.php">Nosotros</a></li>
                <li class="nav-item"><a class="nav-link" href="Contacto.php">Contacto</a></li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="log out.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <h1>Inventario de Autos</h1>
    
    <div class="container mb-4">
        <form action="inventario.php" method="get" class="d-flex justify-content-center">
            <input type="text" name="marca" class="form-control me-2" placeholder="Buscar por marca" value="<?php echo htmlspecialchars($marca); ?>">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            <?php
            if (count($result) > 0) {
                foreach ($result as $row) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card" data-bs-toggle="modal" data-bs-target="#carModal' . $row["id"] . '">';
                    echo '<img src="' . $row["imagen"] . '" class="card-img-top" alt="' . $row["modelo"] . '">';
                    echo '<div class="info">';
                    echo '<h2>' . $row["marca"] . ' ' . $row["modelo"] . '</h2>';
                    echo '<p>Año: ' . $row["anio"] . '</p>';
                    echo '<p>Precio: $' . $row["precio"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    // Modal para cada auto con formulario
                    echo '<div class="modal fade" id="carModal' . $row["id"] . '" tabindex="-1" aria-labelledby="carModalLabel" aria-hidden="true">';
                    echo '<div class="modal-dialog">';
                    echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                    echo '<h5 class="modal-title" id="carModalLabel" style="color:black">' . $row["marca"] . ' ' . $row["modelo"] . '</h5>';
                    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                    echo '<img src="' . $row["imagen"] . '" class="img-fluid" alt="' . $row["modelo"] . '">';
                    echo '<p style="color:black">Año: ' . $row["anio"] . '</p>';
                    echo '<p style="color:black">Precio: $' . $row["precio"] . '</p>';
                    echo '<p style="color:black">Descripción: ' . $row["descripcion"] . '</p>';

                    // Formulario para tarjeta de crédito
                    echo '<form method="post" action="inventario.php">';
                    echo '<input type="hidden" name="accion" value="comprar">';
                    echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                    echo '<div class="mb-3">';
                    echo '<label for="numero_tarjeta" class="form-label" style="color:black">Número de Tarjeta:</label>';
                    echo '<input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" required>';
                    echo '</div>';
                    echo '<div class="mb-3">';
                    echo '<label for="cvv" class="form-label" style="color:black">CVV:</label>';
                    echo '<input type="text" class="form-control" id="cvv" name="cvv" required>';
                    echo '</div>';
                    echo '<button type="submit" class="btn btn-primary">Comprar</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No se encontraron autos.</p>';
            }
            ?>
        </div>
    </div>
</main>
</body>
</html>