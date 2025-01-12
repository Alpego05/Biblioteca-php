<?php
class ListarLibrosView{
    // Muestra la lista de libros
    public function mostrarLibros($libros)
    {
        // Genera una tabla con los libros
        echo '<table>';
        echo '<tr><th>Título</th><th>Género</th></tr>';
        foreach ($libros as $libro) {
            echo '<tr>';
            echo '<td>' . $libro['titulo'] . '</td>';
            echo '<td>' . $libro['genero'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
}

?>
