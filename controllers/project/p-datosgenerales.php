<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idUser = $_SESSION["user"];

    $nombre_proyecto = $_POST["nombre_proyecto"];
    $nombre_empresa = $_POST["nombre_empresa"];
    $direccion_empresa = $_POST["direccion_empresa"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $descripcion_negocio = $_POST["descripcion_negocio"];

    $sql = "INSERT INTO proyecto (dni, nomproyecto, nomempresa, direccion, periodo, descripcion, fechacreacion)
            VALUES ('$idUser', '$nombre_proyecto', '$nombre_empresa', '$direccion_empresa','$fecha_inicio - $fecha_fin', '$descripcion_negocio', '14-07-2024')";
    mysqli_query($cn, $sql);
    mysqli_close($cn);
    echo $idUser.' '.$nombre_proyecto;
?>