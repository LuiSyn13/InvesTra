<?php
include("../../controllers/auth.php");
$idUser = $_SESSION["user"];

$id = $_GET["idproyecto"];
$_SESSION["id_project"] = $id;
header("Location: ../../views/project/cuadro_diagnostico.php");
?>