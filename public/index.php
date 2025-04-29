<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../config.php';

$controllerName = isset($_GET['controller']) ? ucfirst(strtolower($_GET['controller'])) . 'Controller' : 'UsuarioController';
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerPath = "../Controllers/$controllerName.php";

if (file_exists($controllerPath)) {
    require_once $controllerPath;

    if (class_exists($controllerName)) {
        $controller = new $controllerName();

        if (method_exists($controller, $actionName)) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->$actionName($_POST); // pasa POST cuando es envío de formulario
            } else {
                $controller->$actionName(); // solo muestra formularios o listas
            }
        } else {
            echo "Error: Acción '$actionName' no encontrada.";
        }
    } else {
        echo "Error: Controlador '$controllerName' no existe.";
    }
} else {
    echo "Error: Archivo del controlador '$controllerName.php' no encontrado.";
}
?>
