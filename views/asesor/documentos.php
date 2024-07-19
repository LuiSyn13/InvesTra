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
    <link rel="stylesheet" href="../../css/documentos.css">

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
                                if ($size_nome > 50) {
                                    $nomePro = substr($r["nomproyecto"], 0, 47) . '...';
                                } else {
                                    $nomePro = $r["nomproyecto"];
                                }
                                $nomUser = $r["apaterno"] . ' ' . $r["amaterno"] . ' ' . $r["nombre"];
                                if (strlen($nomUser) > 25) {
                                    $nomUser = substr($nomUser, 0, 22) . "...";
                                }
                        ?>
                                <tr>
                                    <td><?php echo $nomePro; ?></td>
                                    <td><?php echo $r["nomempresa"]; ?></td>
                                    <td><?php echo $nomUser; ?></td>
                                    <td class="option-date"><?php echo $r["estado"]; ?></td>
                                    <td><?php echo substr($r["fechaenvio"], 0, 10); ?></td>
                                    <td class="option-date"><button class="btn btn-view">Visualizar</button></td>
                                    <td class="option-date">
                                        <a href="d-revisar.php?idre=<?php echo $r["idrevision"] . '&idpro=' . $r["idproyecto"]; ?>" class="btn btn-revise">Revisar</a>
                                        <a href="#" class="btn btn-send" id="btn-abrir-modal" 
                                        data-nomproyecto="<?php echo $r['recomendaciones']; ?>" 
                                        data-idproyecto="<?php echo $r["idproyecto"]; ?>"
                                        data-idrevision="<?php echo $r["idrevision"];?>">Enviar</a>

                                        <div id="modal">
                                            <h3>Recomendaciones</h3>
                                            <span>
                                                <center id="modal-nomproyecto"></center>
                                            </span>
                                            <form action="../../controllers/project/p-enviar_proyecto.php" method="post">
                                                <div class="form-group">
                                                    <input type="hidden" name="idrevision" id="idrevision">
                                                    <input type="hidden" name="idproject" id="idproject">
                                                    <input type="hidden" name="idasesor" value="<?php echo $idUser; ?>">
                                                </div>
                                                <div class="modal-buttons">
                                                    <input type="submit" class="btn btn-send" style="font-weight: bold; border-radius: 10px">
                                                    <a href="#" class="btn btn-delete" style="font-weight: bold; border-radius: 10px" id="btn-cerrar-modal">Cancelar</a>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="modal-background" id="modal-background"></div>
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
<script src="../../js/modal_doc.js"></script>
</body>

</html>