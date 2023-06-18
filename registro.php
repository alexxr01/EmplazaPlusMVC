<?php
session_start();

// Verificamos si existe una sesion para saber si se puede entrar en el panel o no
// o saber si debemos redirigir a la página de logueo.
if(isset($_SESSION['usuario']) == true) {
    // Enviamos un mensaje de alerta
    echo '<script language="javascript">alert("Ya tienes una sesión iniciada, no puedes registrarte.");</script>';
    // Si existe, no se hace nada
    echo '<meta http-equiv="refresh" content="0;url=panel">';
}
?>

<!DOCTYPE html>
<html lang="en">

<!--
  _____            _     _             
 |  __ \          (_)   | |            
 | |__) |___  __ _ _ ___| |_ _ __ ___  
 |  _  // _ \/ _` | / __| __| '__/ _ \ 
 | | \ \  __/ (_| | \__ \ |_| | | (_) |
 |_|  \_\___|\__, |_|___/\__|_|  \___/ 
              __/ |                    
             |___/                     
-->

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Importacion de iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Registro - EmplazaPlus</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png" />
</head>
<body>
    <div class="main-content">
        <!-- Incluimos la barra de navegación superior -->
        <?php include_once('views/BarraNavegacionInvitado.php') ?>

        <?php
            // 
            $action = isset($_GET['action']) ? $_GET['action'] : 'registro';
            // Requimos el controlador para poder comenzar a llamar a todas las acciones
            require_once 'controllers/CuentaController.php';
            // Creamos un objeto del controlador para llamarlo posteriormente.
            $cuentaController = new CuentaController();
            // Realizamos un switch en el cual solo llamaremos a la opción 'registro'.
            switch ($action) {
                case 'registro':
                    // Llamamos a la función registro que se ubica en el controlador.
                    $cuentaController->registro();
                break;

            // Agregamos mas acciones si es necesario. En este caso no.

            // La opción por defecto será la siguiente:
            default:
            die('La acción no se ha podido llamar correctamente. Hay que revisar.');
            }
        ?>

    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstraptwilight menu++@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="src/js/scripts.js"></script>
    <script src="src/js/validacionformulario.js"></script>
</body>
</html>