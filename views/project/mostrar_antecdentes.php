<?php
include("../../controllers/connection.php");
require('../../fpdf/fpdf.php');
include("../../controllers/auth.php");
$idUser = $_SESSION["user"];
$idProject = $_SESSION["id_project"];

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

// Crear un nuevo PDF en orientación retrato, unidad de medida milímetros, y tamaño A4
$pdf = new PDF('P', 'mm', 'A4');

// Establecer márgenes generales
$pdf->SetMargins(25.4, 25.4, 25.4);

// Añadir una página
$pdf->AddPage();

// Añadir la plantilla de antecedentes en formato APA 7
$pdf->SetFont('Times', 'B', 14);
$pdf->MultiCell(0, 10, utf8_decode('Antecedentes de la investigación:'), 0, 'L');

$pdf->Ln(2);

$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(0, 10, utf8_decode('Antecedentes internacionales:'), 0, 'L');

$pdf->Ln(2);

$sql_in = "SELECT a.*, tp.*,p.*,i.*
            FROM antecedentes a, tipoantecedente tp, proyecto p, investigador i
            WHERE a.idtipoantecedente = tp.idtipoantecedente
            AND a.idproyecto = p.idproyecto
            AND i.dni = '$idUser'
            AND a.idproyecto = $idProject
            AND tp.idtipoantecedente = 1";

$fila_in = mysqli_query($cn, $sql_in);

while($r_in = mysqli_fetch_assoc($fila_in)){
// Texto formateado según APA 7, justificado
$pdf->SetFont('Times', '', 12);
$texto = "          ".$r_in["autor"]." (".$r_in["año"]."), realizó su investigación llamada: ''".$r_in["titulo"]."''. El objetivo general de la investigación fue: ''".$r_in["objetivog"]."''. La tesis fue realizada para obtener el grado de ''".$r_in["grtitulo"]."'' en ".$r_in["universidad"].", ".$r_in["nacionalidad"].".
    La muestra estuvo formada por un total de ".$r_in["muestra"].". Las recomendaciones de la investigación son: ".$r_in["recomendaciones"]." Las conclusiones indican que ".$r_in["conclusiones"]."";
$pdf->Justify($texto, 160, 10); // Justificar el texto sin sangría

$pdf->Ln(2);

}

$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(0, 10, utf8_decode('Antecedentes nacionales:'), 0, 'L');

$pdf->Ln(2);

$sql_na = "SELECT a.*, tp.*,p.*,i.*
            FROM antecedentes a, tipoantecedente tp, proyecto p, investigador i
            WHERE a.idtipoantecedente = tp.idtipoantecedente
            AND a.idproyecto = p.idproyecto
            AND i.dni = '$idUser'
            AND a.idproyecto = $idProject
            AND tp.idtipoantecedente = 2";

$fila_na = mysqli_query($cn, $sql_na);

while($r_na = mysqli_fetch_assoc($fila_na)){
// Texto formateado según APA 7, justificado
$pdf->SetFont('Times', '', 12);
$texto = "          ".$r_na["autor"]." (".$r_na["año"]."), realizó su investigación llamada: ''".$r_na["titulo"]."''. El objetivo general de la investigación fue: ''".$r_na["objetivog"]."''. La tesis fue realizada para obtener el grado de ''".$r_na["grtitulo"]."'' en ".$r_na["universidad"].", ".$r_na["nacionalidad"].".
    La muestra estuvo formada por un total de ".$r_na["muestra"].". Las recomendaciones de la investigación son: ".$r_na["recomendaciones"]." Las conclusiones indican que ".$r_na["conclusiones"]."";
$pdf->Justify($texto, 160, 10); // Justificar el texto sin sangría

$pdf->Ln(2);

}

$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(0, 10, utf8_decode('Antecedentes locales:'), 0, 'L');

$pdf->Ln(2);

$sql_lo = "SELECT a.*, tp.*,p.*,i.*
            FROM antecedentes a, tipoantecedente tp, proyecto p, investigador i
            WHERE a.idtipoantecedente = tp.idtipoantecedente
            AND a.idproyecto = p.idproyecto
            AND i.dni = '$idUser'
            AND a.idproyecto = $idProject
            AND tp.idtipoantecedente = 3";

$fila_lo = mysqli_query($cn, $sql_lo);

while($r_lo = mysqli_fetch_assoc($fila_lo)){
// Texto formateado según APA 7, justificado
$pdf->SetFont('Times', '', 12);
$texto = "          ".$r_lo["autor"]." (".$r_lo["año"]."), realizó su investigación llamada: ''".$r_lo["titulo"]."''. El objetivo general de la investigación fue: ''".$r_lo["objetivog"]."''. La tesis fue realizada para obtener el grado de ''".$r_lo["grtitulo"]."'' en ".$r_lo["universidad"].", ".$r_lo["nacionalidad"].".
    La muestra estuvo formada por un total de ".$r_lo["muestra"].". Las recomendaciones de la investigación son: ".$r_lo["recomendaciones"]." Las conclusiones indican que ".$r_lo["conclusiones"]."";
$pdf->Justify($texto, 160, 10); // Justificar el texto sin sangría

$pdf->Ln(2);

}

$pdf->Output();
?>
