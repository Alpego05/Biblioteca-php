<?php
class MisReservasView
{
    public function mostrarMisReservas($reservas)
    {
        echo '<div class="flex items-center justify-center min-h-screen bg-gray-100">';
        echo '<div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl">';
        echo '  <h2 class="text-2xl font-bold text-center mb-4">Mis Reservas</h2>';
        if (!empty($error)) {
            echo '<p class="text-red-500 text-center mb-4">' . $error . '</p>';
        }
        echo '  <table class="table-auto w-full">';
        echo '    <thead>';
        echo '      <tr>';
        echo '        <th class="px-4 py-2">ID Reserva</th>';
        echo '        <th class="px-4 py-2">ISBN</th>';
        echo '        <th class="px-4 py-2">Fecha desde</th>';
        echo '        <th class="px-4 py-2">Fecha hasta</th>';
        echo '      </tr>';
        echo '    </thead>';
        echo '    <tbody>';

        if (!empty($reservas)) {
            foreach ($reservas as $reserva) {
                echo '      <tr class= "text-center">';
                echo '        <td class="border px-4 py-2">' . $reserva['id'] . '</td>';
                echo '        <td class="border px-4 py-2">' . $reserva['ISBN'] . '</td>';
                echo '        <td class="border px-4 py-2">' . $reserva['fecha_desde'] . '</td>';
                echo '        <td class="border px-4 py-2">' . $reserva['fecha_hasta'] . '</td>';
                echo '      </tr>';
            }
        } else {
            echo '      <tr>';
            echo '        <td class="border px-4 py-2 text-center" colspan="4">No tienes reservas.</td>';
            echo '      </tr>';
        }
        echo '    </tbody>';
        echo '  </table>';
        echo '</div>';
        echo '</div>';
    }
}
