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

  private function __construct() {
    //Traemos una instancia de nuestra clase de configuracion.
    $config = Config::singleton();
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

    // Seteamos el token
    if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $this->client->setAccessToken($_SESSION['access_token']);
    }

    // Guardamos los datos del usuario
    if ($this->client->getAccessToken()) {
      $userData = $this->obj_res->userinfo->get();
      if (!empty($userData)) {
        // Insertamos los datos en la sesion
        session_start();
        $_SESSION['name'] = $userData->name;
        $_SESSION['email'] = $userData->email;
      }
      $_SESSION['access_token'] = $this->client->getAccessToken();
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
