<?php
    include("../connection.php");

    $idrevision = $_GET["id"];
    $idpro = $_GET["idpro"];
    $est = $_GET["est"];

    echo $idrevision." ".$est;

    switch($est) {
        case 1:
            $sql = "UPDATE revision SET estado = 'Proceso' WHERE idrevision = $idrevision";
            mysqli_query($cn, $sql);
            header('Location: ../../views/asesor/inicio.php');
            break;
        case 2:
            $sql = "UPDATE revision SET estado = 'Rechazado' WHERE idrevision = $idrevision";
            mysqli_query($cn, $sql);
            header('Location: ../../views/asesor/inicio.php');
            break;
        case 3:
            /*$sql = "UPDATE revision SET estado = 'Pendiente' WHERE idrevision = $idrevision";
            mysqli_query($cn, $sql);*/
            header('Location: ../../views/asesor/d-revisar.php?idpro='.$idpro);
            break;
        case 4;
            $sql = "UPDATE revision SET estado = 'Pendiente' WHERE idrevision = $idrevision";
            mysqli_query($cn, $sql);
            header('Location: ../../views/asesor/inicio.php');
            break;
    }
?>