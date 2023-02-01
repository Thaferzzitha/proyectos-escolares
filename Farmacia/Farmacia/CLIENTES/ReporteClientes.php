<?php
include('plantilla.php');

$conexion=mysqli_connect('localhost','root','','farmacia');
$query="SELECT * FROM clientes";
$resultado=mysqli_query($conexion,$query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf-> SetFillColor(78,83,160);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,6,'CEDULA',1,0,'C');
$pdf->Cell(30,6,'APELLIDO',1,0,'C');
$pdf->Cell(30,6,'NOMBRE',1,0,'C');
$pdf->Cell(50,6,'EMAIL',1,0,'C');
$pdf->Cell(50,6,'DIRECCION',1,1,'C');

$pdf->SetFont('Arial','',12);
while($mostrar= $resultado->fetch_assoc()){
    
        $pdf->Cell(30,6,$mostrar['cedula'], 1,0, 'C');
        $pdf->Cell(30,6, $mostrar['nombreCliente'], 1,0, 'C');
        $pdf->Cell(30,6, $mostrar['apellidoCliente'], 1,0, 'C');
        $pdf->Cell(50,6, $mostrar['correoElectronico'], 1,0, 'C');
        $pdf->Cell(50,6, $mostrar['direccion'], 1,1, 'C');

}

$pdf->Output('I','Reporte Clientes');

?>