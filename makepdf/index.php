<?php
require('fpdf.php');
class PDF extends FPDF
{
    // Cabecera de página
    function SetDash($black=null, $white=null)
    {
        if($black!==null)
            $s=sprintf('[%.3F %.3F] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }
    function Header()
    {
    $Nombre=$_GET['n'];
    $Correo=$_GET['c'];
    if(isset($_GET['b'])){
        $buscar=$_GET['b'];
        if ($buscar == 1) {
            if(isset($_GET['fi'])){
                $fechaInicial=$_GET['fi'];
                if (isset($_GET['ff'])) {
                    $fechaFinal=$_GET['ff'];
                    $movimientos="Movimientos del $fechaInicial al $fechaFinal";       
                    $i=58;       
                }else{
                    $movimientos="Movimientos para la fecha de $fechaInicial";    
                    $i=57;
                }
            }
        }else{
            $movimientos="Lista de movimientos para $buscar";
            $i=45;     
        }
    }else{
        $movimientos="Lista de todos los movimientos"; 
        $i=45;
    }
    // Logo
    $this->Image('assets/LogoPP.png',145,5,50);
    // Arial bold 15
    $this->SetFont('Arial','B',16);
    // Movernos a la derecha
    $this->Cell(26);
    // Título
    $this->Cell(20,20,'Historial de transacciones',0,0,'C');
    // Salto de línea
    $this->Ln(5);
    $this->SetFont('Arial','B',8);
    $this->Cell($i,20,utf8_decode("$movimientos"),0,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','',10);
    $this->Cell(23,20,utf8_decode("$Nombre"),0,0,'C');
    $this->Ln(5);
    $this->Cell(42,20,utf8_decode("$Correo"),0,0,'C');
    $this->SetFont('Arial','B',10);
    // Salto de línea
    $this->Ln(15);
    $this->Cell(26,10,utf8_decode('Fecha'),0,0,'',0);
    $this->Cell(25,10,utf8_decode('Descripción'),0,0,'',0);
    $this->Cell(50,10,utf8_decode('Origen'),0,0,'',0);
    $this->Cell(50,10,utf8_decode('Destino'),0,0,'',0);
    $this->Cell(20,10,utf8_decode('Monto'),0,0,'R',0);
    $this->Cell(20,10,utf8_decode('Comisión'),0,1,'R',0);
    $this->Line(10,65,200,65);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(350,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
include('../Server/Conexion.php');
$Correo=$_GET['c'];
if(isset($_GET['b'])){
    if (empty($_GET['b'])) {
        if(isset($_GET['fi'])){
            $fechaInicial=$_GET['fi'];
            if (isset($_GET['ff'])) {
                $fechaFinal=$_GET['ff'];
                $sql="SELECT * FROM movimientos WHERE   Fecha  BETWEEN '$fechaInicial' AND '$fechaFinal'";
            }else{
                $sql="SELECT * FROM movimientos WHERE   Fecha  LIKE '%$fechaInicial%' ";     
            }
        }
    }
    $buscar=$_GET['b'];
    $sql="SELECT * FROM movimientos WHERE  Tipo  LIKE  '%$buscar%' OR  Destino LIKE  '%$buscar%' OR Monto LIKE  '%$buscar%' OR Descripción LIKE  '%$buscar%' OR Fecha  LIKE  '%$buscar%'";
}else{
    $sql = "SELECT * FROM movimientos WHERE Origen = '$Correo' or Destino ='$Correo'"; 
}
$query=mysqli_query($conn,$sql);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
while($row= mysqli_fetch_assoc($query)){
    if($Correo == $row['Origen']) {
    $Monto = "- $".$row["Monto"]."\n";
    }else{
    $Monto = "+ $".$row["Monto"]."\n";
    }
    $pdf->Cell(26,10,$row['Fecha'],0,0,'',0);
    $pdf->Cell(25,10,$row['Descripción'],0,0,'',0);
    $pdf->Cell(50,10,$row['Origen'],0,0,'',0);
    $pdf->Cell(50,10,$row['Destino'],0,0,'',0);
    $pdf->Cell(20,10,$Monto,0,0,'R',0);
    $pdf->Cell(20,10,$row['Comisión'],0,1,'R',0);
    $pdf->SetLineWidth(0.1);
    $pdf->SetDash(.5,1);
    $pdf->SetDrawColor(200,200,200);
    $j=65 + (mysqli_num_rows($query) * 10);
    for ($i=75; $i < $j ; $i+=10) { 
        $pdf->Line(10,$i,202,$i);
    }
}

$pdf->Output();
?>