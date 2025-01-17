<?php
/**
 * Clase EliminarLibroView
 *
 * Esta clase se encarga de mostrar la vista para confirmar la eliminación de un libro
 */
class EliminarLibroView{
    /**
     * Muestra el formulario para confirmar la eliminación de un libro
     *
     * @param string $ISBN El ISBN del libro
     * @param string $titulo El título del libro
     * @return void
     */
    public function MostrarEliminarLibro($ISBN, $titulo){
        echo "<div class='max-w-md mx-auto bg-white shadow-lg rounded-lg p-6'>";
        echo "<h2 class='text-2xl font-bold mb-4'>Confirmar Eliminación</h2>";
        echo "<p class='text-gray-700 mb-2'>¿Estás seguro de que deseas eliminar el libro?</p>";
        echo "<p class='text-gray-700 mb-2'><strong>ISBN:</strong> " . $ISBN . "</p>";
        echo "<p class='text-gray-700 mb-4'><strong>Título:</strong> " . $titulo . "</p>";
        
        echo "<form method='post' action='index.php?controller=LibrosController&action=eliminarLibro'>";
        echo "<input type='hidden' name='ISBN' value='" . $ISBN . "'>";
        echo "<div class='flex justify-between'>";
        echo "<button type='submit' name='confirm' value='yes' class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600'>Confirmar</button>";
        echo "</div>";
        
        echo "</form>";
        echo "</div>";
    }
}
?>

