<?php
require 'FrontController.php';
// Incluye el modelo que corresponde
require 'models/EmplazamientoModel.php';

class EmplazamientoController {
    private $modelo;

    static function init() {
        FrontController::init();
    }

    public function __construct() {
        // Creamos una instancia de nuestro modelo usuario
        $this->modelo = new EmplazamientoModel();
    }

    public function mostrarEmplazamientos() {
        $emplazamientos = $this->modelo->obtenerEmplazamientos();
        //require_once 'views/TestView.php';
        require_once 'views/EmplazamientoView.php';
    }

    public function detallesEmplazamiento() {
        $emplazamientos = $this->modelo->obtenerDetallesEmplazamiento($_POST['nombreEmplazamiento']);
        require_once 'views/DetallesEmplazamientoView.php';
    }

    public function realizarReserva() {
        
    }

    public function registroEmplazamiento() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Enviamos los datos al modelo concretamente a la función registrar
          $this->modelo->nuevoEmplazamiento($_POST);
          // En caso correcto enviamos un mensaje.
          echo "<br><center>Emplazamiento añadido correctamente.</center><br>";
          // Redireccionar al principio.
          header("refresh: 2; url='index.php'"); // Ejecución
        } else {
          // En caso contrario mostramos de nuevo la vista registro.
          require 'views/RegistrarEmplazamientoView.php';
        }
    }
}
?>