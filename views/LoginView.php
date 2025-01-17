<?php

/**
 * Clase LoginView
 *
 * Esta clase se encarga de mostrar la vista de login
 */
class LoginView {
    /**
     * Muestra el formulario de login
     *
     * @param string $error Mensaje de error para mostrar en la vista
     * @return void
     */
    public function mostrarLogin($error = '') {
        echo '<div class="flex items-center justify-center min-h-screen bg-gray-100">';
        
        echo '<form method="POST" action="index.php?controller=LoginController&action=procesarLogin" class="my-6 p-9 h-full bg-white rounded-lg shadow-lg w-full max-w-md">';
        echo '  <h2 class="text-2xl font-bold text-center mb-4">Iniciar Sesión</h2>';

        if (!empty($error)) {
            echo '<p class="text-red-500 text-center mb-4">' . $error . '</p>';
        }

        echo '  <div class="mb-4">';
        echo '    <label for="username" class="block text-gray-700">Username:</label>';
        echo '    <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-red-600" >';
        echo '  </div>';

        echo '  <div class="mb-4">';
        echo '    <label for="password" class="block text-gray-700">Password:</label>';
        echo '    <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-red-600" >';
        echo '  </div>';

        echo '  <input type="hidden" name="controller" value="login">';
        echo '  <input type="hidden" name="action" value="ProcesarLogin">';
        
        echo '  <button type="submit" class="w-full bg-red-800 text-white py-2 px-4 rounded hover:bg-red-900 transition-all ease">Login</button>';

        echo '  <div class="text-center text-gray-700 my-4">';
        echo '  </div>';

        echo '</form>';

        // Imagen de login 
        echo '<div class="flex justify-center mt-4">';
        echo '  <img src="./assets/images/login.jpg" alt="Logo de la aplicación" width="320px" class="rounded-lg shadow-lg">';
        echo '</div>';
        
        echo '</div>';
    }
}
?>
