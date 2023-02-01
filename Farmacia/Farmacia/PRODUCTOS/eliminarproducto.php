<?php
  $conexion = mysqli_connect('localhost','root','','farmacia');
  $idpro=$_REQUEST['id'];
  $sql= "DELETE from productos WHERE Idprod= $idpro";
  $sqr=mysqli_query($conexion,$sql);
 if($sqr)
 {   
     header ("location:index.php");
 }
 else{
     echo("Error al eliminar");

 }



?>