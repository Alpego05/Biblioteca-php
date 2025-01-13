<?php
require_once __DIR__ . '/../models/UsuariosModel.php';

class LoginController{
    private $model;

    public function __construct(){
        $this->model = new UsuariosModel();
    }

    public function login($username, $password)
    {
        $user = $this->model->getUsuario($username);
        print_r($user);
        if ($user && password_verify($password, $user[0]['pass'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            return true;
        } else {
            return false;
        }
    }
}

?>