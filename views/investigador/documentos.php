<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <?php include("../template/link_head.php"); ?>
    <link rel="stylesheet" href="../../css/documentos.css">
</head>
<body>
    <?php include("../template/header.php"); ?>
    <div class="container">
        <?php include("../template/principal.php"); ?>
        <div class="content_info">
            <a href="../project/generaldata.php" class="a_new_project"><img src="../../img/icons_document/new_project.png"
                    class="icon-nav" alt="">Nuevo proyecto</a>
            <br><br>
            <div class="table-container">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            <th>C. de diagnóstico</th>
                            <th>Enviar revisión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < 2; $i++) { ?>
                        <tr>
                            <td>*Título proyecto A*</td>
                            <td>*Empresa A*</td>
                            <td>Completo</td>
                            <td>
                                <a href="#" class="btn btn-view">Ver</a>
                                <a href="#" class="btn btn-edit">Editar</a>
                                <a href="#" class="btn btn-delete">Eliminar</a>
                            </td>
                            <td><a href="#" class="btn btn-view">Visualizar</a></td>
                            <td><a href="#" class="btn btn-send" id="btn-abrir-modal">Enviar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="modal">
        <h2><center>*Titulo del Proyecto A*</center></h2>
        <p><label>Asesor:   </label><br><br>
        <select name="cboasesor" id="" style="width: 100%">
            <option value="" disabled selected>Seleccione al asesor</option>
            <option value="" >Asesor A</option>
            <option value="" >Asesor B</option>
        </select></p>
        <table align="center">
        <tr>
        <td><a href="#" class="btn btn-send" style="font-weight: bold; border-radius: 10px" >Aceptar</a></td>
        <td width="50%"></td>
        <td><a href="#" class="btn btn-delete" style="font-weight: bold; border-radius: 10px" id="btn-cerrar-modal">Cancelar</a></td>
        </tr>
        </table>
    </div>
    <div class="modal-background" id="modal-background"></div>
</body>

<script src="../../js/modal.js"></script>

</html>
