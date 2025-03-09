<?php
session_start();

// Cargar configuraciones y conexión a la BD
require_once "../config/config.php";
require_once "../config/database.php";



// Autocargador simple para los modelos y controladores
spl_autoload_register(function($class) {
    if(file_exists("../app/models/{$class}.php")){
        require_once "../app/models/{$class}.php";
    } elseif(file_exists("../app/controllers/{$class}.php")){
        require_once "../app/controllers/{$class}.php";
    }
});

// Ruta simple basada en parámetros GET: ?controller=xxx&action=yyy
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'dashboard';
$action     = isset($_GET['action']) ? $_GET['action'] : 'home';

// Construir el nombre y ruta del controlador
$controllerName = ucfirst($controller) . "Controller";
$controllerFile = "../app/controllers/{$controllerName}.php";

if(file_exists($controllerFile)){
    require_once $controllerFile;
    $objController = new $controllerName();
    if(method_exists($objController, $action)){
        $objController->$action();
    } else {
        include "../app/views/errors/404.php";
    }
} else {
    include "../app/views/errors/404.php";
}
?>
