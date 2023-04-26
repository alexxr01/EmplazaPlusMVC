<?php
session_start();

// Verificamos si existe una sesion para saber si se puede entrar en el panel o no
// o saber si debemos redirigir a la página de logueo.
if(isset($_SESSION['usuario'])==false) {
    // Si existe, no se hace nada
    header("Location: login");
}

// Verifica si se hizo clic en el enlace "Cerrar sesión".
if(isset($_GET['cerrar_sesion'])) {
    // Destruye la sesión actual.
    session_destroy();
    // Redirige al usuario a la página de inicio de sesión.
    header("Location: index");
}
?>

<!DOCTYPE html>
<html lang="es">

<!-- 
  ____                       
 |  _  \__ _  __ _  ___  ___ 
 | |_) / _` |/ _` |/ _ \/ __|
 |  __/ (_| | (_| | (_) \__ \
 |_|   \__,_|\__, |\___/|___/
             |___/           
 -->

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Pago - EmplazaPlus</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png" />
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <!-- Importacion de iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body className='snippet-body'>
    <!-- Incluimos la barra de navegación superior -->
    <?php include_once('views/panelUsuario/BarraNavegacionLogueado.php') ?>

    <?php
            // 
            $action = isset($_GET['action']) ? $_GET['action'] : 'realizarReserva';
            // Requimos el controlador para poder comenzar a llamar a todas las acciones
            require_once 'controllers/ReservaController.php';
            // Creamos un objeto del controlador para llamarlo posteriormente.
            $reservaController = new ReservaController();
            // Realizamos un switch en el cual solo llamaremos a la opción 'registro'.
            switch ($action) {
                case 'realizarReserva':
                    // Llamamos a la función registro que se ubica en el controlador.
                    $reservaController->realizarReserva();
                break;

            // Agregamos mas acciones si es necesario. En este caso no.

            // La opción por defecto será la siguiente:
            default:
            die('La acción no se ha podido llamar correctamente. Hay que revisar.');
            }
        ?>

    <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

</body>

</html>