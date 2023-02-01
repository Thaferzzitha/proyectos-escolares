<?php
  $conexion = mysqli_connect('localhost','root','','farmacia') or die("murio");
  $idcedula=$_REQUEST['cedula'];
  $sql = "DELETE from clientes WHERE cedula = '$idcedula'";

  $sqr = mysqli_query($conexion,$sql);
 if($sqr)
 {   
     header ("location:MenuClientes.php");
 }
 else{
     echo("Error al eliminar");

 }



?>