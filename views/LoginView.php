<!DOCTYPE html> 
<html lang="es"> 
    <head> <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Biblioteca Ribera</title> 
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> 
</head>
<body class="bg-gray-100 text-gray-900">
<?php
class LoginView {
    public function mostrarLogin() {
        echo '<div class="flex items-center justify-center min-h-screen bg-gray-100">';
        echo '<form method="POST" action="index.php" class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">';
        echo '  <h2 class="text-2xl font-bold text-center mb-4">Iniciar Sesión</h2>';
        echo '  <div class="mb-4">';
        echo '    <label for="username" class="block text-gray-700">Username:</label>';
        echo '    <input type="text" id="username" name="username" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600">';
        echo '  </div>';
        echo '  <div class="mb-4">';
        echo '    <label for="password" class="block text-gray-700">Password:</label>';
        echo '    <input type="password" id="password" name="password" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600">';
        echo '  </div>';
        echo '  <button type="submit" class="w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700 transition-all ease">Login</button>';
        echo '  <button class=" my-2 w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700 transition-all ease">
         <a href="./pages/Register.php">Registro</a>

        </button>';
        /* hay que darle primero a post que si no no funciona el link por el metodo de $_POST */
        echo '  <input type="hidden" name="token" value="' . $_SESSION['token'] . '">';
        echo '</form>';
        echo '</div>';
    }
}
?>
</body>