<?php
require_once __DIR__ . '/../db/db.php';

class ReservasModel {
    //variables
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd = new DB(); 
        $this->pdo = $this->bd->getPDO(); 
    }

    public function nueva_reserva($id_usuario, $ISBN, $fecha_hasta) {
        $sql = "INSERT INTO reservas (id_usuario, ISBN, fecha_desde, fecha_hasta) 
        VALUES (:id_usuario, :ISBN, :fecha_desde, :fecha_hasta)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':ISBN', $ISBN);
        $fecha =  date('Y-m-d H:i:s');
        $stmt->bindParam(':fecha_desde', $fecha);
        $stmt->bindParam(':fecha_hasta', $fecha_hasta);


       /*  $stmt->bindParam(':id_usuario', $_POST['id_usuario']);
        $stmt->bindParam(':ISBN', $_POST['ISBN']);
        $stmt->bindParam(':fecha_desde', date('Y-m-d H:i:s'));
        $stmt->bindParam(':fecha_hasta', $_POST['fecha_hasta']); */
        $stmt->execute();

       /*  if ($stmt->rowCount() > 0) {
             echo "Reserva realizada con éxito.";
        } else {
            echo "Error al realizar la reserva.";
        } */
    }

    public function getReservasPorId($id){
        $sql = "SELECT * FROM reservas WHERE id_usuario = :id";
        $stmt = $this->pdo->prepare($sql);
        $id = $_SESSION['id'];
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function getReserva ($ISBN){
        $sql = "SELECT * FROM reservas WHERE ISBN = :ISBN";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->execute();
    }

   


}