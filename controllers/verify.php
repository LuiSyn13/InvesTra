<?php
session_start();
include("connection.php");

$tipo = $_POST["tipousuario"];

$dni=$_POST["txtdni"];
$nom=$_POST["txtnombres"];
$pat=$_POST["txtpaterno"];
$mat=$_POST["txtmaterno"];

switch ($tipo) {
    case 'investigador':
        $car=$_POST["lstcarrera"];
        $cond=$_POST["lstcondicion"];
        $denom=$_POST["lstdenominacion"];
        break;
    case 'asesor':
        $dina=$_POST["txtdina"];
        $esp=$_POST["lstespecialidad"];
        break;
}

$sql="select * from usuario where dni = '$dni';";

$fila=mysqli_query($cn,$sql);
$r=mysqli_fetch_assoc($fila);

$valor=$r["dni"];

if ($valor==null) {

switch ($tipo) {
    case 'investigador':
        $_SESSION['datos'] = array(
            'dni' => $dni,
            'nombres' => $nom,
            'paterno' => $pat,
            'materno' => $mat,
            'carrera' => $car,
            'condicion' => $cond,
            'denominacion' => $denom,
            'tipo' => $tipo
        );

        break;
    case 'asesor':
        $_SESSION['datos'] = array(
            'dni' => $dni,
            'nombres' => $nom,
            'paterno' => $pat,
            'materno' => $mat,
            'dina' => $dina,
            'especialidad' => $esp,
            'tipo' => $tipo
        );

        break;
}

header("location: ../views/i-datosesp.php");

} else {
    
header("location: ../views/Cuenta_existente.php?user=$dni");

}

?>