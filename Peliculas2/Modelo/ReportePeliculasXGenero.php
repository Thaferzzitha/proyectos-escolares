<?php
include('../Vista/plantillaPeliculas.php');
$conexion=mysqli_connect('localhost','root','','cine');
$genero= $_POST['id_genero'];
$query="SELECT * FROM peliculas WHERE id_genero = '$genero'";
$query_genero= "SELECT * FROM generos WHERE id_genero = '$genero'";
$resultado=mysqli_query($conexion,$query);
$resultado2=mysqli_query($conexion,$query_genero);
$mostrar2= $resultado2->fetch_assoc();
if($resultado->num_rows > 0)
 {
        $pdf = new PDF('L'); //L para horizontal - P para vertical
        $pdf->AliasNbPages();
        $pdf->AddPage();
        
        $pdf->SetFont('Arial','B',12);
        
        $pdf->SetFillColor(210, 90, 237);
        $pdf->Cell(210,8,utf8_decode('Películas del Género ') . $mostrar2['nombre'],1,1,'C',TRUE);
        $pdf->SetFillColor(236, 179, 229);
        $pdf->Cell(10,8,'ID',1,0,'C',TRUE);
        $pdf->Cell(50,8,utf8_decode('PELÍCULA'),1,0,'C', TRUE);
        $pdf->Cell(50,8,'DIRECTOR',1,0,'C', TRUE);
        $pdf->Cell(20,8,utf8_decode('AÑO'),1,0,'C', TRUE);
        $pdf->Cell(40,8,'FORMATO',1,0,'C', TRUE);
        $pdf->Cell(40,8,'VISIONADA',1,1,'C', TRUE);
        
        $pdf->SetFont('Arial','',12);
        
        while($mostrar= $resultado->fetch_assoc()){
                $pdf->Cell(10,6, $mostrar['id_pelicula'], 1,0, 'C');
                $pdf->Cell(50,6, $mostrar['titulo'], 1,0, 'C');
                $pdf->Cell(50,6, $mostrar['director'], 1,0, 'C');
                $pdf->Cell(20,6, $mostrar['año'], 1,0, 'C');
                $pdf->Cell(40,6, $mostrar['formato'], 1,0, 'C');
                $pdf->Cell(40,6, $mostrar['visionada'], 1,1, 'C');
        }
        
        $pdf->Output('I','Reporte Total');
 }
 else{
         
        echo '<script type="text/javascript">
        alert("No existen peliculas con el género seleccionado");
        window.location.href="../Vista/MenuPeliculas.php";
        </script>';
 }






?>