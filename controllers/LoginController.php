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
        if ($user && $user[0]['pass'] === $password) {
            $_SESSION['user_id'] = $user[0]['id'];
            $_SESSION['role'] = $user[0]['role'];
            $_SESSION['username'] = $user[0]['username'];
            return true;
        } else {
            return false;
        }
    }
}

?>