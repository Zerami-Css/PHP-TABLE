<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $nlista = $_POST['nlista'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];

    $sql = "INSERT INTO alumnos (Nombre, NLista, Telefono, Ciudad, user_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'sissi', $nombre, $nlista, $telefono, $ciudad, $user_id);
    if (mysqli_stmt_execute($stmt)) {
        header("Location: Tabla.php");
    } else {
        echo "Error al agregar el alumno.";
    }
}
?>

<form method="post">
    <link rel="stylesheet" href="../CSS/Agre.css">
    <div class="inputs">

    <input type="text" id="nombre" name="nombre" required placeholder="Nombre">
    <span><i class='bx bx-user' ></i></span>
    </div>
    <br>
    <div class="inputs">

    <input type="number" id="nlista" name="nlista" required placeholder="Numero de lista">
    <span><i class='bx bx-list-plus' ></i></span>
    </div>
    <br>
    <div class="inputs">

    <input type="text" id="telefono" name="telefono" placeholder="Telefono">
    <span><i class='bx bxs-phone' ></i></span>
    </div>
    <br>
    <div class="inputs">
    <input type="text" id="ciudad" name="ciudad" placeholder="Ciudad">
    <span><i class='bx bx-building-house' ></i></span>
    </div>
    <br>
<div class="inputss">
    <button type="submit">Agregar</button>
</div>
<div class="reg">
    <a href="Tabla.php"></a>
</div>
</form>
