<?php
include("../Controlador/Conexion.php");
$nombre=strtoupper($_POST['nombre']);
$apellido=strtoupper($_POST['apellido']);
$edad=$_POST['edad'];

$sql="INSERT into autor(nombre, apellido, edad) values ('$nombre', '$apellido', '$edad')";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado)
 {   
    echo '<script type="text/javascript">
    alert("Autor Registrado");
    window.location.href="../Vista/MenuAutor.php";
    </script>';
 }
 else{
    echo '<script type="text/javascript">
    alert("No se pudo registrar el Autor!!!");
    window.location.href="../Modelo/MenuAutor";
    </script>';

 }

?>