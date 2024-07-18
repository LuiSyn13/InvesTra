<?php
    include("../auth.php");
    if (isset($_GET["ipt"])) {
        $_SESSION["id_project"] = $_GET["ipt"];
    }
    header("Location: ../../views/project/datosgenerales.php");
?>