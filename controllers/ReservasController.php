<?php
class ReservarController {
    private $model;
    private $view;

    public function __construct($model, $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function reservar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {
            $_SESSION['isbn'] = $_POST['isbn'];
            $this->view->mostrarReserva();
        } else {
            $this->view->error();
        }
    }
}
?>
