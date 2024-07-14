<?php
    include("../../controllers/auth.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Generales</title>
    <?php
    include("../template/link_head.php");
    ?>
</head>

<body>
    <?php
    include("../template/header.php");
    include("../template/proyecto.php");
    ?>
    <div class="container">
        <div class="content-info-project">
            <form action="../../controllers/project/p-datosgenerales.php" method="post">
                <div class="content-form">
                    <table>
                        <tr>
                            <td>Nombre del proyecto:</td>
                            <td><input type="text" name="nombre_proyecto" placeholder="Nombre del proyecto..." class="ip_gdata"></td>
                        </tr>
                        <tr>
                            <td>Nombre de la Empresa:</td>
                            <td><input type="text" name="nombre_empresa" placeholder="Nombre de la empresa..." class="ip_gdata"></td>
                        </tr>
                        <tr>
                            <td>Dirección de la Empresa:</td>
                            <td><input type="text" name="direccion_empresa" placeholder="Dirección de la empresa..." class="ip_gdata"></td>
                        </tr>
                        <tr>
                            <td>Periodo de la Investigación:</td>
                            <td><input type="date" name="fecha_inicio"> a <input type="date" name="fecha_fin"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Breve descripción del negocio:</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="descripcion_negocio" class="txtArea_desc" 
                                placeholder="Agrega la descripción"></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="btn_gdata_card">
                    <input type="submit" value="Aceptar" class="btn_gdata">
                </div>
            </form>
        </div>
    </div>
</body>

</html>