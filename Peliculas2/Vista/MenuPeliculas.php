<?php
include("../Controlador/Conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Películas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel='stylesheet'  href="../Css/estilo.css">
    <link rel='stylesheet'  href="../Css/fontello.css"/>
    <link rel="stylesheet" href="../Css/ingresoForm.css">
    <script src="../JavaScript/jquery-3.2.1.min.js"></script>

    <script>  
    function validateForm() {
    var pelicula = document.forms["IngresoPelicula"]["titulo"].value;
    var director = document.forms["IngresoPelicula"]["director"].value;
    var año = document.forms["IngresoPelicula"]["año"].value;
    var formato = document.forms["IngresoPelicula"]["formato"].value;
    var visionada = document.forms["IngresoPelicula"]["visionada"].value;
    if (pelicula == "" ||  director == "" || año == "" || formato == "" || visionada == "") {
        alert("Existen campos vacios!!");
        return false;
    }
    }
    </script>
</head>

<header>
<div class="contenedor">
    <h1 class="icon-heart" style="font-size: 25px"> MENÚ PELÍCULAS </h1>
    <input type="checkbox" id= "menu-bar">
    <label  class = "icon-menu " for="menu-bar"></label>
        <nav class ="menu">
                <a  href="../Index.php" >Inicio</a>
                <a href="../Modelo/ReportePeliculas.php">
                <form action="../Modelo/ReportePeliculas.php"  method="POST"></form>
                        Reporte Total
                </a>
                <a href="../Modelo/ReportePeliculasBisiesto.php">
                <form action="../Modelo/ReportePeliculasBisiesto.php"  method="POST"></form>
                Reporte Bisiesto
                </a>
                <a href="" data-toggle="modal" data-target="#reporteGeneroModal" data-whatever="@mdo">
                    Reporte por Género
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
                    <td width="1%"><form action="../Modelo/BuscarPeliculaM.php" method="POST">
                    <select class="btn btn-sample" name="id_pelicula" id="id_pelicula">;  
                                            <option selected>Seleccione una pelicula..</option>
                                            <?php   
                                            $conexion=mysqli_connect('localhost','root','','cine');                                           
                                            $sql="SELECT * FROM peliculas";
                                            $result=mysqli_query($conexion,$sql);
                                            while ($row=mysqli_fetch_array($result))
                                            {
                                            echo "<option value=".$row['id_pelicula'].">".$row['titulo']."</option>";
                                            }                        
                                            ?> 
                                            </select>
                            <input type="submit" class="btn btn-sample" name="buscarPelicula" value="Buscar"> 
                        </form></td>
                        <td width="1%">
                        <button type="button" class="btn btn-sample" data-toggle="modal" data-target="#IngresarPeliculaModal" data-whatever="@mdo">Nueva Pelicula</button>
                        </td>
                    </tr>    
                </table>       
    
    
    </section>
        </section>
    </section>

<div class="contenedor">

    <table border=1  class="table table-bordered">
        <tr>
            <td class="table-primary">Id</td>
            <td class="table-primary">Titulo</td>
            <td class="table-primary">Director</td>
            <td class="table-primary">Año</td>
            <td class="table-primary">Formato</td>
            <td class="table-primary">Visionada</td>
            <td class="table-primary">Genero</td>
        </tr>
        <?php 
        $sql = "SELECT * FROM peliculas";
        
        $result=mysqli_query($conexion,$sql);
        

        while($mostrar=mysqli_fetch_array($result)){
            $id_genero_p = $mostrar['id_genero'];
            $sql2 = "SELECT * FROM generos where id_genero = '$id_genero_p'";
            $result2=mysqli_query($conexion,$sql2);
            $mostrar2=mysqli_fetch_array($result2);
            ?>
            <tr>
                <td class="table-light"><?php echo $mostrar['id_pelicula'] ?> </td>
                <td class="table-light"><?php echo $mostrar['titulo'] ?> </td>
                <td class="table-light"><?php echo $mostrar['director'] ?> </td>
                <td class="table-light"><?php echo $mostrar['año'] ?> </td>
                <td class="table-light"><?php echo $mostrar['formato'] ?> </td>
                <td class="table-light"><?php echo $mostrar['visionada'] ?> </td>
                <td class="table-light"><?php echo $mostrar2['nombre'] ?> </td>
            </tr>
            
            <?php 
        }
        ?>
    </table>
      
</div>

<div class="modal fade" id="reporteGeneroModal" tabindex="-1" role="dialog" aria-labelledby="reporteGeneroModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                            <h4 class="modal-title" id="reporteGeneroModalLabel">SELECCIONE EL GÉNERO</h4>
                        </div>
                        <form action="../Modelo/ReportePeliculasXGenero.php" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                <select class="btn btn-sample" name="id_genero" id="id_genero">;  
                                            <option selected>Seleccione..</option>
                                            <?php   
                                            $conexion=mysqli_connect('localhost','root','','cine');                                           
                                            $sql="SELECT * FROM generos";
                                            $result=mysqli_query($conexion,$sql);
                                            while ($row=mysqli_fetch_array($result))
                                            {
                                            echo "<option value=".$row['id_genero'].">".$row['nombre']."</option>";
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

            <!-- MODAL INGRESAR PELICULA -->

            <div class="modal fade" id="IngresarPeliculaModal" tabindex="-1" role="dialog" aria-labelledby="IngresarPeliculaModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <h4 class="modal-title" id="IngresarPeliculaModalLabel">INGRESE LOS DATOS</h4>
                        </div>
                        <form name="IngresoPelicula" id="IngresoPelicula" action="../Modelo/IngresarPelicula.php" onsubmit="return validateForm()" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                <label for="" class="control-label">Titulo</label>
                                <input class="form-control" type="text" name="titulo" id="titulo"  >
                                </div>
                                <div class="form-group">
                                <label for="">Director</label>
                                            <br>
                                            <input class="form-control" type="text" name="director" id="director" >
                                </div>  
                                <div class="form-group">
                                <label for="">Año</label>
                                            <br>
                                            <select class="form-control" name="año" id="año">
                                            <?php 
                                                $anio = 1900;
                                                while($anio<2022){
                                                    if($anio!=2021){
                                                        echo "<option value=".$anio.">".$anio."</option>";
                                                    }
                                                    else{
                                                        echo "<option selected value=".$anio.">".$anio."</option>";
                                                    }
                                                    $anio=$anio+1;
                                                }
                                            ?>
                                            </select>
                                </div>   
                                <div class="form-group">
                                <label for="">Formato</label>
                                            <br>
                                            <input class="form-control" type="text" name="formato" id="formato" >
                                </div>     
                                <div class="form-group">
                                <label for="">Visionada</label>
                                            <br>
                                            <input class="form-control" type="text" name="visionada" id="visionada" >
                                </div> 
                                <div class="form-group">
                                <label for="">Género</label>
                                        <br>
                                            <select class="form-control" name="id_genero" id="id_genero">;  
                                            <option selected>Escoja un Genero..</option>
                                            <?php   
                                            $conexion=mysqli_connect('localhost','root','','cine');                                           
                                            $sql="SELECT * FROM generos";
                                            $result=mysqli_query($conexion,$sql);
                                            while ($row=mysqli_fetch_array($result))
                                            {
                                            echo "<option value=".$row['id_genero'].">".$row['nombre']."</option>";
                                            }                        
                                            ?> 
                                            </select>
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