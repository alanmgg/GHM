<?php

require('fpdf/fpdf.php');

class PDF extends FPDF {

    // ENCABEZADO
    function Header() {
        // LOGO
        $this->Image('images/logoGHM.jpg', 10, 8, 100);
        // SALTO DE LINEA
        $this->Ln(8);
        // ARIAL BOLD 12
        $this->SetFont('Arial', 'B', 18);
        // SANGRÍA A LA DERECHA
        $this->Cell(68);
        // TITULO
        $this->Cell(60, 10, 'REPORTE DE DOCTORES', 0, 0, 'C');
        // SALTO DE LINEA
        $this->Ln(15);
    }

    // PIE DE PÁGINA
    function Footer() {
        // POSICIÓN: A 1.5cm DEL FINAL
        $this->SetY(-15);
        // ARIAL ITALICA 8
        $this->SetFont('Arial', 'I', 8);
        // NUMERO DE PÁGINA
        $this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'.', 0, 0, 'C');
    }

}

require('pdfcn.php');
$consulta = "SELECT * FROM doctoresregistro";
$result = $mysqli->query($consulta);

// CREACIÓN DEL OBJETO DE CLASE HEREDADA
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(45, 8, utf8_decode('Apellido paterno'), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode('Apellido materno'), 1, 0, 'C', 0);
$pdf->Cell(45, 8, utf8_decode('Nombres'), 1, 0, 'C', 0);
$pdf->Cell(55, 8, utf8_decode('Correo electrónico'), 1, 1, 'C', 0);

$pdf->SetFont('Arial', '', 9);

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(45, 8, utf8_decode($row['aPaterno']), 1, 0, 'C', 0);
    $pdf->Cell(45, 8, utf8_decode($row['aMaterno']), 1, 0, 'C', 0);
    $pdf->Cell(45, 8, utf8_decode($row['name']), 1, 0, 'C', 0);
    $pdf->Cell(55, 8, utf8_decode($row['email']), 1, 1, 'C', 0);
}

$pdf->Output();

?>