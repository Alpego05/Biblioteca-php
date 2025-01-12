<?php
require_once __DIR__ . '/../db/db.php';

class UsuariosModel{
    //variables
    private $bd;
    private $pdo;

    public function __construct(){
        $this->bd = new BD();
        $this->pdo = $this->bd->getPdo();
        
    }
    
    //recojemos el usuario verificando que existe
    public function getUsuario($usuario){
        $stmt = $this->pdo->prepare('SELECT * FROM libros WHERE usuario = :usuario');
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>