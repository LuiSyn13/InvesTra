<?php
include("../../controllers/connection.php");
require('../../fpdf/fpdf.php');
include("../../controllers/auth.php");
$idUser = $_SESSION["user"];
$idProject = $_SESSION["id_project"];

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
        AND p.dni='$idUser';";
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

$pdf->Ln(15);

$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(0, 10, utf8_decode('HUACHO - PERÚ'), 0, 'C');
$pdf->SetFont('Times', 'B', 16);
$pdf->MultiCell(0, 10, '2024', 0, 'C');


//PDF REALIDAD


$pdf->AddPage();

// Añadir la plantilla de antecedentes en formato APA 7
$pdf->SetFont('Times', 'B', 14);
$pdf->MultiCell(0, 10, utf8_decode('Descripción de la realidad problemática:'), 0, 'L');

$pdf->Ln(2);

$sql = "SELECT p.*,p.descripcion AS des_proyect,a.*,i.*
        FROM proyecto p, aporte a, investigador i
        WHERE p.idproyecto = a.idproyecto
        AND p.dni = i.dni
        AND p.dni = '$idUser'
        AND a.idproyecto = $idProject
        AND a.idtipoaporte = 1";

$fila = mysqli_query($cn, $sql);

$r = mysqli_fetch_assoc($fila);

$sql_vd = "SELECT p.*,p.descripcion AS des_proyect,a.*,i.*,v.*,v.descripcion AS des_var
            FROM proyecto p, aporte a, investigador i, variable v
            WHERE p.idproyecto = a.idproyecto
            AND p.dni = i.dni
            AND a.idproyecto = v.idproyecto
            AND p.dni = '$idUser'
            AND a.idproyecto = 3
            AND a.idtipoaporte = 1
            AND v.idtipovariable = 1";

$f_vd = mysqli_query($cn,$sql_vd);

$r_vd = mysqli_fetch_assoc($f_vd);


$sql_vi = "SELECT p.*,p.descripcion AS des_proyect,a.*,i.*,v.*,v.descripcion AS des_var
            FROM proyecto p, aporte a, investigador i, variable v
            WHERE p.idproyecto = a.idproyecto
            AND p.dni = i.dni
            AND a.idproyecto = v.idproyecto
            AND p.dni = '$idUser'
            AND a.idproyecto = 3
            AND a.idtipoaporte = 1
            AND v.idtipovariable = 2";

$f_vi = mysqli_query($cn,$sql_vi);

$r_vi = mysqli_fetch_assoc($f_vi);

$sql_symptoms = "SELECT descripcion 
                 FROM aporte 
                 WHERE idproyecto = $idProject
                 AND idtipoaporte = 1";
$result_symptoms = mysqli_query($cn, $sql_symptoms);

$symptoms = array();
while ($row = mysqli_fetch_assoc($result_symptoms)) {
    $symptoms[] = $row['descripcion'];
}

// Convertir el array de síntomas en una cadena separada por comas
$symptoms_text = implode(", ", $symptoms);


$sql_causas = "SELECT descripcion 
                 FROM aporte 
                 WHERE idproyecto = $idProject
                 AND idtipoaporte = 2";
$result_causas = mysqli_query($cn, $sql_causas);

$causas = array();
while ($row_c = mysqli_fetch_assoc($result_causas)) {
    $causas[] = $row_c['descripcion'];
}

// Convertir el array de síntomas en una cadena separada por comas
$causas_text = implode(", ", $causas);

// Texto formateado según APA 7, justificado
$pdf->SetFont('Times', '', 12);
$texto = "          La empresa ".$r["nomempresa"].", ".$r["des_proyect"].". 
        En la empresa se observan los siguientes síntomas: " . $symptoms_text . ". Estos síntomas se deben a diversas causas, entre las cuales destacan: ".$causas_text.". 
            De no abordar estos problemas, es probable que los siguientes síntomas persistan o incluso empeoren. La presente investigación propone ".$r_vi["des_var"]." como medida para  ".$r_vd["des_var"]." en la empresa ".$r["nomempresa"].". durante el período ".$r["periodo"].". ";
    
$pdf->Justify($texto, 160, 10); // Justificar el texto sin sangría

$pdf->Ln(2);





//PDF ANTECEDENTES



$pdf->AddPage();

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
