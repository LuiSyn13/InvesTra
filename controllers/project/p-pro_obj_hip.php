<?php
    include("../auth.php");
    include("../connection.php");
    $idProject = $_SESSION["id_project"];

    $listPlanG = $_POST["txt_planeamientogeneral"];
    $listPlanE = $_POST["txt_planeamientoespecifico"];

    /* Datos para ajuste */
    $tipo_aporte = $_POST["tipo_aporte"];

    // Dividir el texto en líneas
    $lineas = explode("\n", $listPlanE);

    $lineas = array_map('trim', $lineas);

    $sum = 0;
    foreach ($lineas as $linea) {
        if (!empty($linea)) {
            $sum++;
        }
    }

    switch($tipo_aporte) {
        case 1:
            $sqlCount = "SELECT COUNT(*) as res FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 1";
            break;
        case 2:
            $sqlCount = "SELECT COUNT(*) as res FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            WHERE pr.idproyecto = $idProject AND ob.idtipoplaneamiento = 1";            
            break;
        case 3:
            $sqlCount = "SELECT COUNT(*) as res FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                            WHERE pr.idproyecto = $idProject AND hi.idtipoplaneamiento = 1";
            break;
    }
    $filaCount = mysqli_query($cn, $sqlCount);
    $cantSQL = mysqli_fetch_assoc($filaCount);
    $cnt = $cantSQL["res"];
    echo $cnt;
    if($cnt ==  0) {
        echo "No hay registro, NUEVO INSERCIÓN....";
        $tQueryG = "new";
    } elseif ($cnt == 1) {
        echo "Hay registro, se va a editar...";
        $tQueryG = "edit";
    }

    switch($tipo_aporte) {
        case 1:
            switch($tQueryG) {
                case "new":
                    $sql_ProbG = "INSERT INTO problema (idtipoplaneamiento, descripcion, idproyecto) VALUES (1, '$listPlanG', $idProject)";
                    mysqli_query($cn, $sql_ProbG);
                break;
                case "edit":
                    $sqlIdG = "SELECT*FROM problema WHERE idtipoplaneamiento = 1 AND idproyecto = $idProject";
                    $fIdG = mysqli_query($cn, $sqlIdG);
                    $datIdG = mysqli_fetch_assoc($fIdG);
                    $idProG = $datIdG["idproblema"];
                    $sql_ProbG = "UPDATE problema SET descripcion = '$listPlanG' WHERE idproblema = $idProG";
                    mysqli_query($cn, $sql_ProbG);
            }
            break;
        case 2:
            $sqlIdG = "SELECT problema.idproblema FROM problema LEFT JOIN objetivo ON problema.idproblema = objetivo.idproblema
                                    WHERE problema.idtipoplaneamiento = 1 AND objetivo.idproblema IS NULL";
            $fIdG = mysqli_query($cn, $sqlIdG);
            $datIdG = mysqli_fetch_assoc($fIdG);
            if(isset($datIdG["idproblema"])) {
                $idProGe = $datIdG["idproblema"];
                echo "Holaa Aquiiii!!....".$idProGe." aea";
            }
            switch($tQueryG) {
                case "new":
                    $sql_ObjG = "INSERT INTO objetivo (idtipoplaneamiento, descripcion, idproblema) 
                                        VALUES (1, '$listPlanG', $idProGe)";
                    mysqli_query($cn, $sql_ObjG);
                break;
                case "edit":
                    $sqlIdG = "SELECT * FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            WHERE pr.idproyecto = $idProject AND ob.idtipoplaneamiento = 1";
                    $fIdG = mysqli_query($cn, $sqlIdG);
                    $datIdG = mysqli_fetch_assoc($fIdG);
                    $idObjG = $datIdG["idobjetivo"];
                    $sql_ObjG = "UPDATE objetivo SET descripcion = '$listPlanG' WHERE idobjetivo = $idObjG";
                    mysqli_query($cn, $sql_ObjG);
            }
            break;
        case 3:
            $sqlIdG = "SELECT objetivo.idobjetivo FROM objetivo LEFT JOIN hipotesis ON objetivo.idobjetivo = hipotesis.idobjetivo
                                    WHERE objetivo.idtipoplaneamiento = 1 AND hipotesis.idhipotesis IS NULL";
            $fIdG = mysqli_query($cn, $sqlIdG);
            $datIdG = mysqli_fetch_assoc($fIdG);
            if(isset($datIdG["idobjetivo"])) {
                $idObjGe = $datIdG["idobjetivo"];
            }
            switch($tQueryG) {
                case "new":
                    $sql_HipG = "INSERT INTO hipotesis (idtipoplaneamiento, descripcion, idobjetivo) 
                                        VALUES (1, '$listPlanG', $idObjGe)";
                    mysqli_query($cn, $sql_HipG);
                break;
                case "edit":
                    $sqlIdG = "SELECT * FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                            WHERE pr.idproyecto = $idProject AND hi.idtipoplaneamiento = 1";
                    $fIdG = mysqli_query($cn, $sqlIdG);
                    $datIdG = mysqli_fetch_assoc($fIdG);
                    $idHipG = $datIdG["idhipotesis"];
                    $sql_ObjG = "UPDATE hipotesis SET descripcion = '$listPlanG' WHERE idhipotesis = $idHipG";
                    mysqli_query($cn, $sql_ObjG);
            }
            break;
    }

    /* TODO CON ESPECIFICO */

    switch($tipo_aporte) {
        case 1:
            $sqlC = "SELECT COUNT(*) as res FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2";
            break;
        case 2:
            $sqlC = "SELECT COUNT(*) as res FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            WHERE pr.idproyecto = $idProject AND ob.idtipoplaneamiento = 2";            
            break;
        case 3:
            $sqlC = "SELECT COUNT(*) as res FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                            WHERE pr.idproyecto = $idProject AND hi.idtipoplaneamiento = 2";
            break;
    }
    //$sqlC = "SELECT COUNT(*) as res FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2";
    $filaC = mysqli_query($cn, $sqlC);
    $cProSQL = mysqli_fetch_assoc($filaC);
    $cntProG = $cProSQL["res"];
    $dif = abs($sum - $cntProG);
    if($cntProG == 0) {
        echo "No hay registro, NUEVO INSERCIÓN";
        $tQueryE = "new";
    } elseif ($cntProG > $sum) {
        echo "Hay mas registro en la BD, se va a eliminar $dif";
        
        switch($tipo_aporte) {
            case 1:
                $sqlDel = "DELETE FROM problema WHERE idproblema IN ( SELECT idproblema FROM (
                SELECT idproblema FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2 ORDER BY idproblema DESC 
                LIMIT $dif
                ) subquery)";
                mysqli_query($cn, $sqlDel);
                break;
            case 2:
                $sqlDel = "DELETE FROM objetivo WHERE idobjetivo IN ( SELECT idobjetivo FROM (
                    SELECT ob.idobjetivo FROM objetivo ob INNER JOIN problema pr ON ob.idproblema = pr.idproblema 
                    WHERE idproyecto = $idProject AND ob.idtipoplaneamiento = 2 ORDER BY ob.idobjetivo DESC 
                    LIMIT $dif
                ) subquery)";
                mysqli_query($cn, $sqlDel);

                break;
            case 3:
                $sqlDel = "DELETE FROM hipotesis WHERE idhipotesis IN ( SELECT idhipotesis FROM (
                    SELECT hi.idhipotesis FROM objetivo ob INNER JOIN problema pr ON ob.idproblema = pr.idproblema 
                    INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                    WHERE idproyecto = $idProject AND hi.idtipoplaneamiento = 2 ORDER BY hi.idhipotesis DESC
                    LIMIT $dif
                ) subquery)";
                mysqli_query($cn, $sqlDel);

                break;
        }
        $tQueryE = "edit";
    } elseif ($cntProG < $sum) {
        echo "Has mas registro en textArea, se va a crear $dif registros";
        $sqlC = "SELECT COUNT(*) as res FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2";
            $filaIns = mysqli_query($cn, $sqlC);
            $cProIns = mysqli_fetch_assoc($filaIns);
            $cntProIns = $cProIns["res"];
            echo "Cantidad de registros en problemas, no debe ser menor a ".$cntProIns;
        switch($tipo_aporte) {
            case 1:
                while($dif--) {
                    $sql_ProbE = "INSERT INTO problema (idtipoplaneamiento, descripcion, idproyecto) VALUES (2, '...p', $idProject)";
                    mysqli_query($cn, $sql_ProbE);
                }
                break;
            case 2:
                $verifyInsert = abs($cntProG - $cntProIns);
                if($dif <= $verifyInsert) {
                    $falIdProb = "SELECT problema.idproblema FROM problema LEFT JOIN objetivo ON problema.idproblema = objetivo.idproblema
                                    WHERE problema.idtipoplaneamiento = 2 AND objetivo.idproblema IS NULL";
                    $listIdProb = mysqli_query($cn, $falIdProb);

                    $ArrayTemp = array();
                    while($idA = mysqli_fetch_assoc($listIdProb)) {
                        $ArrayTemp[] = $idA["idproblema"];
                    }
                    for ($i=0; $i < $dif; $i++) {
                        $pos = $ArrayTemp[$i];
                        $sqlNewRow = "INSERT INTO objetivo (idtipoplaneamiento, descripcion, idproblema) 
                                        VALUES (2, '...', $pos)";
                        mysqli_query($cn, $sqlNewRow);
                    }
                }
                break;
            case 3:
                $verifyInsert = abs($cntProG - $cntProIns);
                if($dif <= $verifyInsert) {
                    $falIdProb = "SELECT objetivo.idobjetivo FROM objetivo LEFT JOIN hipotesis ON objetivo.idobjetivo = hipotesis.idobjetivo
                                    WHERE objetivo.idtipoplaneamiento = 2 AND hipotesis.idhipotesis IS NULL";
                    $listIdProb = mysqli_query($cn, $falIdProb);

                    $ArrayTemp = array();
                    while($idA = mysqli_fetch_assoc($listIdProb)) {
                        $ArrayTemp[] = $idA["idobjetivo"];
                    }
                    for ($i=0; $i < $dif; $i++) {
                        $pos = $ArrayTemp[$i];
                        $sqlNewRow = "INSERT INTO hipotesis (idtipoplaneamiento, descripcion, idobjetivo) 
                                        VALUES (2, '...h', $pos)";
                        mysqli_query($cn, $sqlNewRow);
                    }
                }
                break;
        }
        $tQueryE = "edit";
    } elseif ($cntProG == $sum) {
        $tQueryE = "edit";
        echo "Solo falta actualizar cambios";
    }

    $sqlC = "SELECT COUNT(*) as res FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2";
            $filaIns = mysqli_query($cn, $sqlC);
            $cProIns = mysqli_fetch_assoc($filaIns);
            $cntProIns = $cProIns["res"];
            echo $cntProIns;
    switch($tipo_aporte) {
        case 1:
            $falIdProb = "SELECT idproblema FROM problema WHERE idtipoplaneamiento = 2 AND idproyecto = $idProject";
            $listIdProb = mysqli_query($cn, $falIdProb);
            $ArrayTemp = array();
            while($idA = mysqli_fetch_assoc($listIdProb)) {
                $ArrayTemp[] = $idA["idproblema"];
            }
            for ($i=0; $i < $sum; $i++) {
                $linea = $lineas[$i];
                if($tQueryE == "new") {                                           
                    $sqlNewRow = "INSERT INTO problema (idtipoplaneamiento, descripcion, idproyecto) 
                                VALUES (2, '$linea', $idProject)";
                } elseif ($tQueryE == "edit") {
                    $posPr = $ArrayTemp[$i]; 
                    $sqlNewRow = "UPDATE problema SET descripcion = '$linea' WHERE idproblema = $posPr";
                }                
                mysqli_query($cn, $sqlNewRow);
            }
            break;
        case 2:
            $verifyInsert = abs($cntProG - $cntProIns);
            if($dif <= $verifyInsert) {
                $falIdProb = "SELECT problema.idproblema FROM problema LEFT JOIN objetivo ON problema.idproblema = objetivo.idproblema
                                WHERE problema.idtipoplaneamiento = 2 AND objetivo.idproblema IS NULL";
                $listIdProb = mysqli_query($cn, $falIdProb);
                $ArrayTemp = array();
                while($idA = mysqli_fetch_assoc($listIdProb)) {
                    $ArrayTemp[] = $idA["idproblema"];
                }
                
                $sqlListObj = "SELECT ob.idobjetivo FROM objetivo ob INNER JOIN problema pr ON ob.idproblema = pr.idproblema 
                    WHERE idproyecto = $idProject AND ob.idtipoplaneamiento = 2";
                $filaObjE = mysqli_query($cn, $sqlListObj);
                $ArrayIdObj = array();

                while ($idObj = mysqli_fetch_assoc($filaObjE)) {
                    $ArrayIdObj[] = $idObj["idobjetivo"];
                }
                for ($i=0; $i < $sum; $i++) {                 
                    $linea = $lineas[$i];
                    if($tQueryE == "new") {   
                        $posPr = $ArrayTemp[$i];                     
                        $sqlNewRow = "INSERT INTO objetivo (idtipoplaneamiento, descripcion, idproblema) 
                                    VALUES (2, '$linea', $posPr)";
                    } elseif ($tQueryE == "edit") {
                        echo "Aqui entra";
                        $posOb = $ArrayIdObj[$i];
                        $sqlNewRow = "UPDATE objetivo SET descripcion = '$linea' WHERE idobjetivo = $posOb";
                    }
                    
                    mysqli_query($cn, $sqlNewRow);
                }
            } else {
                echo "Ya supero la cantidad de registro";
            }
            break;
        case 3:
            $verifyInsert = abs($cntProG - $cntProIns);
            if($dif <= $verifyInsert) {
                $falIdObj = "SELECT objetivo.idobjetivo FROM objetivo LEFT JOIN hipotesis ON objetivo.idobjetivo = hipotesis.idobjetivo
                                WHERE objetivo.idtipoplaneamiento = 2 AND hipotesis.idhipotesis IS NULL";
                $listIdObj = mysqli_query($cn, $falIdObj);

                $ArrayTemp = array();
                while($idA = mysqli_fetch_assoc($listIdObj)) {
                    $ArrayTemp[] = $idA["idobjetivo"];
                }

                $sqlListHip = "SELECT hi.idhipotesis FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                            INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                            WHERE pr.idproyecto = $idProject AND hi.idtipoplaneamiento = 2";
                $filaHipE = mysqli_query($cn, $sqlListHip);
                $ArrayIdHip = array();

                while ($idHipE = mysqli_fetch_assoc($filaHipE)) {
                    $ArrayIdHip[] = $idHipE["idhipotesis"];
                }
                for ($i=0; $i < $sum; $i++) {
                    $linea = $lineas[$i];
                    if($tQueryE == "new") {   
                        $posOb = $ArrayTemp[$i];                     
                        $sqlNewRow = "INSERT INTO hipotesis (idtipoplaneamiento, descripcion, idobjetivo) 
                                    VALUES (2, '$linea', $posOb)";
                    } elseif ($tQueryE == "edit") {
                        echo "Aqui entra";
                        $posObr = $ArrayIdHip[$i];
                        $sqlNewRow = "UPDATE hipotesis SET descripcion = '$linea' WHERE idhipotesis = $posObr";
                    }
                    mysqli_query($cn, $sqlNewRow);
                }
            }
            break;
    }
    mysqli_close($cn);
?>