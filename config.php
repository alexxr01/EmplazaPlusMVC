<?php
require_once('libs/Config.php');
$config = Config::singleton();
// Nombre aplicacion
$config->set('nombreAplicacion', 'EmplazaPlus');
// Mapeo enrutado hacia los controladores
$config->set('controllersFolder', 'controllers/');
$config->set('modelsFolder', 'models/');
$config->set('viewsFolder', 'views/');
$config->set('phpoFolder', 'phpo/');
// Configuracion acceso a la BD
$config->set('dbhost', 'localhost');
$config->set('dbname', 'emplazaplus');
$config->set('dbuser', 'root');
$config->set('dbpass', '');
// Configuración para autentificación con Google OAuth
$config->set('google_client_id', '511311237268-n6iumb9u6vdgbvv5p2ppecbqgg9cu9re.apps.googleusercontent.com');
$config->set('google_client_secret', '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');
$config->set('google_redirect_uri', 'http://localhost/horaslibreconfiguracion/PROYECTO%20FINAL/EmplazaPlusMVC/login.php');
?>