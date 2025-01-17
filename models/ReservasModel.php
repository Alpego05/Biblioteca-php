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

    public function nueva_reserva(){
        
    }


}