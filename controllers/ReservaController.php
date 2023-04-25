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

    public function mostrarReservasRealizadas() {
        /*
        if (isset($_POST['usuario'])) {
            
        } else {
            echo "La tabla reservas no se ha podido mostrar correctamente.";
        } */

        $reservas = $this->modelo->consultarReservas();
        require_once 'views/panelUsuario/TablaReservasView.php';
        
    }
}

?>