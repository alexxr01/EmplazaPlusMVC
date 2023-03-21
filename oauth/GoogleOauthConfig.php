<?php
// Google API PHP Library includes
require_once 'vendor/autoload.php';
require_once 'config.php';

class GoogleOauthConfig {
  private $client_id;
  private $client_secret;
  private $redirect_uri;
  private $client;
  private $obj_res;
  private $google_auth_url;
  private static $instance_obj;
  protected $db;

  private function __construct() {
    //Traemos una instancia de nuestra clase de configuracion.
    $config = Config::singleton();
    // Necesario para la inserción a la BD.
    $this->db = SPDO::singleton();
    // Set config params to acces Google API
    $this->client_id = $config->get('google_client_id');
    $this->client_secret = $config->get('google_client_secret');
    $this->redirect_uri = $config->get('google_redirect_uri');
    //Create and Request to access Google API
    $this->client = new Google_Client();
    $this->client->setApplicationName("EmplazaPlus");
    $this->client->setClientId($this->client_id);
    $this->client->setClientSecret($this->client_secret);
    $this->client->setRedirectUri($this->redirect_uri);
    $this->client->addScope('https://www.googleapis.com/auth/userinfo.email');
    // Se definen los alcances de acceso para la información del perfil y email del usuario
    $this->client->addScope("email");
    $this->client->addScope("profile");

    $this->obj_res = new Google_Service_Oauth2($this->client);

    //Add access token to php session after successfully authenticate
    if (isset($_GET['code'])) {
      $this->client->authenticate($_GET['code']);
      $_SESSION['access_token'] = $this->client->getAccessToken();
      header('Location: ' . filter_var($this->redirect_uri, FILTER_SANITIZE_URL));
    }

    // Seteamos el token en la sesión.
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $this->client->setAccessToken($_SESSION['access_token']);
    }

    // Guardamos los datos del usuario
    if ($this->client->getAccessToken()) {
      $userData = $this->obj_res->userinfo->get();
      // Realizamos una comprobación.
      if (!empty($userData)) {
        // Debemos comprobar si el token ha excedido el tiempo de concesión o no.
        // Lo haremos realizando una consulta a la base de datos.
        $fechaHoraActual = date('Y-m-d H:i:s');
        $resultadoComprobacion = $this->db->prepare("DELETE FROM sesiones WHERE expiracion > '$fechaHoraActual'");
        $resultadoComprobacion->execute();
        // Si la consulta ha tenido efecto damos paso a realizar un nuevo almacenamiento de sesión.
        // En caso contrario no pasaría nada porque la sesión ya estaría activa al cumplir los requisitos.
        if ($resultadoComprobacion!=1) {
          // Creamos los objetos de sesiones que nos interesaran
          $_SESSION['access_token'] = $this->client->getAccessToken();
          $_SESSION['name'] = $userData->name;
          $_SESSION['email'] = $userData->email;
          // IMPORTANTE, en mi caso quiero dar un tiempo máximo de 5 minutos de token válido.
          // Por lo que ha sido necesario convertir la hora obtenida y aumentarle los minutos.
          $obtenerFechaActual = date('Y-m-d H:i:s', $this->client->getAccessToken()['expires_at']);
          $minutos_actuales = date('i', strtotime($obtenerFechaActual)); // Obtenemos solo los minutos.
          $aumentarMinutos = $minutos_actuales + 10; // Aumentamos 10 minutos.
          $expiracion = date('Y-m-d H:' . $aumentarMinutos . ':s', strtotime($obtenerFechaActual)); // Obtenemos la definitiva.
          // Seguidamente los almacenamos en variables
          $email = $_SESSION['email'];
          $token = $_SESSION['access_token']['access_token'];
          // Inyectamos datos en la base de datos.
          try {
            // Realizamos la consulta para insertar los datos necesarios a nuestra tabla.
            $stmt = $this->db->prepare("INSERT INTO sesiones (`email`, `token`, `expiracion`) VALUES ('$email', '$token', '$expiracion');");
            $stmt->execute();
          } catch(PDOException $pdoe) {
            echo $pdoe;
          }
        }
      }
      
    } else {
      try {
        $this->google_auth_url  =  $this->client->createAuthUrl();
      } catch (Exception $e) {
        var_dump($e);
      }
    }
  }
  public function getGoogleAuthUrl()
  {
    return $this->google_auth_url;
  }
  public static function instance()
  {
    if (!isset(self::$instance_obj)) {
      $c = __CLASS__;
      self::$instance_obj = new $c;
    }

    return self::$instance_obj;
  }
}