<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #0055ff, #9ebeff);
            color: black;
        }
        .container_personalizado {
            max-width: 600px;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
        <section class="container container_personalizado">
            <form id="loginForm" method="post" onsubmit="return validarLoginFormulario();">
                <h1 style="text-align:center;" class="Display-1">Iniciar Sesión</h1>

                <div id="mensaje"></div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Email o RFC</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required>
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave</label>
                    <input type="password" class="form-control" name="clave" id="clave" required>
                    <div id="passwordHelpBlock" class="form-text">
                        Tu contraseña debe contener entre 8-20 caracteres, debe contener letras y números, y no debe
                        contener espacios, caracteres especiales, o emojis.
                    </div>
                </div>

                <div class="contenedor-boton">
                    <center><button class="btn btn-primary" type="submit" name="login">Login</button></center>
                </div>
            </form>
        </section>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validarLoginFormulario() {
            let formData = new FormData(document.forms["loginForm"]);
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Inicio de Sesión', '¡Bienvenido!', 'success').then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    Swal.fire('Inicio de Sesión', data.message, 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error', 'Error en la conexión', 'error');
                console.error('Error:', error);
            });
            return false;
        }
    </script>
</body>
</html>
