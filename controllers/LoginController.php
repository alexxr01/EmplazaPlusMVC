<?php
require 'FrontController.php';
// Incluye el modelo que corresponde
require 'models/UsuarioModel.php';

class LoginController {
    private $view;

    static function init() {
        FrontController::init();
    }

    public function __construct() {
        // Creamos una instancia de nuestro mini motor de plantillas
        $this->view = new View();
    }
    public function getUsuario($usuario, $contrasena) { 
        // Creamos una instancia de nuestro "modelo"
        $usuarioModel = new UsuarioModel();
 
        // Le pedimos al modelo todos los items
        $usuario = $usuarioModel->iniciarsesion($usuario, $contrasena);
 
        // Finalmente presentamos nuestra plantilla
        $this->view->show("LoginView.php", $usuario);
    }
}
?>