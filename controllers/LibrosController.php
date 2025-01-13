<?php
class LibrosController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function listar() {
        $libros = $this->model->getLibros();
        $this->view->mostrarLibros($libros);
    }
}
?>
