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

    public function mostrar($msg = '') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {
             $this->view->mostrarFormReserva($msg); 

        } 
    }

    public function reservar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {

            $id_usuario = $_SESSION['id'];
            $isbn = $_POST['isbn'];
            $fecha = $_POST['fecha_hasta'];

            $this->model->nueva_reserva($id_usuario, $isbn, $fecha);
            $this->mostrar('🆗 Reserva realizada con éxito.');

        }

    }
}
?>
