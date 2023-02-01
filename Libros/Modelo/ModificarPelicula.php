<?php
include("../Controlador/Conexion.php");
$id_pelicula= $_POST['id_pelicula'];
$titulo=$_POST['titulo'];
$director=$_POST['director'];
$año=$_POST['año'];
$formato=$_POST['formato'];
$visionada=$_POST['visionada'];
$id_genero=$_POST['id_genero'];
$actualizar ="UPDATE peliculas SET titulo='$titulo', director='$director',año='$año',formato='$formato',visionada='$visionada',id_genero='$id_genero' WHERE id_pelicula='$id_pelicula'";
$resultado=mysqli_query($conexion,$actualizar);
if($resultado)
 {   
    echo '<script type="text/javascript">
    alert("Pelicula Actualizada");
    window.location.href="../Vista/MenuPeliculas.php";
    </script>';
 }
 else{
    echo '<script type="text/javascript">
    alert("No se pudo actualizar la Pelicula!!!");
    window.location.href="../Vista/MenuPeliculas.php";
    </script>';
 }
?>