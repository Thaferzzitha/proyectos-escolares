<?php
$conexion = mysqli_connect('localhost','root','','farmacia');
$idprod= $_POST['id'];
$nombreprod=$_POST['nombre'];
$stockprod=$_POST['stock'];
$precioprod=$_POST['precio'];
$fechaprod=$_POST['fecha'];
$actualizar ="UPDATE productos SET nombreprod='$nombreprod', stockprod='$stockprod',precioprod='$precioprod',fechaprod='$fechaprod' WHERE Idprod='$idprod'";
$resultado=mysqli_query($conexion,$actualizar);
if($resultado)
 {   
     echo "ok";
     header ("location:mostrarprod.php");
 }
 else{
     echo("no se pudo insertar");

 }
?>