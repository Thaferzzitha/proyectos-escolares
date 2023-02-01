<?php
    $conexion = mysqli_connect('localhost','root','','farmacia');
    $id=$_POST['id'];
    $usuario="SELECT * FROM productos WHERE Idprod = '$id'";
    $resultado = mysqli_query($conexion,$usuario);
    //esto de arriba es la conexxion a la bd
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos buscado</title>
</head>
<body>
    <h1>Datos del estudiante</h1>
    <table border = 1>
      <tr>
          <td> Id Producto</td>
          <td>Nombre</td>
          <td>Stock</td>
          <td>Precio</td>        
          <td>Fecha</td>    
          <td>Eliminar</td>
          <td>Editar</td>
      </tr> 
      
    <?php  
      while($mostrar= mysqli_fetch_array($resultado)){
        ?>
        <tr>
            <td><?php echo $mostrar['Idprod']?> </td>
            <td><?php echo $mostrar['nombreprod']?> </td>
            <td><?php echo $mostrar['stockprod']?> </td>
            <td><?php echo $mostrar['precioprod']?>  </td>
            <td><?php echo $mostrar['fechaprod']?>  </td>
            <td><a href="eliminarproducto.php?id=<?php echo $mostrar['Idprod']?>" class="btn btn-danger btn-sm" onclick ="return confirmar()">Eliminar</a></td>
            <td><a href="modificar.php?id=<?php echo $mostrar['Idprod']?>">Modificar</a></td>
        </tr>
     
     <?php
    
    }
?>
<script type ="text/javascript">
 function confirmar(){
 if(confirm("Quiere eliminar?")){
    return true;

 }
 else
 return false;
 }
</script>
</body>
</html>