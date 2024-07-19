<?php
include("../../controllers/auth.php");
$idUser = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/asesor/document.css">
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
            <span class="title_doc">Listado de documentos recibidos</span>
            <div class="table-container">
                <table class="table_plt">
                    <thead>
                        <tr class="first-tr-tbl">
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Investigador</th>
                            <th>Estado</th>
                            <th>Fecha enviado</th>
                            <th>C. de diagnóstico</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sqlProject = "SELECT rev.*, pro.*, investigador.* FROM revision rev LEFT JOIN proyecto pro ON rev.idproyecto = pro.idproyecto, investigador
                                WHERE rev.dniasesor = '$idUser' AND pro.dni = investigador.dni";
                        $filaProject = mysqli_query($cn, $sqlProject);
                        while ($r = mysqli_fetch_assoc($filaProject)) {
                            if ($r["estado"] == "Pendiente") {
                                $size_nome = strlen($r["nomproyecto"]);
                                if($size_nome > 50) {
                                    $nomePro = substr($r["nomproyecto"], 0, 47).'...';
                                } else {
                                    $nomePro = $r["nomproyecto"];
                                }
                            $nomUser = $r["apaterno"].' '.$r["amaterno"].' '.$r["nombre"];
                            if(strlen($nomUser) > 25) {
                                $nomUser = substr($nomUser, 0, 22)."...";
                            }
                        ?>
                                <tr>
                                    <td><?php echo $nomePro;?></td>
                                    <td><?php echo $r["nomempresa"];?></td>
                                    <td><?php echo $nomUser;?></td>
                                    <td class="option-date"><?php echo $r["estado"];?></td>
                                    <td><?php echo substr($r["fechaenvio"], 0, 10);?></td>
                                    <td class="option-date"><button class="btn btn-view">Visualizar</button></td>
                                    <td class="option-date">
                                        <a href="d-revisar.php?idre=<?php echo $r["idrevision"].'&idpro='.$r["idproyecto"];?>" class="btn btn-revise">Revisar</a>
                                        <a href="d-enviar.php" class="btn btn-send">Enviar</a>
                                    </td>
                                </tr>

                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>