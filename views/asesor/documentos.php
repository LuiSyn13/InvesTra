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
            <span class="title-doc">Listado de documentos recibidos</span>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>Título</td>
                            <td>Empresa</td>
                            <td>Estado</td>
                            <td>Fecha enviado</td>
                            <td>C. de diagnóstico</td>
                            <td>Revisar</td>
                            <td>Enviar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Las aventuras del Ingenierio :/</td>
                            <td>Al morzar</td>
                            <td>Pendiente</td>
                            <td>13-07-2024</td>
                            <td><button>Visualizar</button></td>
                            <td><a href="d-revisar.php">Revisar</a></td>
                            <td><a href="d-enviar.php">Enviar</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>