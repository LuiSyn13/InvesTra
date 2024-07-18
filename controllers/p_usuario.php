<?php
session_start(); 

include("connection.php");

if (isset($_SESSION['datos'])) {
    $datos = $_SESSION['datos'];

    $tipo = $datos['tipo'];

    $dni = $datos['dni'];
    $nom = $datos['nombres'];
    $pat = $datos['paterno'];
    $mat = $datos['materno'];

    switch ($tipo) {
        case 'investigador':
            $car = $datos['carrera'];
            $cond = $datos['condicion'];
            $denom = $datos['denominacion'];
            break;
        case 'asesor':
            $dina = $datos['dina'];
            $esp = $datos['especialidad'];
            break;
    }
}

$pass = generapass();

$sqlu="insert into usuario (dni, password) values ('$dni', '$pass')";

switch ($tipo) {
    case 'investigador':
        $sqli="insert into investigador (dni, nombre, apaterno, amaterno, idcarrera, idcondicion, iddenominacion) 
                values ('$dni', '$nom', '$pat', '$mat', '$car', '$cond', '$denom')";
        break;
    case 'asesor':
        $sqli="insert into asesor (dni, dina, nombre, apaterno, amaterno, idespecialidad) 
                values ('$dni', '$dina', '$nom', '$pat', '$mat', '$esp')";
        break;
}

$sqld="insert into datosespecificos (dni, estado) values ('$dni', '0')";

mysqli_query($cn,$sqlu);
mysqli_query($cn,$sqli);
mysqli_query($cn,$sqld);

function generapass(){

    $plantilla = "1234567890qwertyuiopasdfghjklzxcvbnm";

    $password = "";

    for ($i=0; $i < 8 ; $i++) { 
        $password = $password.substr($plantilla, rand(1,36), 1);
    }

    return $password;
}

mysqli_close($cn);

header("location: ../views/confirm_registro.php");

?>