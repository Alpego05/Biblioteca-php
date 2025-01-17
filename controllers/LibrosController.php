<?php
require_once __DIR__ . '/../models/LibrosModel.php';

//views
require_once __DIR__ . '/../views/ListarLibrosView.php';
require_once __DIR__ . '/../views/NuevoLibroView.php';

class LibrosController {
    private $model;
    private $view;
    private $view2;

    public function __construct() {
        $this->model = new LibrosModel();
        $this->view = new ListarLibrosView();
        $this->view2 = new NuevoLibroView();
    }

    public function listar() {
        $libros = $this->model->getLibros();
        $this->view->mostrarLibros($libros);
    }

    public function FormNuevoLibro($msg = '') {
        $this->view2->mostrarNuevoLibro($msg);
    }

    public function nuevoLibro(){
        $isbn = $_POST['isbn'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];

        //averiguar si el libro existe
        $libros = $this->model->getLibros();
        $existe = false;
        foreach ($libros as $libro) {
            if ($libro['ISBN'] == $isbn) {
                $existe = true;
                break;
            }
        }


        if (empty($isbn) || empty($titulo) || empty($autor) || empty($genero)) {
            $this->FormNuevoLibro('⚠️ Todos los campos son obligatorios.');

        }else if($existe == true){
            $this->FormNuevoLibro('⚠️ El libro ya existe en la base de datos');

            }else{
            $this->model->agregarLibro($isbn, $titulo, $autor, $genero);
            $this->FormNuevoLibro('🆗 ¡Libro agregado con éxito!');
            }
        }

       
    }


?>