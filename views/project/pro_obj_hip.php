<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idProject = $_SESSION["id_project"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/pro_obj_hip.css">
</head>

<body>
    <?php
    include("../template/header.php");
    include("../template/proyecto.php");
    ?>
    <div class="container">
        <div class="content-info-project">
            <table border="0" style="display: flex;">
                <tr>
                    <td>
                        <div class="content-form-alimentar">
                            <a href="../project/pro_obj_hip.php?tpo=1">
                                <div class="content-form-opalimentar <?php echo (!isset($_GET['tpo']) || $_GET['tpo'] == 1) ? 'selected' : ''; ?>">
                                    <center><label for="">Problema</label></center>
                                </div>
                            </a>
                            <a href="../project/pro_obj_hip.php?tpo=2">
                                <div class="content-form-opalimentar <?php echo (isset($_GET['tpo']) && $_GET['tpo'] == 2) ? 'selected' : ''; ?>">
                                    <center><label for="">Objetivo</label></center>
                                </div>
                            </a>
                            <a href="../project/pro_obj_hip.php?tpo=3">
                                <div class="content-form-opalimentar <?php echo (isset($_GET['tpo']) && $_GET['tpo'] == 3) ? 'selected' : ''; ?>">
                                    <center><label>Hipótesis</label></center>
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <?php
                        if (isset($_GET["tpo"])) {
                            $tAporte = $_GET["tpo"];
                            switch ($tAporte) {
                                case 1:
                                    $placeH = "Problema";
                                    $sqlG = "SELECT problema.descripcion as desc_pla FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 1";
                                    $sqlE = "SELECT problema.descripcion as desc_pla FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2";
                                    break;
                                case 2:
                                    $placeH = "Objetivo";
                                    $sqlG = "SELECT ob.descripcion as desc_pla FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                                                WHERE pr.idproyecto = $idProject AND ob.idtipoplaneamiento = 1";                                    
                                    $sqlE = "SELECT ob.descripcion as desc_pla FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                                                WHERE pr.idproyecto = $idProject AND ob.idtipoplaneamiento = 2";                                    
                                    break;
                                case 3:
                                    $placeH = "Hipótesis";
                                    $sqlG = "SELECT hi.descripcion as desc_pla FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                                                INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                                                WHERE pr.idproyecto = $idProject AND hi.idtipoplaneamiento = 1";
                                    $sqlE = "SELECT hi.descripcion as desc_pla FROM problema pr INNER JOIN objetivo ob ON pr.idproblema = ob.idproblema 
                                                INNER JOIN hipotesis hi ON ob.idobjetivo = hi.idobjetivo
                                                WHERE pr.idproyecto = $idProject AND hi.idtipoplaneamiento = 2";
                                    break;
                            }
                        } else {
                            $tAporte = 1;
                            $placeH = "Problema";
                            $table = "problema";
                            $sqlG = "SELECT problema.descripcion as desc_pla FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 1";
                            $sqlE = "SELECT problema.descripcion as desc_pla FROM problema WHERE idproyecto = $idProject AND idtipoplaneamiento = 2";
                        }
                        ?>
                        <form action="../../controllers/project/p-pro_obj_hip.php" method="post">
                            <div class="content-form-alimentar" style="padding: 1.7em; background: white; flex-direction: column;">
                                <div class="descripcion-container">
                                    <label><?php echo $placeH; ?> General:</label>
                                    <img src="../../img/ayuda.png" class="icon-nav" id="ayudaImg2">
                                </div>
                                <br>
                                <textArea onkeydown="cancelar()" name="txt_planeamientogeneral" class="txtArea_poh" 
                                    placeholder=""><?php
                                    $fG = mysqli_query($cn, $sqlG);
                                    $dateG = mysqli_fetch_assoc($fG);
                                    if (isset($dateG)) {
                                        echo $dateG["desc_pla"];
                                    }
                                ?></textArea>
                                <br>
                                <div class="descripcion-container">
                                    <label><?php echo $placeH; ?>(s) Específico(s):</label>
                                    <img src="../../img/ayuda.png" class="icon-nav" id="ayudaImg3">
                                </div>
                                <br>
                                <textArea name="txt_planeamientoespecifico" class="txtArea_desc" style="height: 170px" 
                                    placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "$placeH esp. 0$i" . "\n"; ?>"><?php
                                    $filaS = mysqli_query($cn, $sqlE);
                                    while ($r = mysqli_fetch_assoc($filaS)) {
                                        echo $r["desc_pla"] . "\n";
                                    }
                                ?></textArea>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn_gdata_card">
                            <input type="hidden" name="tipo_aporte" value="<?php echo $tAporte;?>">
                            <input type="submit"value="Aceptar" class="btn_gdata">
                        </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="myModal2">
        <div class="modal-content" id="modalContent">
            <label style="font-weight: bold;"><i>Guía rápida:</i></label>
            <p><i>Para establecer correctamente la pregunta general del proyecto se recomienda establecerla como esta serie de ejemplos (pueden ser utilizados como referencia)</i></p>
            <p><i>Ejemplos:<br>¿Por qué dormita la vida?<br>¿Por qué dormita la vida?<br>¿Por qué dormita la vida?<br>¿Por qué dormita la vida?</i></p>
        </div>
    </div>
    <div id="myModal3">
        <div class="modal-content" id="modalContent">
            <label style="font-weight: bold;"><i>Guía rápida:</i></label>
            <p><i>Para insertar los problemas específicos uno por uno, sepárelos presionando ENTER como se observa en el campo de texto.</i></p>
            <label style="font-weight: bold;"><i>Aclaración:</i></label>
            <p><i>El número de problemas específicos que se guardarán deben ser igual al número de objetivos específicos e hipótesis específicas que se plantearon o se plantearán</i></p>
        </div>
    </div>
    <script src="../../js/help.js"></script>

</body>
</html>