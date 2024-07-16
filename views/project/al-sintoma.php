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
    <title>Alimentar - Sintomas</title>
    <?php
    include("../template/link_head.php");
    ?>
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
                            <div class="content-form-opalimentar" style="background: #FFB800; color: black">
                                <center><label for="">Síntoma</label></center>
                            </div>
                            <a href="al-causa.php">
                                <div class="content-form-opalimentar">
                                    <center><label for="">Causa</label></center>
                                </div>
                            </a>
                            <a href="al-pronostico.php">
                                <div class="content-form-opalimentar">
                                    <center><label>Pronostico</label></center>
                                </div>
                            </a>
                            <a href="al-control.php">
                                <div class="content-form-opalimentar">
                                    <center><label for="">Control Pronostico</label></center>
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <form action="../../controllers/project/p-alimentar.php" method="post">
                            <div class="content-form-alimentar" style="padding: 1.7em; background: white; flex-direction: column;">
                                <div class="descripcion-container">
                                    <label>Descripcion:</label>
                                    <img src="../../img/ayuda.png" class="icon-nav" id="ayudaImg">
                                </div>
                                <br>
                                <textarea name="txtalimentar" class="txtArea_desc" placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "Sintoma 0$i" . "\n"; ?>"><?php
                                $sqlA = "SELECT*FROM aporte WHERE idproyecto = $idProject AND idtipoaporte = 1";
                                $filaS = mysqli_query($cn, $sqlA);
                                while ($r = mysqli_fetch_assoc($filaS)) {
                                    echo $r["descripcion"]."\n";
                                }
                                ?></textarea>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn_gdata_card">
                            <input type="hidden" name="tipo_aporte" value="1">
                            <input type="submit" value="Aceptar" class="btn_gdata">
                        </div>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div id="myModal">
        <div class="modal-content" id="modalContent">
            <label style="font-weight: bold;"><i>Guía rápida:</i></label>
            <p><i>Para insertar los síntomas uno por uno, sepárelos presionando ENTER como se observa en el campo de texto.</i></p>
        </div>
    </div>

</body>
<script src="../../js/help.js"></script>

</html>