<?php
include('../Vista/plantillaLibros.php');
include("../Controlador/Conexion.php");
$autor= $_POST['idAutor'];
$query="SELECT * FROM libro WHERE Autor_idAutor = '$autor'";
$query_genero= "SELECT * FROM autor WHERE idAutor = '$autor'";
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
        $pdf->Cell(160,8,utf8_decode('Libros del Autor ') . $mostrar2['nombre']. " " .$mostrar2['apellido'],1,1,'C',TRUE);
        $pdf->SetFillColor(236, 179, 229);
        $pdf->Cell(10,8,'ID',1,0,'C',TRUE);
        $pdf->Cell(50,8,utf8_decode('LIBRO'),1,0,'C', TRUE);
        $pdf->Cell(50,8,utf8_decode('DESCRIPCIÓN'),1,0,'C', TRUE);
        $pdf->Cell(50,8,utf8_decode('No PÁGINAS'),1,1,'C', TRUE);
        
        $pdf->SetFont('Arial','',12);
        
        while($mostrar= $resultado->fetch_assoc()){
                $pdf->Cell(10,6, $mostrar['idLibro'], 1,0, 'C');
                $pdf->Cell(50,6, $mostrar['nombre'], 1,0, 'C');
                $pdf->Cell(50,6, $mostrar['descripcion'], 1,0, 'C');
                $pdf->Cell(50,6, $mostrar['nro_paginas'], 1,1, 'C');              
        }
        
        $pdf->Output('I','Reporte Total');
 }
 else{
         
        echo '<script type="text/javascript">
        alert("No existen peliculas con el género seleccionado");
        window.location.href="../Vista/MenuAutor.php";
        </script>';
 }






?>