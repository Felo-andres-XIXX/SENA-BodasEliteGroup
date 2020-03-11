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
    $this->Cell(70);
    // Título
    $this->Cell(50,10,' Reporte Clientes',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(12,10,'ID',1,0,'C',0);
    $this->Cell(22,10,'Nombre',1,0,'C',0);
    $this->Cell(23,10,'Apellido',1,0,'C',0);
    $this->Cell(30,10,'Telefono',1,0,'C',0);
    $this->Cell(66,10,'Correo',1,0,'C',0);
    $this->Cell(42,10,'Tipo_Documento',1,1,'C',0);    
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
 $consulta = 'SELECT * FROM Cliente';
 $Resultado = $mysqli->query($consulta);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while ($row = $Resultado-> fetch_assoc()) {
    # code...
    $pdf->Cell(12,10,$row['idCliente'],1,0,'C',0);
    $pdf->Cell(22,10,$row['NombreCliente'],1,0,'C',0);
    $pdf->Cell(23,10,$row['ApellidoCliente'],1,0,'C',0);
    $pdf->Cell(30,10,$row['TelefonoCliente'],1,0,'C',0);
    $pdf->Cell(66,10,$row['CorreoCliente'],1,0,'C',0);
    $pdf->Cell(42,10,$row['idTipoDocumento'],1,1,'C',0);
}


$pdf->Output();
?>