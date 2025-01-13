<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="../assets/remixicon/remixicon.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

   
<header class="bg-purple-600 text-white py-4 sticky top-0 shadow-lg flex justify-between items-center p-3">
    <div class="">
       <h1 class="text-center text-3xl font-bold">Biblioteca Ribera</h1>  
    </div>

    <div class="">
    <i class="ri-menu-line"></i>
    </div>
</header>

<?php
class ListarLibrosView {
    // Muestra la lista de libros
    public function mostrarLibros($libros) {
        echo '<div class="container mx-auto p-4">';
        echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">';

        foreach ($libros as $libro) {
            echo '<div class=" flex flex-col shadow-lg bg-white rounded-lg shadow-md overflow-hidden">';
            echo '<img class=" h-3/4 w-full object-cover" src="../assets/libros/' . $libro['url_imagen'] . '" alt="' . $libro['titulo'] . '">';
            echo '<div class="p-4 text-center">';
            echo '<h2 class="text-lg font-semibold text-gray-800">' . $libro['titulo'] . '</h2>';
            echo '<p class="text-gray-600">' . $libro['genero'] . '</p>';
            echo '<p class="text-gray-600">' . $libro['autor'] . '</p>';
            echo '<p class="text-gray-600 text-sm my-2">ISBN: ' . $libro['ISBN'] ;
            echo  '<br>';
            echo '<form method="POST" action="reservar.php" >';
            echo '<input type="hidden" name="ISBN" value="' . $libro['ISBN'];
            echo '<button  class=" shadow-lg mt-4 bg-purple-500 text-white py-1 px-4 rounded hover:bg-white hover:text-purple-500 border border-2 transition-all ease ">
            <a href="../pages/Reservar.php">Reservar</a>
            </button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    }
}
?>

</body>
</html>
