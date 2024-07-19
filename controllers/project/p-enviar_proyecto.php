<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idproyecto = $_POST["idproject"];
    $idAsesor = $_POST["cboasesor"];
    $idUsuario = $_POST["usuario"];

    echo $idAsesor." ".$idproyecto. "  ".$idUsuario;

    $sql = "INSERT INTO revision (idproyecto, dniasesor, estado) VALUES ($idproyecto, '$idAsesor', 'Enviado')";
    mysqli_query($cn, $sql);
?>