<?php
session_start();

// Verificamos si existe una sesion para saber si se puede entrar en el panel o no
// o saber si debemos redirigir a la página de logueo.
if(isset($_SESSION['usuario'])) {
    // Si existe, no se hace nada
    header("Location: panel");
}
?>

<!DOCTYPE html>
<html lang="en">

<!--
  _                 _       
 | |               (_)      
 | |     ___   __ _ _ _ __  
 | |    / _ \ / _` | | '_ \ 
 | |___| (_) | (_| | | | | |
 |______\___/ \__, |_|_| |_|
               __/ |        
              |___/         
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Importacion de iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Iniciar sesion - EmplazaPlus</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png" />
</head>

<body>
    <div class="main-content">
        <!-- Incluimos la barra de navegación superior -->
        <?php include_once('views/BarraNavegacionInvitado.php') ?>

        <?php
            $action = isset($_GET['action']) ? $_GET['action'] : 'login';

            require_once 'controllers/CuentaController.php';

            $cuentaController = new CuentaController();

            switch ($action) {
                case 'login':
                $cuentaController->login();
                break;

            // agregar otras acciones según sea necesario

            default:
                die('Acción no válida');
            }
        ?>

    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstraptwilight menu++@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <!-- Core theme JS-->
    <script src="src/js/scripts.js"></script>
    <script src="src/js/validacionformulario.js"></script>
</body>

</html>