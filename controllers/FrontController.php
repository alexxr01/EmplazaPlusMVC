<?php
class FrontController {
    static function init() {
            //Incluimos algunas clases:
            require 'libs/Config.php'; //de configuracion
            require 'libs/SPDO.php'; //PDO con singleton
            require 'libs/View.php'; //Mini motor de plantillas
            require 'libs/Util.php'; //métodos de utilidad general
            require 'config.php'; //Archivo con configuraciones.
    }
    static function main() {
        FrontController::init();
        //Con el objetivo de no repetir nombre de clases, nuestros controladores
        //terminarán todos en Controller. Por ej, la clase controladora Items, será ItemsController
 
        //Formamos el nombre del Controlador o en su defecto, tomamos que es el IndexController
        if(! empty($_GET['controlador']))
              $controllerName = $_GET['controlador'] . 'Controller';
        else
              $controllerName = "ItemsController";
 
        //Lo mismo sucede con las acciones, si no hay acción, tomamos index como acción
        if(! empty($_GET['accion']))
              $actionName = $_GET['accion'];
        else
              $actionName = "listar";
 
        $controllerPath = $config->get('controllersFolder') . $controllerName . '.php';
 
        //Incluimos el fichero que contiene nuestra clase controladora solicitada
        if(is_file($controllerPath))
              require $controllerPath;
        else
              die('El controlador no existe - 404 not found');
        $controller = new $controllerName();
        //Si no existe la clase que buscamos y su acción, mostramos un error 404
        //if (is_callable(array($controllerName, $actionName)) == false)
        if (is_callable(array($controller, $actionName)) == false)
        {
            trigger_error ($controllerName . '->' . $actionName . '` no existe', E_USER_NOTICE);
            return false;
        }
        //Si todo esta bien, creamos una instancia del controlador y llamamos a la acción
        //$controller = new $controllerName();
        $controller->$actionName();
    }
}
?>