<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../CSS/Edi.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Document</title>
</head>
<body>



<?php


if(isset($_POST['enviar'])){
$id = $_POST['id'];
$nombre= $_POST['nombre'];
$nlista= $_POST['nlista'];
$telefono= $_POST['tel'];
$ciudad= $_POST['ciu'];


$sql ="update alumnos set Nombre='".$nombre."',Nlista='".$nlista."',Telefono='".$telefono."',Ciudad = '".$ciudad."' where id ='".$id."'";
$relsultado=mysqli_query($conexion,$sql);
if($relsultado){
echo "<script language ='Javascript'>alert ('Los datos se actualizaron correctamente');
location.assign('Index.php');
</script>";
}else{
    echo "<script language ='Javascript'>alert ('Error de codificacion');
    location.assign('Index.php');
    </script>";
}

mysqli_close($conexion);
}else{

$id=$_GET['id'];
$sql="select * from alumnos where id='".$id."'";
$relsultado = mysqli_query($conexion,$sql);
$fila=mysqli_fetch_assoc($relsultado);
$nombre=$fila["Nombre"];
$nlista=$fila["NLista"];
$telefono=$fila["Telefono"];
$ciudad=$fila["Ciudad"];
mysqli_close($conexion);



?>



<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
<h2>Editor de datos</h2>
<div class="inputs">
<input type="text" name="nombre" value="<?php echo $nombre; ?>">
<span><i class='bx bx-user' ></i></span>

</div>

<div class="inputs">

<input type="text" name="nlista" value="<?php echo $nlista; ?>">
<span><i class='bx bx-list-plus' ></i></span>
</div>

<div class="inputs">

<input type="text" name="tel" value="<?php echo $telefono; ?>">
<span><i class='bx bxs-phone' ></i></span>

</div>

<div class="inputs">

<input type="text" name="ciu" value="<?php echo $ciudad; ?>">
<span><i class='bx bx-building-house' ></i></span>

</div>

<div class="inputs">

<input type="hidden" name="id" value="<?php echo $id; ?>">

</div>



<input type="submit" name="enviar" value="Actualizar" class="inputss">


<a href="Index.php" class="reg">Regresar</a>

</form>     
<?php

}
?>


</body>
</html>