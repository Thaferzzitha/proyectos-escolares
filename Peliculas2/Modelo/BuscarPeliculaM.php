<?php
include("../Controlador/Conexion.php");
$id_pelicula = $_POST['id_pelicula'];
$peliculas = "SELECT * FROM peliculas WHERE id_pelicula = '$id_pelicula'";
$resultado = mysqli_query($conexion, $peliculas);
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
            <td class="table-primary">Id</td>
            <td class="table-primary">Titulo</td>
            <td class="table-primary">Director</td>
            <td class="table-primary">Año</td>
            <td class="table-primary">Formato</td>
            <td class="table-primary">Visionada</td>
            <td class="table-primary">Genero</td>
            <td class="table-active">Acciones</td>


        </tr>
        </thead>
        <?php
        if($resultado->num_rows > 0 ){
        while ($mostrar = mysqli_fetch_array($resultado)) {
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
                <td class="table-light"><input type="submit" class="btn btn-sample" value="Modificar" data-toggle="modal" data-target="#ModificarPeliculaModal" data-whatever="@mdo"></td>
            </tr>
        <?php
        }
    }
    else{
        echo '<script type="text/javascript">
        alert("No existe la pelicula");
        window.location.href="../Vista/MenuPeliculas.php";
        </script>';
    }  
        ?>
</div>
<div class="modal fade" id="ModificarPeliculaModal" tabindex="-1" role="dialog" aria-labelledby="ModificarPeliculaModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <h4 class="modal-title" id="ModificarPeliculaModalLabel">INGRESE LOS DATOS A MODIFICAR</h4>
                        </div>
                        <form name="ModificarPelicula" id="ModificarPelicula" action="../Modelo/ModificarPelicula.php" onsubmit="return validateForm()" method="POST">
                            <div class="modal-body">
                            <?php
                            $conexion = mysqli_connect('localhost', 'root', '', 'cine');
                            $id_pelicula = $_POST['id_pelicula'];
                            $peliculas = "SELECT * FROM peliculas WHERE id_pelicula = '$id_pelicula'";
                            $resultado = mysqli_query($conexion, $peliculas);
                            while($mostrar= mysqli_fetch_array($resultado)){
                            ?>
                                <div class="form-group">
                                <input class="form-control" type="hidden" value= <?php echo $mostrar['id_pelicula']?> name="id_pelicula">
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label">Titulo</label>
                                <br>
                                <input class="form-control" type="text" value= "<?php echo $mostrar['titulo']?>" name="titulo">
                                </div>
                                <div class="form-group">
                                
                                <label for="">Director</label>
                                            <br>
                                            <input class="form-control" type="text" value= "<?php echo $mostrar['director']?>" name="director"> 
                                </div>  
                                <div class="form-group">
                                <label for="">Año</label>
                                            <br>
                                            <select class="form-control" name="año" id="año">
                                            <?php
                                                $anio = 1900;
                                                while($anio<2022){
                                                    if($mostrar['año']==$anio){
                                                        echo "<option selected value=".$mostrar['año'].">".$mostrar['año']."</option>";
                                                        
                                                    }
                                                    else{
                                                        echo "<option value=".$anio.">".$anio."</option>";
                                                    }
                                                    $anio=$anio+1;
                                                }
                                            ?>
                                            </select>
                                </div>   
                                <div class="form-group">
                                <label for="">Formato</label>
                                            <br>
                                            <input class="form-control" type="text" value= "<?php echo $mostrar['formato']?>" name="formato"size="10">
                                </div>     
                                <div class="form-group">
                                <label for="">Visionada</label>
                                            <br>
                                            <input class="form-control" type="text" value= "<?php echo $mostrar['visionada']?>" name="visionada">
                                </div> 
                                <div class="form-group">
                                <label for="">Género</label>
                                        <br>
                                        <select class="form-control" name="id_genero" id="id_genero">;  
                                <?php
                                    $id_genero_p = $mostrar['id_genero'];
                                    $sql2 = "SELECT * FROM generos where id_genero = '$id_genero_p'";
                                    $sql3 = "SELECT * FROM generos";
                                    $result2=mysqli_query($conexion,$sql2);
                                    $result3=mysqli_query($conexion,$sql3);
                                    $mostrar2=mysqli_fetch_array($result2);
                                ?>
                                <?php
                                while ($row=mysqli_fetch_array($result3))
                                {
                                    if(strcmp($mostrar2['id_genero'],$row['id_genero'])!=0){
                                        echo "<option value=".$row['id_genero'].">".$row['nombre']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$row['id_genero']." selected>".$row['nombre']."</option>";
                                    }
                                }                        
                                ?> 
                                </select>
                                </div>  
                                </div>
                            <?php
                            }
                            ?>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-sample" data-dismiss="modal">Cerrar</button>
                                <input type="submit" class="btn btn-sample" value="Modificar">
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>