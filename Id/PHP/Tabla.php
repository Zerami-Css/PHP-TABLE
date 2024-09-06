<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM alumnos WHERE user_id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

// Obtener la contraseña del usuario
$sql = "SELECT password FROM users WHERE id = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, 'i', $user_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $user_password);
mysqli_stmt_fetch($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumnos</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<style>
body{
    background: url(https://th.bing.com/th/id/OIP.G7FNBeOwyOV1-TgzIv1D5QHaE6?rs=1&pid=ImgDetMain);
    background-repeat: no-repeat;
    background-size: cover;
}

td a{
    
    text-align: left;
}

    td{
        color: black;
text-align: center;
    }
td , th{

    padding: 12px;
}
tr{
    transition: all ease 300ms;
}

tr:hover{

background-color: #1f5569;
color: white;
}

tr:active{

background-color: #092935;
color: white;
}

table{
    font-family: 'Courier New', Courier, monospace;
    width: 70%;
    cursor: pointer;
    border-collapse: collapse;
}
table thead{
    background-color: #092935;
    color: white;
    border: 1px solid black;
}

table tbody{
    background-color: #d0e9fc;
    color: white;
    border: 1px solid black;
}

table i{
    margin: -1px 5px;
    padding: 8px 8px;
border-radius: 10px;
    background: orange;
    color: white;
}

table i:hover{
    transition: .5s ease;
transform: translateY(-10px);
    color: white;
}


.col a{
    display: block;
    text-align: center;
    width: 15%;
    border-radius: 10px;
    border: 2px solid black;
    margin: 0 10px;
text-decoration: none;
padding: 7px;
color: white;
font-size: 20px;
background: linear-gradient(90deg, rgb(231, 8, 8) 25%, rgb(245, 90, 1) 100%);
box-shadow: 0 0 20px rgba(192, 203, 251, 0.7);;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;


}

.col h1{
    font-size: 50px;
margin-left:20px;
color: chocolate;    
}

img{
    
    height: 40%;
    width: 50%;
}</style>

<img src="https://th.bing.com/th/id/R.30c4968ffea1d2d6116bf0b795d5a81e?rik=6bvFHN5bI4d8tQ&pid=ImgRaw&r=0" alt="">

<div class="col">
  
    <a href="agregarr.php"><i class='bx bx-book-add'></i>Nuevo</a><br><br>
</div>
<table border>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Nlista</th>
            <th>Numero</th>
            <th>Ciudad</th>
            <th>Configuracion</th>
        </tr>
    </thead>
    <tbody>
    <?php while($filas = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo htmlspecialchars($filas['Nombre']); ?></td>
            <td><?php echo htmlspecialchars($filas['NLista']); ?></td>
            <td><?php echo htmlspecialchars($filas['Telefono']); ?></td>
            <td><?php echo htmlspecialchars($filas['Ciudad']); ?></td>
            <td>
                <a href ='editar.php?id=<?php echo $filas['id']; ?>'><i class='bx bx-message-square-edit'></i></a>
                <a href ='eliminar.php?id=<?php echo $filas['id']; ?>' onclick='return confirmar()'><i class='bx bxs-trash-alt'></i></a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
<?php mysqli_close($conexion); ?>
</body>
</html>
