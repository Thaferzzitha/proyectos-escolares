<?php
$conexion = mysqli_connect('localhost','root','','farmacia');
$id=$_GET['id'];
$producto="SELECT * FROM productos WHERE Idprod = '$id'";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificación</title>
</head>
<body>
<form action="modificarproducto.php" method="POST">

    <h1>Producto a editar</h1>
    <br>
     <table border="1">
     <tr>
          <td> Id Producto</td>
          <td>Nombre</td>
          <td>Stock</td>
          <td>Precio</td>
          <td>Fecha</td>
          <td>Editar</td>
      </tr>
      </form>
</body>
</html>

<?php

$resultado=mysqli_query($conexion,$producto);
while($mostrar= mysqli_fetch_array($resultado)){
    ?>
    <tr>
  <td><input type="hidden" value= <?php echo $mostrar['Idprod']?> name="id"> 
  <td><input type="text" value= <?php echo $mostrar['nombreprod']?> name="nombre">
  <td><input type="text" value= <?php echo $mostrar['stockprod']?> name="stock"> 
  <td><input type="text" value= <?php echo $mostrar['precioprod']?> name="precio"> 
  <td><input type="text" value= <?php echo $mostrar['fechaprod']?> name="fecha"> 

  <td><input type="submit" value="Editar"></td> 
  </td>
 </tr>
 <?php

}
mysqli_free_result($resultado);

?>

