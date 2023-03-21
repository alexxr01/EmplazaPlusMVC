<?php
require 'FrontController.php';
//Incluye el modelo que corresponde
require 'models/UsuarioModel.php';
class LoginController
{
    static function init()
    {
        FrontController::init();
    }

    public function __construct()
    {
        //Creamos una instancia de nuestro mini motor de plantillas
        $this->$view = new View();
    }
    public function getUsuario($usuario, $plantilla = "LoginView")
    { 
        // Creamos una instancia de nuestro "modelo"
        $usuarioModel = new UsuarioModel();
 
        // Le pedimos al modelo todos los items
        $usuario = $usuarioModel->iniciarsesion($usuario);
 
        // Finalmente presentamos nuestra plantilla
        $this->$view->show($plantilla.".php", $usuario);
    }
}
?>