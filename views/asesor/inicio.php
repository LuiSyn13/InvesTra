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
                        $sqlProject = "SELECT rev.*, pro.*, investigador.* FROM revision rev LEFT JOIN proyecto pro ON rev.idproyecto = pro.idproyecto, investigador
                                        WHERE rev.dniasesor = '$idUser' AND pro.dni = investigador.dni";
                        $filaProject = mysqli_query($cn, $sqlProject);
                        while ($r = mysqli_fetch_assoc($filaProject)) {
                            if ($r["estado"] == "Enviado" ||$r["estado"] == "Proceso") {
                                $size_nome = strlen($r["nomproyecto"]);
                                if($size_nome > 50) {
                                    $nomePro = substr($r["nomproyecto"], 0, 47).'...';
                                } else {
                                    $nomePro = $r["nomproyecto"];
                                }
                            if ($r["estado"] == "Proceso") {
                                $bgre = "#00ff2f";
                                $text = "Revisar";
                                $estre = 3;

                                $bgom = "#BEBEBE";
                                $textom = "Omitir";
                                $estom = 4;
                            } else {
                                $bgre = "#00B2FF";
                                $text = "Aceptar";
                                $estre = 1;

                                $bgom = "#FF3535";
                                $textom = "Rechazar";
                                $estom = 2;
                            }
                        ?>
                                <div class="content_msn_projet">
                                    <div class="info_msn_project">
                                        <div>
                                            <span class="title_span_msn"><?php echo $nomePro;?></span>
                                            <a href="" style="text-decoration: none; padding: 5px; background: #ffb800;">C. de diagnóstico</a>
                                        </div>
                                        <div>
                                            <span><?php echo $r["apaterno"]." ".$r["amaterno"]." ".$r["nombre"];?></span>
                                            <span><?php echo substr($r["fechaenvio"], 0, 10);?></span>
                                        </div>
                                    </div>
                                    <div class="options_msn_project">
                                        <a href="../../controllers/asesor/p-inicio.php?idre=<?php echo $r["idrevision"]."&est=".$estre."&idpro=".$r["idproyecto"];?>" class="option_msn" style="background: <?php echo $bgre;?>"><?php echo $text;?></a>
                                        <a href="../../controllers/asesor/p-inicio.php?id=<?php echo $r["idrevision"]."&est=".$estom."&idpro=".$r["idproyecto"];?>" class="option_msn" style="background: <?php echo $bgom;?>"><?php echo $textom;?></a>
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
    <script src="../../js/asesor/inicio.js"></script>
</body>

</html>