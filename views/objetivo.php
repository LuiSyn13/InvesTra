<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problema</title>
    <?php
    include("link_head.php");
    ?>
</head>
<body>
    <?php
        include("header.php");
        include("proyecto.php");
    ?>
    <div class="container" style="">
        <div class="content-info-project">
            <table border="0" style="display: flex;">
                <tr>
                    <td>
                        <div class="content-form-alimentar">
                            <a href="problema.php">
                            <div class="content-form-opalimentar" style="width: 145px;">
                                <center><label for="">Problema</label></center>
                            </div>
                            </a>
                            <div class="content-form-opalimentar" style="width: 145px; background: #FFB800; color: black">
                                <center><label for="">Objetivo</label></center>
                            </div>
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
                                    <label>Objetivo General:</label>
                                    <img src="../img/ayuda.png" class="icon-nav" id="ayudaImg2">
                                </div>
                                <br>
                                <textArea onkeydown="cancelar()" name="txtproblemagen" class="txtArea_poh"
                                    placeholder=""></textArea>
                                <br>
                                <div class="descripcion-container">
                                    <label>Objetivo(s) Específico(s):</label>
                                    <img src="../img/ayuda.png" class="icon-nav" id="ayudaImg3">
                                </div>
                                <br>
                                <textArea onkeydown="cancelar()" name="txtproblemasesp" class="txtArea_poh"
                                    style="height: 170px"
                                    placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "Objetivo esp. 0$i" . "\n"; ?>"></textArea>
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
        <div class="modal-content2" id="modalContent">
            <label style="font-weight: bold;"><i>Guía rápida:</i></label>
            <p><i>Para establecer correctamente el objetivo general y los objetivos específicos del proyecto, se debe verbalizar. Es decir, establecerlo con verbos infinitivos.</i></p>
            <p><i>Verbos infinitivos: Son aquellos que no están conjugados, es decir que no expresan ni tiempo verbal, ni modo, ni persona (terminados en -ar, -er, -ir).</i></p>
            <p><i>Ejemplo: Administr<b>ar</b>, favorec<b>er</b>, resum<b>ir.</b></i></p>
        </div>
    </div>
    <div id="myModal3">
        <div class="modal-content3" id="modalContent">
        <label style="font-weight: bold;"><i>Guía rápida:</i></label>
            <p><i>Para insertar los objetivos específicos uno por uno, sepárelos presionando ENTER como se observa en el campo de texto.</i></p>
            <label style="font-weight: bold;"><i>Aclaración:</i></label>
            <p><i>El número de objetivos específicos que se guardarán deben ser igual al número de problemas específicos e hipótesis específicas que se plantearon o se plantearán.</i></p>
        </div>
    </div>

</body>
<script src="../js/help.js"></script>
</body>
</html>