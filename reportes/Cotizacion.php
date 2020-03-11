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
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->Cell(70,10,'Reporte Cotizaciones',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(7,10,'ID',1,0,'C',0);
    $this->Cell(22,10,'Fecha',1,0,'C',0);
    $this->Cell(33,10,"Observacion",1,0,'C',0);
    $this->Cell(28,10,"Tematica",1,0,'C',0);
    $this->Cell(20,10,"Precio",1,0,'C',0);
    $this->Cell(33,10,"Confirmacion",1,0,'C',0);
    $this->Cell(14,10,"Mesa",1,0,'C',0);
    $this->Cell(15,10,"Lugar",1,0,'C',0);
    $this->Cell(25,10,"Sonido_Ilumi",1,0,'c',0);
    $this->Cell(18,10,"Cliente",1,0,'C',0);
    $this->Cell(18,10,"Comida",1,1,'C',0);
    
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
 $consulta = 'SELECT * FROM Cotizacion';
 $Resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);

while ($row = $Resultado-> fetch_assoc()) {
    # code...
    $pdf->Cell(7,10,$row['idCotizacion'],1,0,'C',0);
    $pdf->Cell(22,10,$row['FechaCotizacion'],1,0,'C',0);
    $pdf->Cell(33,10,$row['ObservacionCotizacion'],1,0,'C',0);
    $pdf->Cell(28,10,$row['TematicaEvento'],1,0,'C',0);
    $pdf->Cell(20,10,$row['PrecioFinal'],1,0,'C',0);
    $pdf->Cell(33,10,$row['ConfirmacionEvento'],1,0,'C',0);
    $pdf->Cell(14,10,$row['IdMesa'],1,0,'C',0);
    $pdf->Cell(15,10,$row['IdLugar'],1,0,'C',0);
    $pdf->Cell(25,10,$row['idSonidoIluminacion'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Idcliente'],1,0,'C',0);
    $pdf->Cell(20,10,$row['IdTipoEvento'],1,0,'C',0);
    $pdf->Cell(20,10,$row['IdComida'],1,1,'C',0);
}




$pdf->Output();
?>