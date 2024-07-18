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
                            <div class="content-form-opalimentar" style="width: 145px; background: #FFB800; color: black">
                                <center><label for="">Problema</label></center>
                            </div>
                            <a href="objetivo.php">
                            <div class="content-form-opalimentar" style="width: 145px;">
                                <center><label for="">Objetivo</label></center>
                            </div>
                            </a>
                            <a href="hipotesis.php">
                            <div class="content-form-opalimentar" style="width: 145px;">
                                <center><label for="">Hipótesis</label></center>
                            </div>
                            </a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <form action="">
                            <div class="content-form-alimentar"
                                style="padding: 1.7em; background: white; flex-direction: column;">
                                <div class="descripcion-container">
                                    <label>Problema General:</label>
                                    <img src="../../img/ayuda.png" class="icon-nav" id="ayudaImg2">
                                </div>
                                <br>
                                <textArea onkeydown="cancelar()" name="txtproblemagen" class="txtArea_poh"
                                    placeholder=""></textArea>
                                <br>
                                <div class="descripcion-container">
                                    <label>Problema(s) Específico(s):</label>
                                    <img src="../../img/ayuda.png" class="icon-nav" id="ayudaImg3">
                                </div>
                                <br>
                                <textArea name="txtproblemasesp" class="txtArea_desc"
                                    style="height: 170px"
                                    placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "Problema esp. 0$i" . "\n"; ?>"></textArea>
                            </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="btn_gdata_card">
                            <input type="submit" value="Aceptar" class="btn_gdata">
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