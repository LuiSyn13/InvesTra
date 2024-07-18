<?php
include("../../controllers/connection.php");
require('../../fpdf/fpdf.php');

class PDF extends FPDF {
    // Pie de página
    function Footer() {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Fuente para el pie de página
        $this->SetFont('Times', 'I', 12);
        // Número de página alineado a la derecha
        $this->Cell(0, 10, '' . $this->PageNo(), 0, 0, 'R');
    }
}

// Crear un nuevo PDF en orientación retrato, unidad de medida milímetros, y tamaño A4
$pdf = new PDF('P', 'mm', 'A4');

// Establecer márgenes generales
$pdf->SetMargins(30, 25.4, 30);
//$pdf->SetAutoPageBreak(true, 25.4);

// Añadir una página
$pdf->AddPage();

// Tamaño y tipo de fuente para el título principal
$pdf->SetFont('Times', 'B', 18);

// Título principal de la universidad con márgenes de 30 mm a cada lado
$pdf->MultiCell(0, 10, utf8_decode('UNIVERSIDAD NACIONAL JOSÉ FAUSTINO SÁNCHEZ CARRIÓN'), 0, 'C');

// Tamaño y tipo de fuente para el nombre de la facultad
$pdf->SetFont('Times', '', 16);

$pdf->Ln(5);

// Nombre de la facultad centrado
$pdf->Cell(0, 10, utf8_decode('Facultad de Ingeniería Industrial, Sistemas e Informática'), 0, 1, 'C');

// Obtener el ancho de la página
$pageWidth = $pdf->GetPageWidth();

// Establecer el ancho de la imagen
$imageWidth = 80;

// Calcular la posición X para centrar la imagen
$positionX = ($pageWidth - $imageWidth) / 2;

// Agregar la imagen centrada
$pdf->Image('../../img/Logo_UNJFSC.png', $positionX, 65, $imageWidth);

$pdf->Ln(90); // Espacio entre la imagen y el título del proyecto

// Consulta a la base de datos
$sql = "SELECT p.*, i.*, c.*
        FROM proyecto p, investigador i, carrera c 
        WHERE p.dni = i.dni
        AND i.idcarrera = c.idcarrera 
        AND p.dni='73314943';";
$fila = mysqli_query($cn, $sql);
$r = mysqli_fetch_assoc($fila);

// Título del proyecto obtenido de la base de datos
$title = utf8_decode($r["nomproyecto"]);

// Establecer la fuente y tamaño para el título del proyecto
$pdf->SetFont('Times', 'B', 16);

// Calcular el ancho del título del proyecto
$titleWidth = $pdf->GetStringWidth($title);

// Si el título del proyecto es más ancho que la página, usar MultiCell para manejar el salto de línea
if ($titleWidth > $pageWidth - 20) {
    // Ajustar el margen
    $pdf->SetLeftMargin(30);
    $pdf->SetRightMargin(30);
    // MultiCell con ancho igual al ancho de la página menos márgenes
    $pdf->MultiCell(0, 10, $title, 0, 'C');
} else {
    // Dejar un espacio para centrar el texto
    $pdf->Cell(($pageWidth - $titleWidth) / 2);
    // Escribir el título
    $pdf->Cell($titleWidth, 10, $title, 0, 1, 'C');
}

$pdf->Ln(10);

$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(0, 10, utf8_decode($r["nomcarrera"]), 0, 'C');

$pdf->Ln(10);

$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(0, 10, 'Estudiante:', 0, 'C');

$pdf->SetFont('Times', '', 16);
$pdf->MultiCell(0, 10, utf8_decode($r["nombre"]." ".$r["apaterno"]." ".$r["amaterno"]), 0, 'C');

$pdf->Ln(25);

$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(0, 10, utf8_decode('HUACHO - PERÚ'), 0, 'C');
$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(0, 10, '2024', 0, 'C');

$pdf->AddPage();


$pdf->Output();
?>
