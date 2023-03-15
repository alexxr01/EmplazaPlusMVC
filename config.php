<?php
$config = Config::singleton();
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
?>