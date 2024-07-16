<?php
    include("../auth.php");
    include("../connection.php");
    $idProject = $_SESSION["id_project"];

    $listAlimentar = $_POST["txtalimentar"];

    /* Datos para ajuste */
    $tipo_aporte = $_POST["tipo_aporte"];

    // Dividir el texto en líneas
    $lineas = explode("\n", $listAlimentar);

    $lineas = array_map('trim', $lineas);

    $sum = 0;
    foreach ($lineas as $linea) {
        if (!empty($linea)) {
            $sum++;
        }
    }

    // INSERT INTO problema (idtipoplaneamiento, descripcion, idproyecto) VALUES (1, 'Determinar la siquiente planteamiento...', 1)

    /* Contabilizar cuantos registros hay con el proyecto*/
    $sqlCount = "SELECT COUNT(*) as res FROM aporte WHERE idtipoaporte = $tipo_aporte AND idproyecto = $idProject";
    $filaCount = mysqli_query($cn, $sqlCount);
    $cantSQL = mysqli_fetch_assoc($filaCount);
    $cnt = $cantSQL["res"];

    $dif = abs($sum - $cnt);
    if($cnt ==  0) {
        echo "No hay registro, NUEVO INSERCIÓN";
        $tQuery = "new";
    } elseif ($cnt > $sum) {        
        echo "Hay mas registro en la BD, se va a eliminar $dif";
        $sqlDel = "DELETE FROM aporte WHERE idaporte IN ( SELECT idaporte FROM (
                    SELECT idaporte FROM aporte WHERE idtipoaporte = $tipo_aporte AND idproyecto = $idProject
                    ORDER BY idaporte DESC
                    LIMIT $dif
                ) subquery)";
        mysqli_query($cn, $sqlDel);

        $tQuery = "edit";

    } elseif ($cnt < $sum) {
        echo "Has mas registro en textArea, se va a crear $dif registros";
        $sqlIns = "INSERT INTO aporte (idtipoaporte, descripcion, idproyecto) VALUES ($tipo_aporte, 'null', $idProject)";
        mysqli_query($cn, $sqlIns);
        
        $tQuery = "edit";
    } elseif($cnt == $sum) {
        $tQuery = "edit";
        echo "Solo falta actualizar cambios";
    }

    $sqlIdAporte = "SELECT idaporte as idA FROM aporte WHERE idtipoaporte = $tipo_aporte AND idproyecto = $idProject";
    $listIdAporte = mysqli_query($cn, $sqlIdAporte);

    $ArrayTemp = array();
    while($idA = mysqli_fetch_assoc($listIdAporte)) {
        $ArrayTemp[] = $idA["idA"];
    }

    for ($i=0; $i < $sum; $i++) {
        echo "Aqui llega 01";
        $linea = $lineas[$i];
            switch($tQuery) {
                case "new":
                    $sql = "INSERT INTO aporte (idtipoaporte, descripcion, idproyecto) VALUES ($tipo_aporte, '$linea', $idProject)";
                    mysqli_query($cn, $sql);
                    break;
                case "edit":
                    $pos = $ArrayTemp[$i];
                    echo $pos."-";
                    $sql = "UPDATE aporte SET descripcion = '$linea' WHERE idaporte = $pos";
                    mysqli_query($cn, $sql);
                    break;
            }
    }
    mysqli_close($cn);
?>