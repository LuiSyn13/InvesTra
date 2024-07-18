<?php
    include("../auth.php");
    $_SESSION["id_project"] = 0;
    header("Location: ../../views/investigador/inicio.php");
?>