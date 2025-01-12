<?php
require_once __DIR__ . '/../db/db.php';

class LibrosModel{
    //variables
    private $pdo;
    private $bd;

    public function __construct(){
        $this->bd = new DB(); // Crear instancia de DB
        $this->pdo = $this->bd->getPDO(); // Obtener el objeto PDO
    }

    //funcion para pedir los libros a la base de datos
    public function getLibros(){
        $stmt = $this->pdo->prepare('SELECT * FROM libros');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>