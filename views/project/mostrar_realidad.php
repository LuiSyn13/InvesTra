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

$pdf->Output();
?>
