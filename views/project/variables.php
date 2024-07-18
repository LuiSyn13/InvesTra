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
    <title>Variables</title>
    <?php
    include("../template/link_head.php");
    ?>
</head>
<body>
    <br><br>
    <?php
    include("../template/header.php");
    include("../template/proyecto.php");
    ?>
    <div class="container">
        <div class="content-info-project">
            <form id="dataForm" action="">
                <div class="content-form">
                    <table>
                        <tr>
                            <td width="400" align="center" style="font-size: 23px; font-weight: bold;">Síntomas</td>
                            <td width="200"></td>
                            <td width="400" align="center" style="font-size: 23px; font-weight: bold;">Causas</td>
                        </tr>
                        <tr>
                            <td align="center" rowspan="3">
                                <br>
                                <textarea name="" id="" style="width: 80%; height: 250px; resize: none; border-radius: 8px; background-color: lightgrey; outline: none; cursor: auto;" placeholder="<?php for ($i=1; $i <= 4; $i++) echo "Sintoma $i"."\n"?>" readonly></textarea>
                            </td>
                            <td></td>
                            <td align="Center" rowspan="3">
                                <br>
                                <textarea name="" id="" style="width: 80%; height: 250px; resize: none; border-radius: 8px; background-color: lightgrey; outline: none; cursor: auto;" placeholder="<?php for ($i=1; $i <= 4; $i++) echo "Causa $i"."\n"?>" readonly></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="center" style="font-size: 17px; font-weight: bold;"><br><br><br>VARIABLE DEPENDIENTE (Y)</td>
                            <td></td>
                            <td align="center" style="font-size: 17px; font-weight: bold;"><br><br><br>VARIABLE INDEPENDIENTE (X)</td>
                        </tr>
                        <tr>
                            <td align="center">
                                <br><input type="text" name="" id="" style="width: 100%; height: 35px; border-radius: 8px; background-color: lightgrey;">
                            </td>
                            <td></td>
                            <td align="center">
                                <br><input type="text" name="" id="" style="width: 100%; height: 35px; border-radius: 8px; background-color: lightgrey;">
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
                <center>
                    <input type="button" id="acceptButton" value="Aceptar" style="font-size: 20px; background-color: #14FF00; border-radius: 7px; padding: 7px 12px; font-weight: bold; cursor: pointer; border: none;">
                </center>
            </form>
        </div>
    </div>

    <div id="confirmationModal" class="modal-confirm">
        <div class="modal-content-confirm">
            <h3><p><b>Guardado exitoso</b></p></h3>
            <p><img src="../../img/icons_register/registrado.png" alt="" width="90px"></p>
        </div>
    </div>
</body>
<script src="../../js/modal-confirm.js"></script>
</html>
