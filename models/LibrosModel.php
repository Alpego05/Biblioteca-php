<?php
require_once __DIR__ . '/../db/db.php';

/**
 * clase librosmodel
 *
 * esta clase se encarga de interactuar con la base de datos de libros
 */
class LibrosModel {
    //variables
    private $pdo;
    private $bd;

    /**
     * constructor de la clase librosmodel
     *
     * inicializa la conexión con la base de datos
     */
    public function __construct(){
        $this->bd = new DB(); // crear instancia de db
        $this->pdo = $this->bd->getPDO(); // obtener el objeto pdo
    }

    /**
     * función para obtener los libros de la base de datos
     *
     * @return array libros en la base de datos
     */
    public function getLibros(){
        $stmt = $this->pdo->prepare('SELECT * FROM libros');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * elimina un libro de la base de datos
     *
     * @param string $ISBN el ISBN del libro
     * @return void
     */
    public function eliminarLibro($ISBN){
        $stmt = $this->pdo->prepare('DELETE FROM libros WHERE ISBN = :ISBN');
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();
    }

    /**
     * agrega un nuevo libro a la base de datos
     *
     * @param string $ISBN el ISBN del libro
     * @param string $titulo el título del libro
     * @param string $autor el autor del libro
     * @param string $genero el género del libro
     * @return void
     */
    public function agregarLibro($ISBN, $titulo, $autor, $genero){
        $stmt = $this->pdo->prepare('INSERT INTO libros (ISBN, titulo, autor, genero, url_imagen) VALUES (:ISBN, :titulo, :autor, :genero, :url_imagen)');
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':genero', $genero);

        $url_defecto = '/placeholder/placeholder.jpg';
        $stmt->bindParam(':url_imagen', $url_defecto);

        $stmt->execute();
    }

    /**
     * edita un libro en la base de datos
     *
     * @param string $isbn el ISBN del libro
     * @param string $titulo el título del libro
     * @param string $autor el autor del libro
     * @param string $genero el género del libro
     * @param string $url la URL de la imagen del libro
     * @return void
     */
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
