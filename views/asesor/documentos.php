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
                            <th>Estado</th>
                            <th>Fecha enviado</th>
                            <th>C. de diagnóstico</th>
                            <th>Revisar</th>
                            <th>Enviar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Las aventuras del Ingenierio :/</td>
                            <td>Al morzar</td>
                            <td class="option-date">Pendiente</td>
                            <td>13-07-2024</td>
                            <td class="option-date"><button class="btn btn-view">Visualizar</button></td>
                            <td class="option-date"><a href="d-revisar.php" class="btn btn-revise">Revisar</a></td>
                            <td class="option-date"><a href="d-enviar.php" class="btn btn-send">Enviar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>