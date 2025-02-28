<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet">
    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
            radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
            background-attachment: fixed; /* Parallax effect */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        } 
        #radius-shape-1 {
            position: absolute;
            height: 400px;
            width: 400px;
            top: 10%;
            left: 10%;
            background: radial-gradient(circle, rgba(144,0,255,1) 0%, rgba(119,30,230,0.8) 60%, transparent 100%);
            border-radius: 50%;
            filter: blur(80px);
        }
        #radius-shape-2 {
            position: absolute;
            height: 350px;
            width: 350px;
            bottom: 10%;
            right: 10%;
            background: radial-gradient(circle, rgba(144,0,255,1) 0%, rgba(119,30,230,0.8) 60%, transparent 100%);
            border-radius: 50%;
            filter: blur(80px);
        }
        .bg-glass {
            background-color: transparent !important;
            backdrop-filter: none;
        }
        .container {
            position: relative;
            z-index: 2; /* Ensures the content appears above the background */
        }
    </style>
</head>
<body class="background-radial-gradient d-flex align-items-center justify-content-center min-vh-100">

    <div id="radius-shape-1"></div>
    <div id="radius-shape-2"></div>

    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-6 bg-glass p-4 rounded text-center">
                <h1 class="my-5 display-5 fw-bold ls-tight animate__animated animate__rotateIn" style="color: hsl(218, 81%, 95%)">
                    ¡Bienvenido a UNITY BANK! <br />
                    <span class="animate__animated animate__rotateIn" style="color: hsl(218, 81%, 75%)"> Tu socio financiero</span>
                </h1>
                <p class="mb-4 opacity-70 animate__animated animate__rotateIn" style="color: hsl(218, 81%, 85%)">
                    En Unity Bank, trabajamos contigo para construir un futuro sólido. Ofrecemos soluciones financieras personalizadas, seguras y confiables para alcanzar tus metas con confianza. ¡Unidos por tus sueños!
                </p>
                <div class="d-flex justify-content-center gap-3 animate__animated animate__rotateIn">
                    <a href="sesion_inicio.php">
                        <button class="btn btn-primary mt-4">Iniciar Sesión</button>
                    </a>
                    <a href="Registro.php">
                        <button class="btn btn-primary mt-4">Registrarse</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
</body>
</html>
