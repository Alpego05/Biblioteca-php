<?php
require_once __DIR__ . '/../models/UsuariosModel.php';

class LoginController {
    private $model;

    public function __construct() {
        $this->model = new UsuariosModel();
    }

    public function login() {
        
    }
   
}
?>
