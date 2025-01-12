<?php
session_start();
require_once __DIR__ . '/controllers/LoginController.php';
require_once __DIR__ . '/models/UsuariosModel.php';
require_once __DIR__ . '/views/LoginView.php';

// Crear el token
if (!isset($_SESSION['token'])) {
    $hora = date('H:i');
    $session_id = session_id();
    $token = hash('sha256', $hora . $session_id);
    $_SESSION['token'] = $token;
}

$loginController = new LoginController();
$usuariosModel = new UsuariosModel();
$loginView = new LoginView();

// Llamada a la función render en lugar de LoginView
$loginView->mostrarLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($loginController->login($username, $password)) {
       /*  if ($_SESSION['rol'] === 'A') {
            header("Location: panel_admin.php");
        } else {
            header("Location: panel.php");
        } */
       
        header("Location: panel.php");

    } else {
        echo 'Login fallido!';
    }
}

//test
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $usuario = $_POST["username"]; 
//     $contraseña = $_POST["password"];
// $result = $usuariosModel->getUsuario($usuario);

// if ($result) {
//     echo 'Usuario encontrado:';
//     print_r($result);
// } else {
//     echo 'Usuario no encontrado.';
// }

// }
