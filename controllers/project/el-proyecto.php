<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idproyecto = $_POST["idproject"];
    $idUsuario = $_POST["usuario"];
    
    $sql = "select * from proyecto where idproyecto = '$idproyecto' and dni = '$idUsuario'";
    $fila = mysqli_query($cn, $sql);
    $dato = mysqli_fetch_assoc($fila);

    if (isset($dato)) {
        $recorrido = "select * from aporte where idproyecto = '$idproyecto'";
        if(isset($recorrido)){
            $filarecorrido = mysqli_query($cn, $recorrido);
            while ($raporte = mysqli_fetch_assoc($filarecorrido)) {
                
                $idaporte = $raporte["idaporte"];
                $sqlap = "DELETE FROM aporte WHERE idaporte = $idaporte";
                mysqli_query($cn, $sqlap);
            }
        }
        $recorridop = "select * from problema where idproyecto = '$idproyecto'";
        if (isset($recorridop)) {
            $filarecorridop = mysqli_query($cn, $recorridop);
            while ($rproblema = mysqli_fetch_assoc($filarecorridop)) {
                $idproblema = $rproblema["idproblema"];
                $recorridoo = "select * from objetivo where idproblema = '$idproblema'";
                if (isset($recorridoo)) {
                    $filarecorridoo = mysqli_query($cn, $recorridoo);
                    while ($robjetivo = mysqli_fetch_assoc($filarecorridoo)) {
                        
                        $idobjetivo = $robjetivo["idobjetivo"];
                        $recorridoh = "select * from hipotesis where idobjetivo = '$idobjetivo'";
                        if (isset($recorridoh)) {
                            $filarecorridoh = mysqli_query($cn, $recorridoh);
                            while ($rhipotesis = mysqli_fetch_assoc($filarecorridoh)) {
                                
                                $idhipotesis = $rhipotesis["idhipotesis"];
                                $sqlh = "DELETE FROM hipotesis WHERE idhipotesis = $idhipotesis";
                                mysqli_query($cn, $sqlh);
                            }
                        }
                        $sqlo = "DELETE FROM objetivo WHERE idproblema = $idproblema";
                        mysqli_query($cn, $sqlo);
                    }
                }
                $sqlp = "DELETE FROM problema WHERE idproblema = $idproblema";
                mysqli_query($cn, $sqlp);
            }
        }
        $recorrido = "select * from variable where idproyecto = '$idproyecto'";
        if(isset($recorrido)){
            $filarecorrido = mysqli_query($cn, $recorrido);
            while ($rvariable = mysqli_fetch_assoc($filarecorrido)) {
                
                $idvariable = $rvariable["idvariable"];
                $sqlv = "DELETE FROM variable WHERE idvariable = $idvariable";
                mysqli_query($cn, $sqlv);
            }
        }
        $recorrido = "select * from antecedentes where idproyecto = '$idproyecto'";
        if(isset($recorrido)){
            $filarecorrido = mysqli_query($cn, $recorrido);
            while ($rantecedentes = mysqli_fetch_assoc($filarecorrido)) {
                
                $idantecedente = $rantecedentes["idantecedente"];
                $sqlan = "DELETE FROM antecedentes WHERE idantecedente = $idantecedente";
                mysqli_query($cn, $sqlan);
            }
        }

        $recorrido = "select * from revision where idproyecto = '$idproyecto'";
        if(isset($recorrido)){
            $filarecorrido = mysqli_query($cn, $recorrido);
            while ($rrevision = mysqli_fetch_assoc($filarecorrido)) {
                
                $idrevision = $rrevision["idrevision"];
                $sqlre = "DELETE FROM revision WHERE idrevision = $idrevision";
                mysqli_query($cn, $sqlre);
            }
        }
        $sqlap = "DELETE FROM proyecto WHERE idproyecto = $idproyecto";
        mysqli_query($cn, $sqlap);
        mysqli_close($cn);
        header("location: ../../views/investigador/documentos.php");
    } else {
        mysqli_close($cn);
        $mensaje = "No se ha podido eliminar correctamente, vuelva a intentarlo.";
        header("location: ../../views/investigador/documentos.php?msj=$mensaje");
    }

?>