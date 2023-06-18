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
          } else {
            // En caso contrario mostramos de nuevo la vista registro.
            require_once 'views/PagoView.php';
          }        
    }

    public function cancelarReserva() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          try {
            // Enviamos los datos necesarios
            $this->modelo->cancelarReserva($_POST);
            // Mostramos un mensaje en caso de salir todo bien
            echo '<center><b>La reserva se ha cancelado correctamente.</b></center>';
            echo '<center>El importe será reembolsado en el método de pago que usaste.</center>';
            // Redirigimos la pantalla donde aparece una lista de los emplazamientos.
            echo '<meta http-equiv="refresh" content="5;url=panel">';
            exit(); // Se detiene la ejecución del script para evitar problemas con los encabezados
          } catch (PDOException $e) {
            echo '<script language="javascript">alert("Ocurre un error al eliminar la reserva.");</script>';
            // Redirigimos la pantalla donde aparece una lista de los emplazamientos.
            echo '<meta http-equiv="refresh" content="0;url=panel">';
          }
        }
      }
}

?>