<?php
require_once __DIR__ . '/../db/db.php';

class UsuariosModel {
    //variables
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB(); 
        $this->pdo = $this->bd->getPDO(); 
    }

    public function getUsuario($usuario) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre = :usuario');
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarUsuario($username, $apellido1, $apellido2, $email, $password) {
        // Preparar la consulta SQL
        $stmt = $this->pdo->prepare('INSERT INTO usuarios (nombre, apellido1, apellido2, email, pass, rol) VALUES (:username, :apellido1, :apellido2, :email, :pass, :role)');

        // Variables temporales para los valores por defecto
        $defaultRole = 'U';

         //ocultar la contraseña para mas seguridad
         $SecretPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Vincular los parámetros con los valores correspondientes
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
