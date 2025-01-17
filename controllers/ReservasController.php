<?php
require_once __DIR__ . '/../models/ReservasModel.php';
require_once __DIR__ . '/../views/ReservarView.php';

class ReservasController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ReservasModel();
        $this->view = new ReservarView();
    }

    public function mostrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {
            $_SESSION['isbn'] = $_POST['isbn'];
            echo $_SESSION["isbn"];
            /* $this->view->mostrarReserva(); */
        } else {
            /* $this->view->error(); */
        }
    }
}
?>
