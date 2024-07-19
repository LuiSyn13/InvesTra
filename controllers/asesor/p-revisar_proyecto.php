<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idUser = $_SESSION["user"];

    $rec = $_POST["recomendacion"];
    $idre = $_POST["idre"];
    $idpro = $_POST["idpro"];
    $sqlIns = "UPDATE revision SET recomendaciones = '$re' WHERE idrevision = $idre AND idproyecto = $idpro";
    mysqli_query($cn, $sqlIns);
    header('Location: ../../views/asesor/d-revisar.php?idre='.$idre.'&idpro='.$idpro);
?>