
<?php
require_once __DIR__ . '/../models/UsuariosModel.php';

class RegisterController {
    private $model;

    public function __construct() {
        $this->model = new UsuariosModel();
    }
    
    public function register($username, $apellido1, $apellido2, $email, $password) {
        // password_hash
        return $this->model->registrarUsuario($username, $apellido1, $apellido2, $email, $password);
    }
}
?>
