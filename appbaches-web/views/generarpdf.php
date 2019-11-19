<?php
$host="localhost";
$username="root";
$pass="";
$db="appbaches";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}

include_once('pdf/fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('1.png', 5, 5, 30 );
        $this->SetFont('Arial','B',15);
        $this->Cell(30);
        $this->Cell(120,10, 'Reportes',0,1,'C');
        $this->SetFont('Arial','',12);
        $this->Ln(20);
    }
    
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
    }		
}


$query = "SELECT id, fecha, latitud, longitud, direccion_aprox, estatus, id_user FROM reporte";
$resultado = $conn->query($query);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage(L);

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,6,'#Reporte',1,0,'C',1);
$pdf->Cell(40,6,'Fecha',1,0,'C',1);
$pdf->Cell(40,6,'Latitud',1,0,'C',1);
$pdf->Cell(40,6,'Longitud',1,0,'C',1);
//$pdf->Cell(70,6,'Direccion Aproximada',1,0,'C',1);
$pdf->Cell(70,6,'Estatus',1,0,'C',1);
$pdf->Cell(70,6,'Usuario',1,1,'C',1);

$pdf->SetFont('Arial','',10);

while($row = $resultado->fetch_assoc())
{
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(20,6,utf8_decode($row['id']),1,0,'C');
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(40,6,$row['fecha'],1,0,'C');
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(40,6,$row['latitud'],1,0,'C');
	$pdf->Cell(40,6,$row['longitud'],1,0,'C');
    //$pdf->Cell(70,6,utf8_decode($row['direccion_aprox']),1,0,'C');
	if ($row['estatus'] == 1) {
		$pdf->Cell(70,6,'Caso solucionado.',1,0,'C');
	} else if ($row['estatus'] == 2) {
		$pdf->Cell(70,6,'Caso en proceso.',1,0,'C');
	}else {
		$pdf->Cell(70,6,'Caso sin atender.',1,0,'C');
	}
    $pdf->Cell(70,6,utf8_decode($row['id_user']),1,1,'L');
    
}

$filename = "reportes.pdf";
$pdf->Output($filename, 'F');
header('location:mgmt_reportes.php');

?>
