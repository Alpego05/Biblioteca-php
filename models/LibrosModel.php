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

    public function eliminarLibro($ISBN){
        $stmt = $this->pdo->prepare('DELETE FROM libros WHERE id = :ISBN');
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();

    }

    public function agregarLibro($ISBN, $titulo, $autor){

        $stmt = $this->pdo->prepare('INSERT INTO libros (ISBN, titulo, autor, url_imagen) VALUES (:ISBN, :titulo, :autor, :url_imagen)');
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->bindParam(':titulo',$titulo);
        $stmt->bindParam(':autor', $autor);

        $url_defecto = '/placeholder/placeholder.jpg';
        $stmt->bindParam(':url_imagen', $url_defecto);

        $stmt->execute();

    }

    public function editarLibro($ISBN){
        

    }
}

?>