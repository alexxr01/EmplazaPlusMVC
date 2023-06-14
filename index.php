<!DOCTYPE html>
<html lang="en">

<!--
  _____       _      _       
 |_   _|     (_)    (_)      
   | |  _ __  _  ___ _  ___  
   | | | '_ \| |/ __| |/ _ \ 
  _| |_| | | | | (__| | (_) |
 |_____|_| |_|_|\___|_|\___/ 
 
-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Importacion de iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Inicio - EmplazaPlus</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png" />


    <!-- TODO RELACIONADO CON EL DATAPICKER A LA HORA DE VER DETALLES DEL EMPLAZAMIENTO -->
    <!--Agrega estilos -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Datapicker jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Archivo JS del DatePicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Idioma del DatePicker -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js">
    </script>
</head>

<body>
    <!--
    <div class="main-content">
        <!-- Incluimos la barra de navegación superior -->
    <?php include_once('views/BarraNavegacionInvitado.php') ?>

    <?php
            $action = isset($_GET['action']) ? $_GET['action'] : 'mostrarEmplazamientos';

            require_once 'controllers/EmplazamientoController.php';

            $emplazamientoController = new EmplazamientoController();

            switch ($action) {
                case 'mostrarEmplazamientos':
                    $emplazamientoController->mostrarEmplazamientos();
                    break;

                case 'detalles':
                    $emplazamientoController->detallesEmplazamiento();
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
    <!-- Necesario para elegir la fecha de reserva -->
    <script>
    // Inicializa el DatePicker al cargar la página
    $(document).ready(function() {
        $('#seleccionarFechaReserva').datepicker({
            format: 'yyyy/mm/dd',
            language: 'es',
            autoclose: true
        });
    });
    </script>
    <!-- Obtener la fecha de la casilla -->
    <script>
    function obtenerFechaHoraReserva() {
        var fechaReserva = document.getElementById("seleccionarFechaReserva").value;
        var horaReserva = document.getElementById("seleccionarHoraReserva").value;
        var enlacePago = document.querySelector("a[href^='pago']");
        enlacePago.href += encodeURIComponent(fechaReserva + " " + horaReserva);
    }
    </script>
</body>

</html>