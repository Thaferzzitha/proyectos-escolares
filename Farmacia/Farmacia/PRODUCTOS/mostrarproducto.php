<?php
 $conexion = mysqli_connect('localhost','root','','farmacia');
 $sql="SELECT *from productos";
 $result=mysqli_query($conexion,$sql);
 while($mostrar= mysqli_fetch_array($result)){
   ?>
   <tr>
    <td><?php echo $mostrar['Idprod']?></td>
    <td><?php echo $mostrar['nombreprod']?></td>
    <td><?php echo $mostrar['stockprod']?></td>
    <td><?php echo $mostrar['precioprod']?></td>
    <td><?php echo $mostrar['fechaprod']?></td>
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