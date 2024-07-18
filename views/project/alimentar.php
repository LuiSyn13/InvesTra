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
    <title>Alimentar</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/alimentar.css">
</head>
<body>
    <?php
    include("../template/header.php");
    include("../template/proyecto.php");
    ?>
    <div class="container">
        <div class="content-info-project">
            <table>
                <tr>
                    <td>
                        <div class="content-form-alimentar">
                            <a href="../project/alimentar.php?tpo=1">
                                <div class="content-form-opalimentar <?php echo (!isset($_GET['tpo']) || $_GET['tpo'] == 1) ? 'selected' : ''; ?>">
                                    <center><label for="">Síntoma</label></center>
                                </div>
                            </a>
                            <a href="../project/alimentar.php?tpo=2">
                                <div class="content-form-opalimentar <?php echo (isset($_GET['tpo']) && $_GET['tpo'] == 2) ? 'selected' : ''; ?>">
                                    <center><label for="">Causa</label></center>
                                </div>
                            </a>
                            <a href="../project/alimentar.php?tpo=3">
                                <div class="content-form-opalimentar <?php echo (isset($_GET['tpo']) && $_GET['tpo'] == 3) ? 'selected' : ''; ?>">
                                    <center><label>Pronóstico</label></center>
                                </div>
                            </a>
                            <a href="../project/alimentar.php?tpo=4">
                                <div class="content-form-opalimentar <?php echo (isset($_GET['tpo']) && $_GET['tpo'] == 4) ? 'selected' : ''; ?>">
                                    <center><label for="">Control Pronóstico</label></center>
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
                                switch($tAporte) {
                                    case 1: $placeH = "Síntoma"; break;
                                    case 2: $placeH = "Causa"; break;
                                    case 3: $placeH = "Pronóstico"; break;
                                    case 4: $placeH = "Control Pronóstico"; break;
                                }
                            } else {
                                $tAporte = 1;
                                $placeH = "Síntoma";
                            }
                            echo "Tipo de aporte seleccionado: " . $tAporte;
                        ?>
                        <form id="dataForm" action="../../controllers/project/p-alimentar.php" method="post">
                            <div class="content-form-alimentar" style="padding: 1.7em; background: white; flex-direction: column;">
                                <div class="descripcion-container">
                                    <label>Descripcion:</label>
                                    <img src="../../img/ayuda.png" class="icon-nav" id="ayudaImg">
                                </div>
                                <br>
                                <textarea name="txtalimentar" class="txtArea_desc" placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "$placeH 0$i" . "\n"; ?>"><?php
                                    $sqlA = "SELECT*FROM aporte WHERE idproyecto = $idProject AND idtipoaporte = $tAporte";
                                    $filaS = mysqli_query($cn, $sqlA);
                                    while ($r = mysqli_fetch_assoc($filaS)) {
                                        echo $r["descripcion"] . "\n";
                                    }
                                ?></textarea>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn_gdata_card">
                            <input type="hidden" name="tipo_aporte" value="<?php echo $tAporte;?>">
                            <input type="button" id="acceptButton" value="Aceptar" class="btn_gdata">
                        </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div id="myModal">
            <div class="modal-content" id="modalContent">
                <label style="font-weight: bold;"><i>Guia rapida:</i></label>
                <p><i>Para insertar las causas uno por uno, separelos presionando ENTER como se observa en el campo de texto.</i></p>
            </div>
        </div>

        <div id="confirmationModal" class="modal-confirm">
            <div class="modal-content-confirm">
                <h3><p><b>Guardado exitoso</b></p></h3>
                <p><img src="../../img/icons_register/registrado.png" alt="" width="90px"></p>
            </div>
        </div>

        <script src="../../js/help.js"></script>
        
        <script src="../../js/modal-confirm.js"></script>
</body>
</html>
