
<?php
class LoginView {
    public function mostrarLogin() {
        echo '<form method="POST" action="index.php">';
        echo '  <label for="username">Username:</label>';
        echo '  <input type="text" id="username" name="username">';
        echo '  <label for="password">Password:</label>';
        echo '  <input type="password" id="password" name="password">';
        echo '  <button type="submit">Login</button>';
        echo '</form>';
    }
}
?>
