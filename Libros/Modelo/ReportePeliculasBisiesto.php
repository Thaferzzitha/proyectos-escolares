<?php
include('../Vista/plantillaPeliculas.php');
$conexion=mysqli_connect('localhost','root','','cine');
$query="SELECT * FROM peliculas";
$resultado=mysqli_query($conexion,$query);



$pdf = new PDF('L'); //L para horizontal - P para vertical
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',12);

$pdf->SetFillColor(210, 90, 237);
$pdf->Cell(260,8,utf8_decode('PELICULAS CON AÑO BISIESTO'),1,1,'C',TRUE);
$pdf->SetFillColor(236, 179, 229);
$pdf->Cell(10,8,'ID',1,0,'C',TRUE);
$pdf->Cell(50,8,utf8_decode('PELÍCULA'),1,0,'C', TRUE);
$pdf->Cell(50,8,'DIRECTOR',1,0,'C', TRUE);
$pdf->Cell(20,8,utf8_decode('AÑO'),1,0,'C', TRUE);
$pdf->Cell(40,8,'FORMATO',1,0,'C', TRUE);
$pdf->Cell(40,8,'VISIONADA',1,0,'C', TRUE);
$pdf->Cell(50,8,utf8_decode('GÉNERO'),1,1,'C', TRUE);

$pdf->SetFont('Arial','',12);

while($mostrar= $resultado->fetch_assoc()){
        $id_genero_p = $mostrar['id_genero'];
        $sql2 = "SELECT * FROM generos where id_genero = '$id_genero_p'";
        $result2=mysqli_query($conexion,$sql2);
        $mostrar2=mysqli_fetch_array($result2);

        //Empieza funcion

        if(($mostrar['año']%4) == 0){
        $pdf->Cell(10,6, $mostrar['id_pelicula'], 1,0, 'C');
        $pdf->Cell(50,6, $mostrar['titulo'], 1,0, 'C');
        $pdf->Cell(50,6, $mostrar['director'], 1,0, 'C');
        $pdf->Cell(20,6, $mostrar['año'], 1,0, 'C');
        $pdf->Cell(40,6, $mostrar['formato'], 1,0, 'C');
        $pdf->Cell(40,6, $mostrar['visionada'], 1,0, 'C');
        $pdf->Cell(50,6, $mostrar2['nombre'], 1,1, 'C');
        }

        //
        
}

$pdf->Output('I','Reporte Total');

?>