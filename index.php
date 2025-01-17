<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./assets/remixicon/remixicon.css" />

</head>
<header class="bg-red-800 text-white py-4 sticky top-0 shadow-lg flex justify-between items-center p-3">
    <div class="">
         <a href='index.php?controller=LibrosController&action=listar'>
            <h1 class="text-center text-3xl font-bold">Biblioteca Ribera</h1>
         </a>
        
    </div>

    <!-- poner control de errores -->
    <div class="text-xl flex">
        <a class="mx-6" href="index.php?controller=ReservasController&action=mostrarMisReservas">Mis Reservas <i class="ri-book-fill"></i> </a>
        <a class="mx-6" href="index.php?controler=LoginController&action=logout">Cerrar Sesión <i class="ri-close-circle-line  mx-1"></i> </a>     
    </div>
 
</header>

<body>
    
     <?php
     // Cargar el archivo del controlador frontal
     require_once "./frontcontroller.php";
     ?>

    

    

</body>

</html>