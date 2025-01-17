<?php
class ListarLibrosView
{
    // Muestra la lista de libros
    public function mostrarLibros($libros , $msg)
    {
        echo '<div class="container mx-auto p-4">';
        if ($_SESSION['role'] == 'A') {
            echo '<form method="POST" action="index.php?controller=LibrosController&action=FormNuevoLibro">';
            echo '<button type="submit" class="shadow-lg mt-4 bg-red-500 w-full m-6 text-white py-1 px-4 rounded hover:bg-white hover:text-red-500 border border-2 transition-all ease" name="reservar" value="">Insertar Libro</button>';
            echo '</form>';
        }

        if (!empty($msg)) {
            echo '<p class="text-green-500 text-center mb-4">' . $msg . '</p>';
        }

        echo '<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">';

        foreach ($libros as $libro) {
            echo '<div class=" flex flex-col shadow-lg bg-white rounded-lg shadow-md overflow-hidden">';
            echo '<img class=" h-3/4 border border-2 w-full object-cover" src="./assets/libros/' . $libro['url_imagen'] . '" alt="' . $libro['titulo'] . '">';
            echo '<div class="p-4 text-center">';
            echo '<h2 class="text-lg font-semibold text-gray-800">' . $libro['titulo'] . '</h2>';
            echo '<p class="text-red-600">' . $libro['genero'] . '</p>';
            echo '<p class="text-gray-600">' . $libro['autor'] . '</p>';
            echo '<p class="text-gray-600 text-sm my-2">ISBN: ' . $libro['ISBN'];
            echo  '<br>';
            echo '<form method="POST" action="index.php?controller=ReservasController&action=mostrar" >';
            echo '<input type="hidden" name="isbn" value="' . $libro['ISBN'] . '">';
            echo '<button type="submit" class="shadow-lg mt-4 bg-red-500 text-white py-1 px-4 rounded hover:bg-white hover:text-red-500 border border-2 transition-all ease">Reservar</button>';
            echo '</form>';

            /* solo visto por el rol administrador */
            echo "<div class='flex justify-center'>";
            if ($_SESSION['role'] == 'A') {
                echo '<form method="POST" action="index.php?controller=LibrosController&action=FormEditarLibro">';
                echo '<input type="hidden" name="ISBN" value="' . $libro['ISBN'] . '">';
                echo '<input type="hidden" name="autor" value="' . $libro['autor'] . '">';
                echo '<input type="hidden" name="titulo" value="' . $libro['titulo'] . '">';
                echo '<input type="hidden" name="genero" value="' . $libro['genero'] . '">';
                echo '<input type="hidden" name="url" value="' . $libro['url_imagen'] . '">';

                echo '<button type="submit" class="shadow-lg mt-4 bg-red-500 text-white py-1 px-4 rounded hover:bg-white hover:text-red-500 border border-2 transition-all ease">Editar</button>';
                echo '</form>';
                

                echo '<form method="POST" action="index.php?controller=LibrosController&action=FormEliminarLibro">';
                echo '<input type="hidden" name="ISBN" value="' . $libro['ISBN'] . '">';
                echo '<input type="hidden" name="titulo" value="' . $libro['titulo'] . '">';
                echo '<button type="submit" class="shadow-lg mt-4 bg-red-500 text-white py-1 px-4 rounded hover:bg-white hover:text-red-500 border border-2 transition-all ease ">Eliminar</button>';
                echo '</form>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
        echo '</div>';
    }
}
?>

