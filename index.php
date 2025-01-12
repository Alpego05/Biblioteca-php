<?php
require_once __DIR__ . '/models/UsuariosModel.php';
require_once __DIR__ . '/views/LoginView.php';

$usuariosModel = new UsuariosModel();
$loginView = new LoginView();

// Llamada a la función render en lugar de LoginView
$loginView->mostrarLogin();

//test
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST["username"]; 
$result = $usuariosModel->getUsuario($usuario);

if ($result) {
    echo 'Usuario encontrado:';
    print_r($result);
} else {
    echo 'Usuario no encontrado.';
}

}

?>