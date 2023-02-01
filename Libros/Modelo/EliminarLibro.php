<?php
include("../Controlador/Conexion.php");
    $idLibro=$_POST['idLibro'];
    $sql= "DELETE from libro WHERE idLibro= $idLibro";
    $sqr=mysqli_query($conexion,$sql);
    if($sqr)
    {   
       echo '<script type="text/javascript">
       alert("Libro Eliminado");
       window.location.href="../Vista/MenuLibro.php";
       </script>';
    }
    else{
       echo '<script type="text/javascript">
       alert("No se pudo Eliminar el Libro!!!");
       window.location.href="../Vista/MenuLibro.php";
       </script>';
   
    }
?>