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
}
?>