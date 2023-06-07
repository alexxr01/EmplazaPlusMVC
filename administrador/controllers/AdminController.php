<?php
require 'AdminFrontController.php';
// Incluye el modelo que corresponde
require 'models/AdminModel.php';

class AdminController {
    private $modelo;

    static function init() {
        FrontController::init();
    }

    public function __construct() {
        // Creamos una instancia de nuestro mini motor de plantillas
        //$this->view = new View();
        // Creamos una instancia de nuestro modelo usuario
        $this->modelo = new AdminModel();
    }

    public function login() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $this->modelo->iniciarsesionAdministrador($_POST['correo']);
  
        if ($usuario && password_verify($_POST['contrasena'], $usuario['contrasena'])) {
          if ($usuario['permisos'] == 'administrador') {
            echo '<script language="javascript">alert("Has iniciado sesión correctamente.");</script>';
            // Redireccionar al principio.
            header("refresh: 0; url='index'"); // Ejecución

            // SESIÓN
            session_start(); // Creamos la sesión
            $_SESSION['admin'] = true; // Creamos una variable de sesión para indicar el rol administrador

            } else {
              echo '<script language="javascript">alert("No eres administrador, no puedes acceder.");</script>';
              header("refresh: 0; url='login'"); // Ejecución
            }
          } else {
            echo '<script language="javascript">alert("Los datos proporcionados no son correctos. Revísalos.");</script>';
            header("refresh: 0; url='login'"); // Ejecución
          }
      } else {
        require 'views/LoginView.php';
      }
  }

  public function reestablecer() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $correo = $this->modelo->reestablecer($_POST);

      if ($correo && password_verify($_POST['contrasenaantigua'], $correo['contrasena'])) {
        echo "<br><center>La contraseña no se ha podido cambiar.<br>Revisa los campos.</center>";
      } else {
        echo "<br><center>Has cambiado tu contraseña correctamente.</center>";
        // Redireccionar al principio.
        header("refresh: 2; url='login.php'"); // Ejecución
      }
    } else {
      require 'views/ReestablecerView.php';
    }
  }

  public function tablaMostrarUsuarios() {
    $usuarios = $this->modelo->tablaMostrarUsuarios();
    require_once 'views/TablaUsuariosView.php';
  }

  public function eliminarUsuario() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Enviamos los datos necesarios
      $this->modelo->eliminarUsuario($_POST);
      // Mostramos un mensaje en caso de salir todo bien
      echo '<script language="javascript">alert("El usuario ha sido eliminado.");</script>';
      // Redirigimos la pantalla donde aparece una lista de los emplazamientos.
      echo '<meta http-equiv="refresh" content="0;url=listausuarios">';
      exit(); // Se detiene la ejecución del script para evitar problemas con los encabezados
    }
  }

  public function editarUsuario() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Enviamos los datos al modelo concretamente a la función registrar
      $this->modelo->editarUsuario($_POST);
      // En caso correcto enviamos un mensaje.
      echo '<script language="javascript">alert("El usuario ha sido actualizado con éxito.");</script>';
      // Redirigimos la pantalla donde aparece una lista de los emplazamientos.
      echo '<meta http-equiv="refresh" content="0;url=listausuarios">';
      exit(); // Se detiene la ejecución del script para evitar problemas con los encabezados
    } else {
      // En caso contrario mostramos de nuevo la vista registro.
      require 'views/EditarUsuarioView.php';
    }
  }

  public function tablaEmplazamientos() {
    $emplazamientos = $this->modelo->tablaEmplazamientos();
    require_once 'views/TablaEmplazamientosView.php';
  }

  public function editarEmplazamiento() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Enviamos los datos al modelo concretamente a la función registrar
      $this->modelo->editarEmplazamiento($_POST);
      // En caso correcto enviamos un mensaje.
      echo '<script language="javascript">alert("Has editado el emplazamiento correctamente.");</script>';
      // Redirigimos la pantalla donde aparece una lista de los emplazamientos.
      echo '<meta http-equiv="refresh" content="0;url=listaemplazamientos">';
      exit(); // Se detiene la ejecución del script para evitar problemas con los encabezados
    } else {
      // En caso contrario mostramos de nuevo la vista registro.
      require 'views/EditarEmplazamientoView.php';
    }
  }

  public function eliminarEmplazamiento() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Enviamos los datos necesarios
      $this->modelo->eliminarEmplazamiento($_POST);
      // Mostramos un mensaje en caso de salir todo bien
      echo '<script language="javascript">alert("Emplazamiento eliminado.");</script>';
      // Redirigimos la pantalla donde aparece una lista de los emplazamientos.
      echo '<meta http-equiv="refresh" content="0;url=listaemplazamientos">';
      exit(); // Se detiene la ejecución del script para evitar problemas con los encabezados
    }
  }

  public function registroEmplazamiento() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Enviamos los datos al modelo concretamente a la función registrar
      $this->modelo->nuevoEmplazamiento($_POST);
      // En caso correcto enviamos un mensaje.
      echo '<script language="javascript">alert("Emplazamiento añadido correctamente");</script>';
      // Volvemos a la pantalla de registro emplazamiento.
      require 'views/RegistrarEmplazamientoView.php';
    } else {
      // En caso contrario mostramos de nuevo la vista registro.
      require 'views/RegistrarEmplazamientoView.php';
    }
  }

  public function mostrarTodasReservas() {
    $reservas = $this->modelo->consultarTotalReservas();
    require_once 'views/TablaReservasView.php';
  }
  
}
?>