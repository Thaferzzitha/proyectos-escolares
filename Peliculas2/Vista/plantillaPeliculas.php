<?php
    require('../fpdf183/fpdf.php');
    class PDF extends FPDF{
        function Header(){
            
            $this->SetFont ('Arial','B',25);
            $this->SetTextColor(242, 242, 242);
            $this->SetFillColor(236, 179, 229);
            $this->Cell(15);
            $this->Cell(260,20, utf8_decode('REPORTE PELÍCULAS'),0,1,'C',TRUE);
            $this->Image('../Imagenes/cine.png',10,8,25);
            $this->Ln(5);
        }

        function Footer(){
            $this->SetY(-15);
            $this->SetFont ('Arial','I',15);
            $this->SetTextColor(108, 155, 217);
            $this->Cell(100,10,utf8_decode('THALÍA ZÁRATE - 6560'),0,0,TRUE);
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }

    // $pdf = new PDF();
    // $pdf->AliasNbPages();
    // $pdf->AddPage();
    // $pdf->SetFont('Times','',12);
    // $pdf->Output(); 
?>