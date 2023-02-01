<?php
    $conexion = mysqli_connect('localhost','root','','farmacia');
    echo "error";
    $idprod=$_POST['id'];
    $nombreprod=$_POST['nombre'];
    $stockprod=$_POST['stock'];
    $precioprod=$_POST['precio'];
    $fechaprod=$_POST['fecha'];
    

    $sql="INSERT into productos(Idprod,nombreprod,stockprod,precioprod,fechaprod) values ('$idprod','$nombreprod','$stockprod','$precioprod','$fechaprod')";
    echo mysqli_query($conexion,$sql);
?>