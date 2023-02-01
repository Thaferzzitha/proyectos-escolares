<?php
$conexion=mysqli_connect('localhost','root','','farmacia');
echo "error en la conexion de la base de datos";
$cedula=$_POST['cedula'];
$nombreCliente=$_POST['nombreCliente'];
$apellidoCliente=$_POST['apellidoCliente'];
$correoElectronico=$_POST['correoElectronico'];
$direccion=$_POST['direccion'];

  
    $sql="INSERT into clientes(cedula,nombreCliente,apellidoCliente,correoElectronico,direccion) values ('$cedula','$nombreCliente','$apellidoCliente','$correoElectronico','$direccion')";
    echo mysqli_query($conexion,$sql);
 


?>