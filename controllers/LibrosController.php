<?php
require_once __DIR__ . '/../models/LibrosModel.php';

//views
require_once __DIR__ . '/../views/ListarLibrosView.php';
require_once __DIR__ . '/../views/NuevoLibroView.php';
require_once __DIR__ . '/../views/EditarLibroView.php';
require_once __DIR__ . '/../views/EliminarLibroView.php';

class LibrosController {
    private $model;
    private $view;
    private $view2; //nuevo libro
    private $view3; //editar libro
    private $view4; //eliminar libro

    public function __construct() {
        $this->model = new LibrosModel();
        $this->view = new ListarLibrosView();
        $this->view2 = new NuevoLibroView();
        $this->view3 = new EditarLibroView();
        $this->view4 = new EliminarLibroView();
    }

    /* listar libros */

    public function listar($msg = "") {
        $libros = $this->model->getLibros();
        $this->view->mostrarLibros($libros ,$msg);
    }

    /* añadir libros */

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


        /* Editar libros */

        public function FormeditarLibro($msg = "") {
            $isbn = $_POST['ISBN'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];
            $url = $_POST['url'];

            $this->view3->MostrarEditarLibro($isbn, $titulo, $autor, $genero, $url,$msg);

        }

        public function editarLibro() {
            $isbn = $_POST['ISBN'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $genero = $_POST['genero'];
            $url = $_POST['url'];

            //metodo sin terminar
            $this->model->editarLibro($isbn, $titulo, $autor, $genero, $url);

            $this->FormeditarLibro('🆗 ¡Libro modificado con éxito!');
        }

        

        /* Eliminar libros */
        public function FormEliminarLibro() {
            $isbn = $_POST['ISBN'];
            $titulo = $_POST['titulo'];
           
            $this->view4->MostrarEliminarLibro($isbn , $titulo);

        }

        public function eliminarLibro()  {
            $isbn = $_POST['ISBN'];
            
            $this->model->eliminarLibro($isbn);
            $this->listar('🆗 ¡Libro eliminado con éxito!');
            
        }

       
    }


?>