<?php
    include("../auth.php");
    $_SESSION["id_project"] = 0;
    $tuser = $_SESSION["tuser"];
    header("Location: ../../views/$tuser/inicio.php");
?>