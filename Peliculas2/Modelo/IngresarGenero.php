<?php
include("../Controlador/Conexion.php");
$nombre=strtoupper($_POST['nombre']);

$sql="INSERT into generos(nombre) values ('$nombre')";
    $resultado = mysqli_query($conexion,$sql);

    if($resultado)
 {   
    echo '<script type="text/javascript">
    alert("Genero Registrado");
    window.location.href="../Vista/MenuGenero.php";
    </script>';
 }
 else{
    echo '<script type="text/javascript">
    alert("No se pudo registrar el Genero!!!");
    window.location.href="../Modelo/IngresarPelicula";
    </script>';

 }

?>