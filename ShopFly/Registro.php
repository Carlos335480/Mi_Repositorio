<?php 
require_once 'registrar_usuario.php';
require 'vendor/autoload.php'; // Carga el autoloader de Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado Libre</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to bottom, #0055ff, #9ebeff);
        }

        .container_personalizado {
            max-width: 600px;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        function validarFormulario() {
            let nombre = document.forms["registroForm"]["nombre"].value;
            let rfc = document.forms["registroForm"]["rfc"].value;
            let email = document.forms["registroForm"]["email"].value;
            let clave = document.forms["registroForm"]["clave"].value;
            let clave_2 = document.forms["registroForm"]["clave_2"].value;

            if (nombre === "") {
                swal("Registro", "Por favor, ingresa tu nombre.", "error");
                return false;
            }
            if (rfc === "") {
                swal("Registro", "Por favor, ingresa tu RFC.", "error");
                return false;
            }
            if (email === "") {
                swal("Registro", "Por favor, ingresa tu email.", "error");
                return false;
            }
            if (clave === "") {
                swal("Registro", "Por favor, ingresa tu clave.", "error");
                return false;
            }
            if (clave_2 === "") {
                swal("Registro", "Por favor, verifica tu clave.", "error");
                return false;
            }
            if (clave !== clave_2) {
                swal("Registro", "Las contraseñas no coinciden.", "error");
                return false;
            }

            let formData = new FormData(document.forms["registroForm"]);
            fetch('registrar_usuario.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    swal("Registro", data.message, "success").then(() => {
                        window.location.href = data.redirect; // Redirigir a index.php
                    });
                    document.forms["registroForm"].reset(); // Limpiar el formulario
                } else {
                    swal("Registro", data.message, "error");
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });

            return false; // Prevenir el envío del formulario de forma tradicional
        }
    </script>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <section class="container container_personalizado">
            <form name="registroForm" onsubmit="return validarFormulario()" novalidate>
                <h1 style="text-align:center;" class="Display-1">Crear una Cuenta</h1>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="rfc" class="form-label">RFC</label>
                    <input type="text" class="form-control" name="rfc">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave</label>
                    <input type="password" class="form-control" name="clave">
                    <div id="passwordHelpBlock" class="form-text">
                        Tu contraseña debe contener entre 8-20 caracteres, debe contener letras y números, y no debe
                        contener espacios, caracteres especiales, o emojis.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="clave_2" class="form-label">Verificar la Clave</label>
                    <input type="password" class="form-control" name="clave_2">
                </div>
                <div class="contenedor-boton">
                    <center><button class="btn btn-primary" type="submit">Registrar</button></center>
                </div>
            </form>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

