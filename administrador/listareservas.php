<?php
/*
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
*/
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
                    <h1 class="mt-4">Lista de reservas realizadas</h1>
                    <ol class="breadcrumb mb-4">En esta sección podrás ver toda la lista de reservas realizadas por
                        todos los usuarios dados de alta en el sistema.</ol>

                    <div class="col-3">
                        <input type="text" class="form-control" id="filtro" placeholder="Buscar por nombre">
                    </div>


                    <!-- Tabla con la lista de usuarios -->
                    <?php
                    $action = isset($_GET['action']) ? $_GET['action'] : 'tablaMostrarUsuarios';
                    // Requimos el controlador para poder comenzar a llamar a todas las acciones
                    require_once ('controllers/AdminController.php');
                    // Creamos un objeto del controlador para llamarlo posteriormente.
                    $adminController = new AdminController();
                    // Realizamos un switch en el cual solo llamaremos a la opción 'registro'.
                    switch ($action) {
                        case 'tablaMostrarUsuarios':
                        // Llamamos a la función registro que se ubica en el controlador.
                        $adminController->mostrarTodasReservas();
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

    <!-- Script que permite filtrar por nombres en la tabla -->
    <script>
    document.getElementById("filtro").addEventListener("input", function() {
        var filtro = this.value.toLowerCase();
        var filas = document.getElementById("tablaReservas").getElementsByTagName("tr");

        for (var i = 0; i < filas.length; i++) {
            var nombre = filas[i].getElementsByTagName("td")[1];
            if (nombre) {
                var contenido = nombre.innerHTML.toLowerCase();
                if (contenido.indexOf(filtro) > -1) {
                    filas[i].style.display = "";
                } else {
                    filas[i].style.display = "none";
                }
            }
        }
    });
    </script>
</body>

</html>