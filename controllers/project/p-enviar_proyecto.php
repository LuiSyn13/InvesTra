<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idproyecto = $_POST["idproject"];
    $idUsuario = $_POST["idasesor"];
    $idrevision = $_POST["idrevision"];

    echo $idrevision.' '.$idUsuario.' '.$idproyecto;
    if($idrevision == 0) {
        $opt = 1;
    } else {        
        $opt = 2;
    }
    echo $idrevision.' '.$idUsuario.' '.$idproyecto;
    switch($opt) {
        case 1:
            $sql = "INSERT INTO revision (idproyecto, dniasesor, estado) VALUES ($idproyecto, '$idUsuario', 'Enviado')";
            mysqli_query($cn, $sql);
            header('Location: ../../views/investigador/documentos.php');
            break;
        case 2:
            $sqlU = "UPDATE revision SET estado = 'Revisado' WHERE idrevision = $idrevision";
            mysqli_query($cn, $sqlU);
            header('Location: ../../views/asesor/documentos.php');
            break;
    }
?>