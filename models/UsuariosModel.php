<?php
require_once __DIR__ . '/../db/db.php';

/**
 * clase usuariosmodel
 *
 * esta clase se encarga de interactuar con la base de datos de usuarios
 */
class UsuariosModel {
    // variables
    private $bd;
    private $pdo;

    /**
     * constructor de la clase usuariosmodel
     *
     * inicializa la conexión con la base de datos
     */
    public function __construct() {
        $this->bd = new DB(); 
        $this->pdo = $this->bd->getPDO(); 
    }

    /**
     * obtiene la información de un usuario por nombre
     *
     * @param string $usuario nombre del usuario
     * @return array información del usuario
     */
    public function getUsuario($usuario) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre = :usuario');
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * registra un nuevo usuario en la base de datos
     *
     * @param string $username nombre del usuario
     * @param string $apellido1 primer apellido del usuario
     * @param string $apellido2 segundo apellido del usuario
     * @param string $email correo electrónico del usuario
     * @param string $password contraseña del usuario
     * @return int número de filas afectadas
     */
    public function registrarUsuario($username, $apellido1, $apellido2, $email, $password) {
        // preparar la consulta sql
        $stmt = $this->pdo->prepare('INSERT INTO usuarios (nombre, apellido1, apellido2, email, pass, rol) VALUES (:username, :apellido1, :apellido2, :email, :pass, :role)');

        $defaultRole = 'U';
        $SecretPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':apellido1', $apellido1);
        $stmt->bindParam(':apellido2', $apellido2);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $SecretPassword); 
        $stmt->bindParam(':role', $defaultRole);
    
        $stmt->execute();
        
        return $stmt->rowCount();
    }
}
?>
