<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idproyecto = $_POST["idproyecto"];
    $idAsesor = $_POST["cboasesor"];
    $idUsuario = $_POST["usuario"];

    echo $idAsesor." ".$idproyecto. "  ".$idUsuario;

    
?>