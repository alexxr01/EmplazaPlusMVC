<?php
require 'FrontController.php';
// Incluye el modelo que corresponde
require 'models/UsuarioModel.php';

class LoginController {

    static function init() {
        FrontController::init();
    }

    protected $view;
    public function __construct() {
        // Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
    public function registrarUsuario($usuario) {
        // Creamos una instancia de nuestro "modelo"
        $usuarioModel = new UsuarioModel();
 
        // Le pedimos al modelo todos los items
        $usuario = $usuarioModel->registrar($usuario);
 
        // Finalmente presentamos nuestra plantilla
        $this->view->show("RegistroView.php", $usuario);
    }
}
?>