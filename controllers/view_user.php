<?php
include("auth.php");
include("connection.php");
require('../fpdf/fpdf.php');
$datos = $_SESSION['datos'];
$id = $datos["dni"];

$sql = "select * from usuario where dni = $id";
$fila = mysqli_query($cn, $sql);
$dato = mysqli_fetch_assoc($fila);

class PDF extends FPDF {
    // Pie de página
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Times', 'I', 12);
        $this->Cell(0, 10, '' . $this->PageNo(), 0, 0, 'R');
    }

    // Función para justificar texto
    function Justify($text, $w, $h) {
        $text = utf8_decode($text);
        $this->SetX($this->GetX()); // Alineación horizontal en el margen actual
        $this->MultiCell($w, $h, $text, 0, 'J');
        $this->Ln();
    }
}

$pdf = new PDF();

$pdf->addPage();

$pdf->SetFont('Arial', 'B', 25);
$pdf->MultiCell(0, 10, utf8_decode('¡Bienvenid@ a InvesTra!'), 0, 'C');

$pdf->Ln(60);

$pageWidth = $pdf->GetPageWidth();

$imageWidth = 45; 
$imageHeight = 0; 
$pageWidth = ($pageWidth - $imageWidth) / 2;

$pdf->Image('../img/icons_document/InvesTra.png', $pageWidth, 27, $imageWidth, $imageHeight);

$pdf->SetFont('Arial', '', 14);

$texto = "Te brindamos el apoyo y las herramientas necesarias para comenzar con tu proyecto de investigacion, usuaio. Asi como tambien a los asesores les otorgamos la facilidad de poder revisar los proyectos que se les alcance por parte de los investigadores";
    
$pdf->MultiCell(190,8,"$texto",0,'C');

$pdf->Ln(35);

$dni = $dato['dni'];

$pdf->MultiCell(190,8,"USUARIO: $dni",0,'C');

$pdf->Ln(10);

$pass = $dato['password'];

$pdf->MultiCell(190,8,"CONTRASENA: $pass",0,'C');

mysqli_close($cn);


$pdf->Output();



?>