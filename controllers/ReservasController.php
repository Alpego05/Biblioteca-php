<?php
require_once __DIR__ . '/../models/ReservasModel.php';
require_once __DIR__ . '/../views/ReservarView.php';
require_once __DIR__ . '/../views/MisReservasView.php';

/**
 * clase reservascontroller
 *
 * esta clase se encarga de gestionar las acciones relacionadas con las reservas
 */
class ReservasController {
    private $model;
    private $view;
    private $reservasView;

    /**
     * constructor de la clase reservascontroller
     *
     * inicializa los modelos y las vistas necesarias
     */
    public function __construct() {
        $this->model = new ReservasModel();
        $this->view = new ReservarView();
        $this->reservasView = new MisReservasView();
    }

    /**
     * muestra el formulario para realizar una reserva
     *
     * @param string $msg mensaje para mostrar en la vista
     * @return void
     */
    public function mostrar($msg = '') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {
            $this->view->mostrarFormReserva($msg); 
        } 
    }

    /**
     * realiza una nueva reserva
     *
     * @return void
     */
    public function reservar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['isbn'])) {
            $id_usuario = $_SESSION['id'];
            $isbn = $_POST['isbn'];
            $fecha = $_POST['fecha_hasta'];

            $this->model->nueva_reserva($id_usuario, $isbn, $fecha);
            $this->mostrar('🆗 reserva realizada con éxito');
        }
    }

    /**
     * muestra las reservas del usuario actual
     *
     * @return void
     */
    public function mostrarMisReservas() {
        if (isset($_SESSION['id'])) {
            $id_usuario = $_SESSION['id'];
            $reservas = $this->model->getReservasPorId($id_usuario);
            $this->reservasView->mostrarMisReservas($reservas);
        }
    }
}
?>
