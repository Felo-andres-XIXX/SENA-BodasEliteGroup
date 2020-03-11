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
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Cell(60,10,'Reporte Comidas',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(15,10,'ID',1,0,'c',0);
    $this->Cell(55,10,'Nombre Plato',1,0,'c',0);
    $this->Cell(45,10,"Valor Unitario",1,0,'c',0);
    $this->Cell(50,10,"ID Tipo_Comida",1,1,'c',0);
    
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
 $consulta = 'SELECT * FROM Comida';
 $Resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);

while ($row = $Resultado-> fetch_assoc()) {
    # code...
    $pdf->Cell(15,10,$row['idcomida'],1,0,'c',0);
    $pdf->Cell(55,10,$row['NombreComida'],1,0,'c',0);
    $pdf->Cell(45,10,$row['ValorPlato'],1,0,'c',0);
    $pdf->Cell(50,10,$row['IdTipoComida'],1,1,'c',0);
}




$pdf->Output();
?>