<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
  // Logo
     $this->Image('logo.jpg',10,0,35);  
    // Arial bold 15
    $this->SetFont('Arial','B',22);
    // Movernos a la derecha
    $this->Cell(62);
    // Título
    $this->Cell(75,10,'Reporte Mesas',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(51);
    $this->Cell(13,10,'ID',1,0,'C',0);
    $this->Cell(45,10,'Nombre',1,0,'C',0);
    $this->Cell(40,10,"Precio",1,1,'C',0);
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}
// La conexion de la base de datos
require 'cn.php';
// Escogue la tabla para mostrar
 $consulta = 'SELECT * FROM Mesa';
 $Resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while ($row = $Resultado-> fetch_assoc()) {
    # code...
    $pdf->Cell(51);
    $pdf->Cell(13,10,$row['idMesa'],1,0,'C',0);
    $pdf->Cell(45,10,$row['NombreMesa'],1,0,'C',0);
    $pdf->Cell(40,10,$row['PrecioMesa'],1,1,'C',0);
}
$pdf->Output();
?>