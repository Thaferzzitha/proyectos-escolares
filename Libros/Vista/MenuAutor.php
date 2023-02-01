<?php
    include("../Controlador/Conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Géneros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel='stylesheet'  href="../Css/fontello.css"/>
    <link rel='stylesheet'  href="../Css/estilo.css"/>
    <link rel="stylesheet" href="../Css/ingresoForm.css">
    <script src="../JavaScript/jquery-3.2.1.min.js"></script>
    <script>  
    function validateForm() {
    var nombre = document.forms["IngresoAutor"]["nombre"].value;
    var apellido = document.forms["IngresoAutor"]["apellido"].value;
    var edad = document.forms["IngresoAutor"]["edad"].value;
    if (nombre == "" ||  apellido == "" || edad == "") {
        alert("Existen campos vacios!!");
        return false;
    }
    }
    </script>
</head>

<header>
<div class="contenedor">
    <h1 class="icon-heart" style="font-size: 25px"> MENÚ AUTORES </h1>
    <input type="checkbox" id= "menu-bar">
    <label  class = "icon-menu " for="menu-bar"></label>
        <nav class ="menu">
                <a  href="../Index.php" >Inicio</a>
                <a href="" data-toggle="modal" data-target="#reporteLibrosModal" data-whatever="@mdo">
                    Reporte por Autor
                </a> 
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
                <table>
                    <tr>
                        <td class="table-light">
                        <button type="button" class="btn btn-sample" data-toggle="modal" data-target="#IngresarAutorModal" data-whatever="@mdo">Nuevo Autor</button>
                        </td>
                    </tr>    
                </table>       
    
    
    </section>
        </section>
    </section>

<div class="contenedor">

<table border=1  class="table table-bordered">
        <tr>
            <td class="table-primary">ID</td>
            <td class="table-primary">NOMBRE</td>
            <td class="table-primary">APELLIDO</td>
            <td class="table-primary">EDAD</td>
        </tr>
        <?php 
        $sql = "SELECT * FROM autor";
        $result=mysqli_query($conexion,$sql);

        while($mostrar=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td class="table-light"><?php echo $mostrar['idAutor'] ?> </td>
                <td class="table-light"><?php echo $mostrar['nombre'] ?> </td>
                <td class="table-light"><?php echo $mostrar['apellido'] ?> </td>
                <td class="table-light"><?php echo $mostrar['edad'] ?> </td>
            </tr>
            <?php 
        }
        ?>
    </table>
</div>
<div class="modal fade" id="reporteLibrosModal" tabindex="-1" role="dialog" aria-labelledby="reporteLibrosModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <h4 class="modal-title" id="reporteLibrosModalLabel">SELECCIONE EL GÉNERO</h4>
                        </div>
                        <form action="../Modelo/ReporteLibrosXAutor.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                <select class="btn btn-sample" name="idAutor" id="idAutor">;  
                                            <option selected>Seleccione..</option>
                                            <?php   
                                            include("../Controlador/Conexion.php");                                          
                                            $sql="SELECT * FROM autor";
                                            $result=mysqli_query($conexion,$sql);
                                            while ($row=mysqli_fetch_array($result))
                                            {
                                            echo "<option value=".$row['idAutor'].">".$row['nombre']." ".$row['apellido']."</option>";
                                            }                        
                                            ?> 
                                            </select>
                                </div>                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sample" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-sample" value="Reportar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

<!-- MODAL INGRESAR AUTOR -->

<div class="modal fade" id="IngresarAutorModal" tabindex="-1" role="dialog" aria-labelledby="IngresarAutorModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <h4 class="modal-title" id="IngresarAutorModalLabel">INGRESE LOS DATOS</h4>
                        </div>
                        <form name="IngresoAutor" id="IngresoAutor" action="../Modelo/IngresarAutor.php" onsubmit="return validateForm()" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                <label for="" class="control-label">Nombre</label>
                                <br>
                                <input class="form-control" type="text" name="nombre" id="Nombre" >
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label">Apellido</label>
                                <br>
                                <input class="form-control" type="text" name="apellido" id="apellido" >
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label">Edad</label>
                                <br>
                                <input class="form-control" type="number" min="1" max="100" name="edad" id="edad" >
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sample" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-sample" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</body>
</html>