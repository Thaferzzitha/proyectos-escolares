<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel='stylesheet'  href="Css/fontello.css"/>
    <link rel='stylesheet'  href="Css/estilo.css"/>
    <script src="JavaScript/jquery-3.2.1.min.js"></script>
</head>

<header>
<div class="contenedor">
    <h1 class="icon-heart"> Menú Libros</h1>
    <input type="checkbox" id= "menu-bar">
    <label  class = "icon-menu " for="menu-bar"></label>
        <nav class ="menu">
        <a  href="./Vista/MenuAutor.php" >AUTORES</a>
        <a  href="./Vista/MenuLibro.php" >LIBROS</a>
                
        </nav>
    </div>

</header>
<body>
<main>
    <section id="banner">
        <div class="slider-portada">
            <ul>
                <li><img src="Imagenes/Portada_1.jpg" alt=""></li>           
                <li><img src="Imagenes/Portada_2.jpg" alt=""></li>
                <li><img src="Imagenes/Portada_3.jpg" alt=""></li>
                <li><img src="Imagenes/Portada_4.jpg" alt=""></li>
            </ul>
        </div>
        
        <div class="contenedor">
    </div>
    </section>
    <section id="bienvenidos">
        <section class="about contenedor" id="bienvenidos">
            <h2 class="subtitulo" id="qs">Ejercicio</h2>
            <div class="contenedor-leyenda">
                <img id="imagen_qs" src="Imagenes/inicio2.jpg" alt=""  class="imagen-leyenda">             
                <div class="checklist-leyenda" id="leyenda">
                    <div class="leyenda" id="leyenda">
                        <h3 class="n-leyenda"><span class="letra"></span>Objetivo</h3>
                        <p>Realizar un programa que permita el ingreso de películas y generos de la película en donde, se puede modificar los datos de las películas.
                        </p>
                    </div>                 
                </div>
            </div>
        </section>
    </section>
</main>
<footer id="contacto">
    <div class="contenedor footer-content">
        <div class="contact-us">
            <h2 class="brand">ESPOCH</h2>
            <h3>Facultad de Informática y Electrónica</h3>
            <h3>Carrera de Software</h3>
            <h3>Aplicaciones Informáticas</h3>
        </div>
        
        <div class="social-media">
            <a href="https://www.facebook.com/thaferzzitha.bebitatkd" target="_blank" class="social-media-icon">
                <i class='icon-facebook' ></i>
            </a>
            <a href="https://www.instagram.com/thaferzzitha/?hl=es" target="blank" class="social-media-icon">
                <i class='icon-instagram' ></i>
            </a>
            
        </div>
    </div>

    <div class="line"></div>
    <div class="creditos">
        <h2 class="subtitulo">&copy; Desarrollado por: Thalía Zárate (6560) </h2> 
    </div>     
</footer>  
</body>
</html>