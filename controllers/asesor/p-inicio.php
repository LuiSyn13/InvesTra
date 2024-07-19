<?php
    include("../connection.php");

    $idrevision = $_GET["id"];
    $est = $_GET["est"];

    echo $idrevision." ".$est;

    switch($est) {
        case 1:
            break;
        case 2:
            break;
        case 3:
            break;
        case 4;
            break;
    }
    $sql = "UPDATE revision SET estado = 'Proceso' WHERE idrevision = $idrevision";
    mysqli_query($cn, $sql);
?>