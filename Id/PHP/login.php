<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar el usuario y obtener su contraseña en texto claro
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $user_id, $hashed_password);
    mysqli_stmt_fetch($stmt);

    // Comparar contraseñas en texto claro
    if ($password === $hashed_password) {
        $_SESSION['user_id'] = $user_id;

        header("Location: Tabla.php");
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }
}
?>

<form method="post">
    <label for="username">Nombre de Usuario:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Contraseña:</label>
    <input type="text" id="password" name="password" required>
    <br>
    <button type="submit">Iniciar Sesión</button>
    <a href="Index.php">Aun no tienes cuenta?</a>
</form>
