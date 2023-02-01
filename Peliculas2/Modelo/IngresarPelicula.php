<?php
include("../Controlador/Conexion.php");
$titulo=strtoupper($_POST['titulo']);
$director=strtoupper($_POST['director']);
$año=$_POST['año'];
$formato=strtoupper($_POST['formato']);
$visionada=strtoupper($_POST['visionada']);
$id_genero=$_POST['id_genero'];
$sql="INSERT into peliculas(titulo,director,año,formato,visionada,id_genero) values ('$titulo','$director','$año','$formato','$visionada','$id_genero')";
$resultado = mysqli_query($conexion,$sql);


if($resultado)
 {   
    echo '<script type="text/javascript">
    alert("Pelicula Registrada");
    window.location.href="../Vista/MenuPeliculas.php";
    </script>';
 }
 else{
    echo '<script type="text/javascript">
    alert("No se pudo registrar la Pelicula!!!");
    window.location.href="../Modelo/MenuPeliculas.php";
    </script>';
 }
?>