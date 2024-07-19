<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idUser = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/asesor/inicio.css">
</head>

<body>
    <?php
    include("../template/header.php");
    ?>
    <div class="container">
        <?php
        include("../template/principal.php");
        ?>
        <div class="content_info">
            <div class="content_inbox">
                <div class="inbox_projets">
                    <div class="head_inbox">
                        <span>Bandeja de entrada de documentos a revisión</span>
                        <span><?php echo "1 - 20 de 100"; ?></span>
                        <div>
                            <a href="#"><img class="img-inicio-skip" src="../../img/icons_document/skip_previous.png"></a>
                            <a href="#"><img class="img-inicio-skip" src="../../img/icons_document/skip_next.png"></a>
                        </div>
                    </div>
                    <div class="body_inbox">
                        <?php
                        $sqlProject = "SELECT rev.*, pro.* FROM revision rev LEFT JOIN proyecto pro ON rev.idproyecto = pro.idproyecto 
                                        WHERE rev.dniasesor = '$idUser' AND rev.estado = 'Enviado'";
                        $filaProject = mysqli_query($cn, $sqlProject);
                        while ($r = mysqli_fetch_assoc($filaProject)) {
                            if ($r["estado"] == "Enviado") {
                        ?>
                                <div class="content_msn_projet">
                                    <div class="info_msn_project">
                                        <div>
                                            <span class="title_span_msn"><?php echo $r["nomproyecto"];?></span>
                                            <a href="" style="text-decoration: none; padding: 5px; background: #ffb800;">C. de diagnóstico</a>
                                        </div>
                                        <div>
                                            <span>Julano Menguano</span>
                                            <span>Fecha de envío: 10/07/2024</span>
                                        </div>
                                    </div>
                                    <div class="options_msn_project">
                                        <div class="option_msn option_first_msn">
                                            <span>Aceptar</span>
                                        </div>
                                        <div class="option_msn option_second_msn">
                                            <span>Rechazar</span>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>