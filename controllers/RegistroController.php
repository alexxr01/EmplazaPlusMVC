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
          // Enviamos los datos al modelo concretamente a la función registrar
          $this->modelo->registrar($_POST);
          // En caso correcto enviamos un mensaje.
          echo "El registro se ha realizado con éxito.";
        } else {
          // En caso contrario mostramos de nuevo la vista registro.
          require 'views/RegistroView.php';
        }
      }
}
?>