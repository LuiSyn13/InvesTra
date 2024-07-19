<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idproyecto = $_POST["idproject"];
    $idUsuario = $_POST["idasesor"];

    if(isset($_POST["idrevision"])) {
        $idrevision = $_POST["idrevision"];
        $opt = 1;
    } else {        
        $opt = 2;
    }
    
    echo $idrevision." ".$idUsuario. " ".$opt;

    switch($opt) {
        case 2:
            $sql = "INSERT INTO revision (idproyecto, dniasesor, estado) VALUES ($idproyecto, '$idUsuario', 'Enviado')";
            mysqli_query($cn, $sql);
            header('Location: ../../views/asesor/inicio.php');
            break;
        case 1:
            $sql = "UPDATE revision SET estado = 'Revisado' WHERE idrevision = $idrevision";
            mysqli_query($cn, $sql);
        header('Location: ../../views/asesor/documentos.php');
            break;
    }
?>