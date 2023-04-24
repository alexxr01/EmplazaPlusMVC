<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<!--
  _____                 _ 
 |  __ \               | |
 | |__) |_ _ _ __   ___| |
 |  ___/ _` | '_ \ / _ \ |
 | |  | (_| | | | |  __/ |
 |_|   \__,_|_| |_|\___|_|
                          
-->

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de usuario | Usuarios</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Importacion de iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <!-- Incluimos la barra de navegación superior -->
    <?php include_once('views/BarraNavegacionLogueado.php') ?>

    <?php include_once('views/PanelUsuarioView.php') ?>
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="src/js/scripts.js"></script>
</body>

</html>