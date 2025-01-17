<?php
require_once __DIR__ . '/../db/db.php';

/**
 * clase reservasmodel
 *
 * esta clase se encarga de interactuar con la base de datos de reservas
 */
class ReservasModel {
    //variables
    private $bd;
    private $pdo;

    /**
     * constructor de la clase reservasmodel
     *
     * inicializa la conexión con la base de datos
     */
    public function __construct() {
        $this->bd = new DB(); 
        $this->pdo = $this->bd->getPDO(); 
    }

    /**
     * crea una nueva reserva en la base de datos
     *
     * @param int $id_usuario el id del usuario
     * @param string $ISBN el ISBN del libro
     * @param string $fecha_hasta la fecha hasta cuándo es válida la reserva
     * @return void
     */
    public function nueva_reserva($id_usuario, $ISBN, $fecha_hasta) {
        $sql = "INSERT INTO reservas (id_usuario, ISBN, fecha_desde, fecha_hasta) 
        VALUES (:id_usuario, :ISBN, :fecha_desde, :fecha_hasta)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':ISBN', $ISBN);
        $fecha =  date('Y-m-d H:i:s');
        $stmt->bindParam(':fecha_desde', $fecha);
        $stmt->bindParam(':fecha_hasta', $fecha_hasta);

       /* $stmt->bindParam(':id_usuario', $_POST['id_usuario']);
        $stmt->bindParam(':ISBN', $_POST['ISBN']);
        $stmt->bindParam(':fecha_desde', date('Y-m-d H:i:s'));
        $stmt->bindParam(':fecha_hasta', $_POST['fecha_hasta']); */
        $stmt->execute();

       /* if ($stmt->rowCount() > 0) {
             echo "reserva realizada con éxito.";
        } else {
            echo "error al realizar la reserva.";
        } */
    }

    /**
     * obtiene las reservas de un usuario por su id
     *
     * @param int $id el id del usuario
     * @return array las reservas del usuario
     */
    public function getReservasPorId($id){
        $sql = "SELECT * FROM reservas WHERE id_usuario = :id";
        $stmt = $this->pdo->prepare($sql);
        $id = $_SESSION['id'];
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * obtiene una reserva por ISBN
     *
     * @param string $ISBN el ISBN del libro
     * @return array la reserva
     */
    public function getReserva($ISBN){
        $sql = "SELECT * FROM reservas WHERE ISBN = :ISBN";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();
    }

}
?>
