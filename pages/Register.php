<?php
session_start();
require_once __DIR__ . '/../controllers/RegisterController.php';
require_once __DIR__ . '/../models/UsuariosModel.php';
require_once __DIR__ . '/../views/RegisterView.php';

$RegisterController = new RegisterController();
$usuariosModel = new UsuariosModel();
$RegisterView = new mostrarRegistro();


$RegisterView->mostrarRegistro();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['username'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    if ($RegisterController->register($nombre, $apellido1, $apellido2, $email, $password)) { 
        echo 'Registro exitoso!'; 
    } else { 
        echo 'Registro fallido!'; 
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

?>