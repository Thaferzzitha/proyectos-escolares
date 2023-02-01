<?php
$conexion = mysqli_connect('localhost','root','','farmacia');
$cedula=$_GET['cedula'];
$clientes="SELECT * FROM clientes WHERE cedula = '$cedula'";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="ProcesoModificarCliente.php" method="POST">
    <h1>DATOS DE LA PERSONA A EDITAR</h1>
    <br>
     <table border="1">
     <tr>
          <td>cedula</td>
          <td>nombreCliente</td>
          <td>apellidoCliente</td>
          <td>correoElectronico</td>
          <td>direccion</td>
          <td>Editar</td>
      </tr>
      </form>
</body>
</html>

<?php

$resultado=mysqli_query($conexion,$clientes);
while($mostrar= mysqli_fetch_array($resultado)){
    ?>
    <tr>
  <td><input type="hidden" enabled="false" value= <?php echo $mostrar['cedula']?> name="cedula"> 
  <td><input type="text" value= <?php echo $mostrar['nombreCliente']?> name="nombreCliente">
  <td><input type="text" value= <?php echo $mostrar['apellidoCliente']?> name="apellidoCliente"> 
  <td><input type="text" value= <?php echo $mostrar['correoElectronico']?> name="correoElectronico"> 
  <td><input type="text" value= <?php echo $mostrar['direccion']?> name="direccion"> 
  <td><input type="submit" value="editar"></td> 
  </td>
 </tr>
 <?php

}
mysqli_free_result($resultado);
?>
