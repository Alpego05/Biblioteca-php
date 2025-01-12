<?php
require_once __DIR__ . '/../config/BiblioConfig.php';

class DB
{
    private $pdo;
    public function __construct()
    {
        global $host, $dbname, $usuario, $pwd;
        try {
            // Crea una instancia de PDO para conectarse a la base de datos
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //gestión de errores
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    // Obtiene una instancia de PDO
    public function getPDO(){
        return $this->pdo;
    }
}
