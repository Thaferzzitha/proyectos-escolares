<?php
include("../Controlador/Conexion.php");
$id_libro= $_POST['idLibro'];
$libros = "SELECT * FROM libro WHERE idLibro = '$id_libro'";
$resultado = mysqli_query($conexion, $libros);
//esto de arriba es la conexxion a la bd
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Buscar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Css/ingresoForm.css">
    <link rel='stylesheet'  href="../Css/fontello.css"/>
    <link rel='stylesheet'  href="../Css/estilo.css"/>
    <script src="../JavaScript/jquery-3.2.1.min.js"></script>
    <script src="../JavaScript/MensajeSeguridad.js"></script>
</head>

<header>
<div class="contenedor">
    <h1 class="icon-heart" style="font-size: 25px"> Buscar </h1>
    <input type="checkbox" id= "menu-bar">
    <label  class = "icon-menu " for="menu-bar"></label>
        <nav class ="menu">
                <a  href="../Index.php" >Inicio</a>
        </nav>
    </div>
</header>
<body>

<body>
<section id="Ejercicio_4">
        <section id="ejercicio">
            <section class="about contenedor" id="ejercicio">
                <br>
                <br>
                <br>
                <form action="BuscarM.php" method="POST">
                    <label for="">Datos Encontrados</label>
    </form>
    </section>
        </section>
    </section>

<div class="container">
    <table border=1  class="table table-bordered">
        <thead>
        <tr>
            <td class="table-primary">ID</td>
            <td class="table-primary">NOMBRE</td>
            <td class="table-primary">DESCRIPCION</td>
            <td class="table-primary">No PÁGINAS</td>
            <td class="table-primary">AUTOR</td>


        </tr>
        </thead>
        <?php
        if($resultado->num_rows > 0 ){
        while ($mostrar = mysqli_fetch_array($resultado)) {
            $id_autor_l = $mostrar['Autor_idAutor'];
            $sql2 = "SELECT * FROM autor where idAutor = '$id_autor_l'";
            $result2=mysqli_query($conexion,$sql2);
            $mostrar2=mysqli_fetch_array($result2);
        ?>
            <tr>
            
                <td class="table-light"><?php echo $mostrar['idLibro'] ?> </td>
                <td class="table-light"><?php echo $mostrar['nombre'] ?> </td>
                <td class="table-light"><?php echo $mostrar['descripcion'] ?> </td>
                <td class="table-light"><?php echo $mostrar['nro_paginas'] ?> </td>
                <td class="table-light"><?php echo $mostrar2['nombre'] . " " . $mostrar2['apellido'] ?> </td>   
                <td class="table-light">
                    <form action="../Modelo/EliminarLibro.php" onsubmit="return confirmarEliminar()" method="POST">
                    <input type="hidden" name="idLibro" id="idLibro" value="<?php echo $mostrar['idLibro'] ?>">
                    <input type="submit" class="btn btn-sample" value="Eliminar">
                    </form>  
                </td>                                          
            </tr>
        <?php
        }
    }
    else{
        echo '<script type="text/javascript">
        alert("No existe la pelicula");
        window.location.href="../Vista/MenuLibro.php";
        </script>';
    }  
        ?>
</div>
</body>
</html>