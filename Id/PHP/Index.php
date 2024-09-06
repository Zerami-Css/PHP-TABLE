
<link rel="stylesheet" href="../CSS/Regis.css">
<?php
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // No cifrar la contraseña (no recomendado para producción)
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php");
    } else {
        echo "Error al registrar.";
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
    <button type="submit">Registrar</button>
    <a href="login.php">Ya tienes cuenta?</a>
</form>
