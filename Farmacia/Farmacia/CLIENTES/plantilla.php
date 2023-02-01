<?php
    require('fpdf183/fpdf.php');
    class PDF extends FPDF{
        function Header(){
            $this->SetFont ('Arial','B',20);
            $this->Cell(15);
            $this->Cell(120,50,'Datos de Clientes',10,10);
            $this->Ln(15);
        }

        function Footer(){
            $this->SetY(-15);
            $this->SetFont ('Arial','I',20);
            $this->Cell(0,10,'Riobamba - Ecuador',0,0);
        }
    }

    // $pdf = new PDF();
    // $pdf->AliasNbPages();
    // $pdf->AddPage();
    // $pdf->SetFont('Times','',12);
    // $pdf->Output(); 
?>