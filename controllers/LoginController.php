<?php
require_once __DIR__ . '/../models/UsuariosModel.php';
require_once __DIR__ . '/../views/LoginView.php';

class LoginController {
    private $model;
    private $view;

    public function __construct()
    {
        $this->model = new UsuariosModel();
        $this->view = new LoginView();
    }

    public function mostrarLogin($error = '')
    {
        $this->view->mostrarLogin($error);
    }

    public function procesarLogin(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validar campos vacíos
        if (empty($username) || empty($password)) {
            $this->mostrarLogin('⚠️ Todos los campos son obligatorios.');
            
            return;
        }

        // Buscar usuario en la base de datos
        $usuario = $this->model->getUsuario($username);

        // Verificar si el usuario existe y la contraseña coincide
        if ($usuario && password_verify($password, $usuario[0]['pass'])) {
            session_start();
            session_regenerate_id(); // Evitar fijación de sesión
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $usuario[0]['rol'];
            $_SESSION["id"] = $usuario[0]['id'];
            

            // Redirigir tras login exitoso
            header('Location: index.php?controller=LibrosController&action=listar');
            exit();
        } else {
            // Mostrar error si el login falla
            $this->mostrarLogin('❌ Usuario o contraseña incorrectos.');
        }
    } else {
        // Si no es POST, mostrar el formulario
        $this->mostrarLogin();
    }

}


    public function logout(){
        
        session_unset();
        session_destroy();

        header('Location: index.php?controller=LoginController&action=mostrarLogin');
    }

    
}
?>