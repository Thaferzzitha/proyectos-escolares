<?php
$conexion = mysqli_connect('localhost', 'root', '', 'farmacia');
$cedula = $_POST['cedula'];
$clientes = "SELECT * FROM clientes WHERE cedula = '$cedula'";
$resultado = mysqli_query($conexion, $clientes);
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
    <table border=1>
        <tr>
            <td>cedula</td>
            <td>nombre</td>
            <td>apellido</td>
            <td>correo electronico</td>
            <td>Direccion</td>
        </tr>

        <?php
        while ($mostrar = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?php echo $mostrar['cedula'] ?> </td>
                <td><?php echo $mostrar['nombreCliente'] ?> </td>
                <td><?php echo $mostrar['apellidoCliente'] ?> </td>
                <td><?php echo $mostrar['correoElectronico'] ?> </td>
                <td><?php echo $mostrar['direccion'] ?> </td>
                <td><a href="EliminarCliente.php?cedula=<?php echo $mostrar['cedula'] ?>" class="btn btn-danger btn-sm" onclick="return confirmar()">Eliminar</a></td>
                <td><a href="ModificarCliente.php?cedula=<?php echo $mostrar['cedula'] ?>">Modificar</a></td>
            </tr>

        <?php

        }
        ?>
</body>

</html>