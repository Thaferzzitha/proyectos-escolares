<?php
include("../Controlador/Conexion.php");
$nombre=strtoupper($_POST['nombre']);
$descripcion=strtoupper($_POST['descripcion']);
$nro_paginas=$_POST['nro_paginas'];
$Autor_idAutor=$_POST['Autor_idAutor'];
$sql="INSERT into libro(nombre,descripcion,nro_paginas,Autor_idAutor) values ('$nombre','$descripcion','$nro_paginas', '$Autor_idAutor')";
$resultado = mysqli_query($conexion,$sql);


if($resultado)
 {   
    echo '<script type="text/javascript">
    alert("Libro Registrado");
    window.location.href="../Vista/MenuLibro.php";
    </script>';
 }
 else{
    echo '<script type="text/javascript">
    alert("No se pudo registrar el Libro!!!");
    window.location.href="../Vista/MenuLibro.php";
    </script>';
 }
?>