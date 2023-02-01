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
    var nombre = document.forms["IngresoLibro"]["nombre"].value;
    var descripcion = document.forms["IngresoLibro"]["descripcion"].value;
    var paginas = document.forms["IngresoLibro"]["nro_paginas"].value;
    var autor = document.forms["IngresoLibro"]["Autor_idAutor"].value;
    if (nombre == "" ||  descripcion == "" || paginas == "" || autor == "Escoja un Autor..") {
        alert("Existen campos vacios!!");
        return false;
    }
    }
    </script>
</head>

<header>
<div class="contenedor">
    <h1 class="icon-heart" style="font-size: 25px"> MENÚ LIBROS </h1>
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
                <table>
                    <tr>
                    <td width="1%"><form action="../Modelo/BuscarLibroM.php" method="POST">
                    <select class="btn btn-sample" name="idLibro" id="idLibro">;  
                                            <option selected>Seleccione un Libro..</option>
                                            <?php                                             
                                            $sql="SELECT * FROM libro";
                                            $result=mysqli_query($conexion,$sql);
                                            while ($row=mysqli_fetch_array($result))
                                            {
                                            echo "<option value=".$row['idLibro'].">".$row['nombre']."</option>";
                                            }                        
                                            ?> 
                                            </select>
                            <input type="submit" class="btn btn-sample" name="buscarLibro" value="Buscar"> 
                        </form></td>
                        <td width="1%">
                        <button type="button" class="btn btn-sample" data-toggle="modal" data-target="#IngresarLibroModal" data-whatever="@mdo">Nuevo Libro</button>
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
            <td class="table-primary">Nombre</td>
            <td class="table-primary">Descripción</td>
            <td class="table-primary">Páginas</td>
            <td class="table-primary">Autor</td>
        </tr>
        <?php 
        $sql = "SELECT * FROM libro";
        
        $result=mysqli_query($conexion,$sql);
        

        while($mostrar=mysqli_fetch_array($result)){
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
                <td class="table-light"><?php echo $mostrar2['nombre']." ".$mostrar2['apellido'] ?> </td>
            </tr>
            
            <?php 
        }
        ?>
    </table>
      
</div>
            <!-- MODAL INGRESAR LIBRO -->

            <div class="modal fade" id="IngresarLibroModal" tabindex="-1" role="dialog" aria-labelledby="IngresarLibroModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">                            
                            <h4 class="modal-title" id="IngresarLibroModalLabel">INGRESE LOS DATOS</h4>
                        </div>
                        <form name="IngresoLibro" id="IngresoLibro" action="../Modelo/IngresarLibro.php" onsubmit="return validateForm()" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                <label for="" class="control-label">Nombre</label>
                                <input class="form-control" type="text" name="nombre" id="nombre"  >
                                </div>
                                <div class="form-group">
                                <label for="">Descripción</label>
                                            <br>
                                            <input class="form-control" type="text" name="descripcion" id="descripcion" >
                                </div>  
                                <div class="form-group">
                                <label for="">No de Páginas</label>
                                            <br>
                                            <input class="form-control" type="number" min="1" name="nro_paginas" id="nro_paginas">
                                </div>                                   
                                <div class="form-group">
                                <label for="">Autor</label>
                                        <br>
                                            <select class="form-control" name="Autor_idAutor" id="Autor_idAutor">;  
                                            <option selected>Escoja un Autor..</option>
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
                                <input type="submit" class="btn btn-sample" value="Guardar">
                             </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>