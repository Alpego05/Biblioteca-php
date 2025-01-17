<?php
class ListarLibrosView {
    // Muestra la lista de libros
    public function mostrarLibros($libros) {
        echo '<div class="container mx-auto p-4">';
        echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">';

        foreach ($libros as $libro) {
            echo '<div class=" flex flex-col shadow-lg bg-white rounded-lg shadow-md overflow-hidden">';
            echo '<img class=" h-3/4 w-full object-cover" src="./assets/libros/' . $libro['url_imagen'] . '" alt="' . $libro['titulo'] . '">';
            echo '<div class="p-4 text-center">';
            echo '<h2 class="text-lg font-semibold text-gray-800">' . $libro['titulo'] . '</h2>';
            echo '<p class="text-gray-600">' . $libro['genero'] . '</p>';
            echo '<p class="text-gray-600">' . $libro['autor'] . '</p>';
            echo '<p class="text-gray-600 text-sm my-2">ISBN: ' . $libro['ISBN'] ;
            echo  '<br>';
            echo '<form method="POST" action="index.php?controller=ReservasController&action=mostrar" >';
            echo '<input type="hidden" name="ISBN" value="' . $libro['ISBN'] . '">';
           echo '<button type="submit" class="shadow-lg mt-4 bg-red-500 text-white py-1 px-4 rounded hover:bg-white hover:text-red-500 border border-2 transition-all ease" name="reservar" value="' . $libro['ISBN'] . '">Reservar</button>';
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
