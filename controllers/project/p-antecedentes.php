<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idProject = $_SESSION["id_project"];

    $tantec = $_POST["lsttantecedente"];
    $autor = $_POST["autor_inv"];
    $titulo = $_POST["titulo_inv"];
    $año = $_POST["año_inv"];
    $gradot = $_POST["grtitulo"];
    $uni = $_POST["uni_inv"];
    $nacion = $_POST["nacion_inv"];
    $muestra = $_POST["muestra_inv"];
    $objg = $_POST["objGen_inv"];
    $recom = $_POST["recom_inv"];
    $concl = $_POST["concl_inv"];

    echo $tantec." ".$autor." ".$titulo." ".$año." ".$concl;

    $sql = "INSERT INTO antecedentes (idtipoantecedente, autor, titulo, año, grtitulo, universidad, nacionalidad, objetivog, muestra, recomendaciones, conclusiones, idproyecto) VALUES 
    ($tantec, '$autor', '$titulo', '$año', '$gradot', '$uni', '$nacion', '$objg', '$muestra', '$recom', '$concl', $idProject)";
    mysqli_query($cn, $sql);
?>