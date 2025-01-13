<?php
// Incluye los archivos de modelo, vista y controlador
include '../models/LibrosModel.php';
include '../views/ListarLibrosView.php';
include '../controllers/LibrosController.php';

// // Crea una instancia del controlador de tareas
$LibrosController = new LibrosController();
// // Ejecuta la acción de listar libros
$LibrosController->listar();


?>