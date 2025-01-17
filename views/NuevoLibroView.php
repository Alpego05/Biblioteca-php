<?php

class NuevoLibroView {
    public function MostrarNuevoLibro($msg = "") {
        echo '<div class="bg-gray-100 flex items-center justify-center min-h-screen">';
        echo '    <form method="POST" action="index.php?controller=LibrosController&action=nuevoLibro" class="my-6 p-9 h-full bg-white rounded-lg shadow-lg w-full max-w-md">';
        echo '        <h2 class="text-2xl font-bold text-center mb-4">Nuevo Libro</h2>';

        if (!empty($msg)) {
            echo '<p class="text-red-500 text-center mb-4">' . $msg . '</p>';
        }
        
        echo '        <div class="mb-4">';
        echo '            <label for="isbn" class="block text-gray-700">ISBN:</label>';
        echo '            <input type="text" id="isbn" name="isbn" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-red-600" >';
        echo '        </div>';

        echo '        <div class="mb-4">';
        echo '            <label for="titulo" class="block text-gray-700">Título:</label>';
        echo '            <input type="text" id="titulo" name="titulo" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-red-600" >';
        echo '        </div>';

        echo '        <div class="mb-4">';
        echo '            <label for="autor" class="block text-gray-700">Autor:</label>';
        echo '            <input type="text" id="autor" name="autor" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-red-600" >';
        echo '        </div>';

        echo '        <div class="mb-4">';
        echo '            <label for="genero" class="block text-gray-700">Género:</label>';
        echo '            <input type="text" id="genero" name="genero" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-red-600" >';
        echo '        </div>';
        
        echo '        <button type="submit" class="w-full bg-red-800 text-white py-2 px-4 rounded hover:bg-red-900 transition-all ease">Insertar</button>';
        echo '    </form>';
        echo '</div>';
    }
}
?>
