<!-- Page Content-->
<div class="container px-4 px-lg-5">
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="src/img/areausuario.png"
                alt="Area privada para el usuario." /></div>
        <div class="col-lg-5">
            <?php
                echo "<h1 class='font-weight-light'>Bienvenid@ <code><i>" . $_SESSION['usuario'] . "</i></code>!</h1>";
                ?>
            <p>Esta es tu zona privada, puedes consultar todo lo que necesites.</p>
            <a href="./"><button class="btn btn-dark">Volver al inicio</button></a>
            <!--<a href=""><button class="btn btn-outline-danger">Dar de baja</button></a>-->
        </div>
    </div>

    <br>

    <!-- Derivamos de una vista independiente para mostrar exclusivamente la tabla de reservas. -->
    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : 'mostrarReservasFuturas';

    require_once 'controllers/ReservaController.php';

    $reservaController = new ReservaController();

    switch ($action) {
        case 'mostrarReservasFuturas':
            $reservaController->mostrarReservasFuturas();

        case 'cancelarReserva':
            $reservaController->cancelarReserva();

        echo "<br>";

        case 'mostrarReservasPasadas':
            $reservaController->mostrarReservasPasadas();
        break;

        // agregar otras acciones según sea necesario

        default:
            die('Acción no válida');
        }
    ?>

    <br><br>

</div>
</div>