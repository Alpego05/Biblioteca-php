<?php
session_start();

// Incluir los controladores, modelos y vistas necesarios
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../models/UsuariosModel.php';
require_once __DIR__ . '/../views/LoginView.php';
require_once __DIR__ . '/../models/LibrosModel.php';
require_once __DIR__ . '/../views/ListarLibrosView.php';
require_once __DIR__ . '/../controllers/LibrosController.php';
require_once __DIR__ . '/../controllers/ReservarController.php';
require_once __DIR__ . '/../models/ReservarModel.php';
require_once __DIR__ . '/../views/ReservarView.php';

// Definir acción y controlador por defecto
define('ACCION_DEFECTO', 'listar');
define('CONTROLADOR_DEFECTO', 'Login');

// Crear el token
if (!isset($_SESSION['token'])) {
    $hora = date('H:i');
    $session_id = session_id();
    $token = hash('sha256', $hora . $session_id);
    $_SESSION['token'] = $token;
}

// Función para cargar el controlador especificado y devolver una instancia del mismo
function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        die("Controlador no válido");
    }
}

// Función para ejecutar una acción en el controlador
function cargarAccion($controllerObj, $action) {
    $accion = $action;
    $controllerObj->$accion();
}

// Función para comprobar la acción a realizar
function lanzarAccion($controllerObj) {
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAccion($controllerObj, $_GET["action"]);
    } else {
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}

// Cargar el controlador y la acción correspondientes
if (isset($_GET["controller"])) {
    $controllerObj = cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
} else {
    $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}
?>
