<?php
session_start();

// Verifica si el usuario ha iniciado sesión como administrador
if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
  // El usuario es un administrador, muestra el contenido del panel de administrador
  echo 'Panel administrador';
} else {
  // El usuario no ha iniciado sesión como administrador, redirige a la página de inicio de sesión
  header('Location: login.php');
  exit();
}

// Verifica si se hizo clic en el enlace "Cerrar sesión".
if(isset($_GET['cerrar_sesion'])) {
    // Destruye la sesión actual.
    session_destroy();
    // Redirige al usuario a la página de inicio de sesión.
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">

<!--
     _       _           _       
    / \   __| |_ __ ___ (_)_ __  
   / _ \ / _` | '_ ` _ \| | '_ \ 
  / ___ \ (_| | | | | | | | | | |
 /_/   \_\__,_|_| |_| |_|_|_| |_|

-->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../src/img/favicon.png" />
    <title>Administrator | EmplazaPlus</title>
    <!-- Estilos -->
    <link href="src/css/styles.css" rel="stylesheet" />
    <!-- Scripts -->
    <!--<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>-->
    <script src="https://kit.fontawesome.com/521bf47599.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Incluimos la barra de navegación superior -->
    <?php include_once('views/BarraNavegacionAdmin.php') ?>

    <div id="layoutSidenav">

        <!-- Importamos la barra de navegación izquierda -->
        <?php include_once('views/BarraNavegacionIzquierda.php') ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Lista de emplazamientos</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Aquí se mostrará una lista con todos los emplazamientos
                            registrados
                            en el sistema y disponible al público.</li>
                    </ol>

                    <!-- Tabla con la lista de usuarios -->
                    <?php
                    $action = isset($_GET['action']) ? $_GET['action'] : 'listarEmplazamientos';
                    // Requimos el controlador para poder comenzar a llamar a todas las acciones
                    require_once 'controllers/AdminController.php';
                    // Creamos un objeto del controlador para llamarlo posteriormente.
                    $adminController = new AdminController();
                    // Realizamos un switch en el cual solo llamaremos a la opción 'registro'.
                    switch ($action) {
                        case 'listarEmplazamientos':
                            // Llamamos a la función registro que se ubica en el controlador.
                            $adminController->tablaEmplazamientos();

                        case 'eliminarEmplazamiento':
                            $adminController->eliminarEmplazamiento();
                    break;

                    // Agregamos mas acciones si es necesario. En este caso no.

                    // La opción por defecto será la siguiente:
                    default:
                    die('La acción no se ha podido llamar correctamente. Hay que revisar.');
                    }
                    ?>

                </div>
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="src/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="src/js/datatables-simple-demo.js"></script>
</body>

</html>