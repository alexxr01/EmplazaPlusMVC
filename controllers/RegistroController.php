<?php
require 'FrontController.php';
// Incluye el modelo que corresponde
require 'models/UsuarioModel.php';

class RegistroController {
    //private $view;
    private $modelo;

    static function init() {
        FrontController::init();
    }

    public function __construct() {
        // Creamos una instancia de nuestro mini motor de plantillas
        //$this->view = new View();
        // Creamos una instancia de nuestro modelo usuario
        $this->modelo = new UsuarioModel();
    }
    
    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $this->modelo->registrar($_POST);
          echo "El registro se ha realizado con éxito.";
        } else {
          require 'views/RegistroView.php';
        }
      }
}
?>