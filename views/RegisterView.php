
<?php
class mostrarRegistro {
    public function mostrarRegistro() {
        echo '<form method="POST" action="register.php">';
        echo '  <label for="username">Username:</label>';
        echo '  <input type="text" id="username" name="username">';
        echo '<br/>';
        echo '  <label for="apellido1">Apellido 1:</label>';
        echo '  <input type="text" id="apellido1" name="apellido1">';
        echo '<br/>';
        echo '  <label for="apellido2">Apellido 2:</label>';
        echo '  <input type="text" id="apellido2" name="apellido2">';
        echo '<br/>';
        echo '  <label for="email">Email:</label>';
        echo '  <input type="email" id="email" name="email">';
        echo '<br/>';
        echo '  <label for="password">Password:</label>';
        echo '  <input type="password" id="password" name="password">';
        echo '  <button type="submit">Register</button>';
        echo '</form>';
    }
}
?>
