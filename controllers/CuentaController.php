<?php
require 'FrontController.php';
// Incluye el modelo que corresponde
require 'models/CuentaModel.php';

class CuentaController {
    //private $view;
    private $modelo;

    static function init() {
        FrontController::init();
    }

    public function __construct() {
        // Creamos una instancia de nuestro mini motor de plantillas
        //$this->view = new View();
        // Creamos una instancia de nuestro modelo usuario
        $this->modelo = new CuentaModel();
    }
    
    public function registro() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // Enviamos los datos al modelo concretamente a la función registrar
          $this->modelo->registrar($_POST);
          // En caso correcto enviamos un mensaje.
          echo "<br><center>Te has registrado correctamente.</center><br>";
          echo "<center>Vas a ser redirigido a la página de logueo.</center>";
          // Redireccionar al principio.
          header("refresh: 5; url='login.php'"); // Ejecución
        } else {
          // En caso contrario mostramos de nuevo la vista registro.
          require 'views/RegistroView.php';
        }
    }

    public function login() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $this->modelo->iniciarsesion($_POST['correo']);
  
        if ($usuario && password_verify($_POST['contrasena'], $usuario['contrasena'])) {
          echo "<br><center><b>". $_POST['correo']. "</b>, has iniciado sesión. Por favor, espere...</center>";
          // Redireccionar al principio.
        header("refresh: 3; url='confirmacion.php'"); // Ejecución

        // SESIÓN
        session_start(); // Creamos la sesión
        $_SESSION['usuario'] = $usuario['usuario'];
        $_SESSION['correo'] = $usuario['correo'];

        } else {
          echo "<br><center>Las credenciales son incorrectas.<br>Revisa los campos.</center>";
          header("refresh: 5; url='login.php'"); // Ejecución
        }
      } else {
        require 'views/LoginView.php';
      }
  }

  public function reestablecer() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $usuario = $this->modelo->reestablecer($_POST['correo']);

      if ($usuario && password_verify($_POST['contrasena'], $usuario['contrasena'])) {
        echo "<br><center>Has cambiado tu contraseña correctamente.</center>";
        // Redireccionar al principio.
      header("refresh: 2; url='login.php'"); // Ejecución
      } else {
        echo "<br><center>La contraseña no se ha podido cambiar.<br>Revisa los campos.</center>";
      }
    } else {
      require 'views/ReestablecerView.php';
    }
  }
}
?>