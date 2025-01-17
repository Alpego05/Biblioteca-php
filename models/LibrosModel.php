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
        $stmt = $this->pdo->prepare('DELETE FROM libros WHERE ISBN = :ISBN');
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();

    }

    public function agregarLibro($ISBN, $titulo, $autor, $genero){

        $stmt = $this->pdo->prepare('INSERT INTO libros (ISBN, titulo, autor, genero, url_imagen) VALUES (:ISBN, :titulo, :autor, :genero, :url_imagen)');
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->bindParam(':titulo',$titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);

        $url_defecto = '/placeholder/placeholder.jpg';
        $stmt->bindParam(':url_imagen', $url_defecto);

        $stmt->execute();

    }

    public function editarLibro($isbn, $titulo, $autor, $genero, $url){
        $stmt = $this->pdo->prepare('UPDATE libros SET titulo = :titulo, autor = :autor, genero = :genero, url_imagen = :url_imagen WHERE ISBN = :ISBN');
        $stmt->bindParam(':ISBN', $isbn);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':url_imagen', $url);
        $stmt->execute();     

    }
}

?>