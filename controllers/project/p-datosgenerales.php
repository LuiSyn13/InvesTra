<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idUser = $_SESSION["user"];

$nomPro = $_POST["nombre_proyecto"];
$nomEmp = $_POST["nombre_empresa"];
$dirEmp = $_POST["direccion_empresa"];
$fInicio = $_POST["fecha_inicio"];
$fFin = $_POST["fecha_fin"];
$descNeg = $_POST["descripcion_negocio"];

/* Datos para ajuste */
$tConsulta = $_POST["tipo_consulta"];
$idProyecto = $_POST["id_proyecto"];
$fAct = date("Y-m-d H:i:s");
switch ($tConsulta) {
    case "new":
        $sql = "INSERT INTO proyecto (dni, nomproyecto, nomempresa, direccion, periodo, descripcion, fechacreacion)
            VALUES ('$idUser', '$nomPro', '$nomEmp', '$dirEmp','$fInicio - $fFin', '$descNeg', '$fAct')";
        
        mysqli_query($cn, $sql);

        $id = mysqli_insert_id($cn);

        $_SESSION["id_project"] = $id;

        mysqli_close($cn);
        
        header("Location: ../../views/project/datosgenerales.php");

        break;

    case "edit":
        $sql = "UPDATE proyecto
            SET nomproyecto = '$nomPro', nomempresa = '$nomEmp', direccion = '$dirEmp', periodo ='$fInicio - $fFin', descripcion = '$descNeg', fechamodificacion = '$fAct'
            WHERE idproyecto = $idProyecto";

        mysqli_query($cn, $sql);
        mysqli_close($cn);
        
        header("Location: ../../views/project/datosgenerales.php");
        break;
}
?>
