<?php
class LibrosController{
    private $model;
    private $view;
    public function __construct(){
        $this->model = new LibrosModel();
        $this->view = new ListarLibrosView();
    }
    public function listar()
    {
        $libros = $this->model->getLibros();
        $this->view->mostrarLibros($libros);
    }
}

?>