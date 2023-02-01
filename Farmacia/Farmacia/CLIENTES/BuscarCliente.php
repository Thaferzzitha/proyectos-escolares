
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
</head>
<body>
    <form action="BuscarClienteMetodo.php" method="POST">
        <label for="">Ingrese el Cedula del Cliente :</label>
        <input type="text" name="cedula" placeholder="ingrese la Cedula">
        <input type="submit" name="buscar1" value="Buscar">
       
    </form>

    <h1>Datos del Cliente</h1>

    <table border=1>
        <tr>
            <td>cedula</td>
            <td>nombre</td>
            <td>apellido</td>
            <td>correo electronico</td>
            <td>Direccion</td>
        </tr>


    
</body>
</html>