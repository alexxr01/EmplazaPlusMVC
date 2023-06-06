<?php
require 'FrontController.php';
// Incluye el modelo que corresponde
require 'models/ReservaModel.php';

class ReservaController {
    private $modelo;

    static function init() {
        FrontController::init();
    }

    public function __construct() {
        // Creamos una instancia de nuestro modelo usuario
        $this->modelo = new ReservaModel();
    }

    public function mostrarReservasFuturas() {
        $reservas = $this->modelo->consultarReservasFuturas();
        require_once 'views/panelUsuario/TablaReservasFuturasView.php';
    }

    public function mostrarReservasPasadas() {
        $reservas = $this->modelo->consultarReservasPasadas();
        require_once 'views/panelUsuario/TablaReservasPasadasView.php';
    }

    public function realizarReserva() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Enviamos los datos al modelo concretamente a la función registrar
            $reservas = $this->modelo->realizarReserva($_POST);
            // En caso correcto enviamos un mensaje.
            echo "<br><center>La reserva se ha realizado correctamente.</center><br>";
            echo "<center>Te enviaremos al panel de usuario.</center>";
            // Redireccionar al principio.
            header("refresh: 3; url='panel'"); // Ejecución
          } else {
            // En caso contrario mostramos de nuevo la vista registro.
            require_once 'views/PagoView.php';
          }        
    }
}

?>