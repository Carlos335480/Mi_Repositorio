<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Auto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Admin Panel</a>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage_cars.php">Gestionar Autos</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <h1>Editar Auto</h1>
  <form action="edit_car.php" method="POST">
    <input type="hidden" name="id" value="1">
    <div class="form-group">
      <label for="brand">Marca</label>
      <input type="text" class="form-control" id="brand" name="brand" value="Toyota" required>
    </div>
    <div class="form-group">
      <label for="model">Modelo</label>
      <input type="text" class="form-control" id="model" name="model" value="Corolla" required>
    </div>
    <div class="form-group">
      <label for="year">Año</label>
      <input type="number" class="form-control" id="year" name="year" value="2020" required>
    </div>
    <div class="form-group">
      <label for="price">Precio</label>
      <input type="number" class="form-control" id="price" name="price" value="20000" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
