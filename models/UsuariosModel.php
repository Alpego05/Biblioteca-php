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

    // Recojemos el usuario verificando que existe
    public function getUsuario($usuario) {
        $stmt = $this->pdo->prepare('SELECT * FROM usuarios WHERE nombre = :usuario');
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
