<?php
require_once __DIR__ . '/../models/LibrosModel.php';
require_once __DIR__ . '/../views/ListarLibrosView.php';

class LibrosController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new LibrosModel();
        $this->view = new ListarLibrosView();
    }

    public function listar() {
        $libros = $this->model->getLibros();
        $this->view->mostrarLibros($libros);
    }
}
?>