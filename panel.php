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
    <link rel="icon" type="image/x-icon" href="src/img/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Importacion de iconos boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <!-- Incluimos la barra de navegación superior -->
    <?php include_once('views/panelUsuario/BarraNavegacionLogueado.php') ?>

    <?php include_once('views/panelUsuario/PanelUsuarioView.php') ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>

</html>