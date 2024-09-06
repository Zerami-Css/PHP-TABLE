


<?php
$id=$_GET['id'];
include("conexion.php");

$sql="delete from alumnos where id='".$id."'";
$relsultado=mysqli_query($conexion,$sql);

if($relsultado){

    echo"<script languaje='JavaScript'>
    alert('Los datos se eliminaron correctamente de la Base de Datos');
    location.assign('Tabla.php');
    </script>";
}
else{
    echo "<script languaje='JavaScript'>
    alert('Los datos no se eliminaron de la Base de Datos');
    location.assign('Index.php');
    </script>";

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<script type="text/javascript">
function confirmar(){
    return confirm('Estas seguro? se eliminiran los datos de la base de datos');
}
    
    </script>


</body>
</html>