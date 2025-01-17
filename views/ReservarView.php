<?php

/**
 * Clase ReservarView
 *
 * Esta clase se encarga de mostrar la vista para reservar un libro
 */
class ReservarView {
    /**
     * Muestra el formulario para reservar un libro
     *
     * @param string $msg Mensaje para mostrar en la vista
     * @return void
     */
    public function mostrarFormReserva($msg = "") {
        echo '<div class="bg-gray-100 flex items-center justify-center min-h-screen">';

        echo '    <form method="POST" action="index.php?controller=ReservasController&action=reservar" class="my-6 p-9 h-full w-1/2 bg-white rounded-lg shadow-lg  max-w-md">';

        if (!empty($msg)) {
            echo '<p class="text-green-500 text-center mb-4">' . $msg . '</p>';
        }
        
        echo '        <h2 class="text-2xl font-bold text-center mb-4">Reservar Libro</h2>';
        
        echo '        <table class="w-full border-collapse mb-4">';
        echo '            <tr>';
        echo '                <th class="border px-4 p-2">Nombre</th>';
        echo '                <th class="border px-9 p-2">ISBN</th>';
        echo '                <th class="border  px-2">Fecha Hasta</th>';
        echo '            </tr>';

        echo '            <tr>';
        echo '                <td class="border p-2"><input type="text" name="nombre" 
                                value=" ' .  $_SESSION['username']  .        '" readonly
                                class="w-full p-2 border border-gray-300 rounded" required></td>';
        echo '                <td class="border p-2"><input readonly name="isbn" type="text" 
                                value="' .  $_POST['isbn']  .        '"
                                class="w-full p-2 border border-gray-300 rounded" required></td>';
        echo '                <td class="border p-2"><input type="date" name="fecha_hasta" class="w-full p-2 border border-gray-300 rounded" required></td>';
        echo '            </tr>';
        echo '        </table>';
        
        echo '        <input type="hidden" name="id_usuario" value=" ' .  $_SESSION['id']  .        '">';
       
        echo '        <button type="submit" class="w-full bg-red-800 text-white py-2 px-4 rounded hover:bg-red-900 transition-all ease">Reservar</button>';
        
        echo '    </form>';
        echo '</div>';
    }
}
?>
