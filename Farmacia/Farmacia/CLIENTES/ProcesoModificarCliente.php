<?php
$conexion = mysqli_connect('localhost','root','','farmacia');
$cedula= $_POST['cedula'];
$nombreCliente=$_POST['nombreCliente'];
$apellidoCliente=$_POST['apellidoCliente'];
$correoElectronico=$_POST['correoElectronico'];
$direccion=$_POST['direccion'];
$actualizar ="UPDATE clientes SET nombreCliente ='$nombreCliente', apellidoCliente='$apellidoCliente',correoElectronico='$correoElectronico',direccion='$direccion' WHERE cedula='$cedula'";
$resultado=mysqli_query($conexion,$actualizar);
if($resultado)
 {   
     echo "ok";
     header ("location:BuscarCliente.php");
 }
 else{
     echo("no se pudo Modificar");

 }

?>