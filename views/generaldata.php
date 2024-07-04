<?php
include("header.php");
include("proyecto.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/proyecto.css">
</head>

<body>
    <div class="container">
        <div class="content-info-project">
            <form action="">
                <div class="content-form">
                    <table>
                        <tr>
                            <td>Nombre del proyecto:</td>
                            <td><input type="text" name="nombre_proyecto" placeholder="Nombre del proyecto..."></td>
                        </tr>
                        <tr>
                            <td>Nombre de la Empresa:</td>
                            <td><input type="text" name="nombre_empresa" placeholder="Nombre de la empresa..."></td>
                        </tr>
                        <tr>
                            <td>Dirección de la Empresa:</td>
                            <td><input type="text" name="direccion_empresa" placeholder="Dirección de la empresa..."></td>
                        </tr>
                        <tr>
                            <td>Periodo de la Investigación:</td>
                            <td><input type="date" name="fecha_inicio"> > a > <input type="date" name="fecha_fin"></td>
                        </tr>
                        <tr>
                            <td colspan="2">Breve descripción del negocio:</td>
                        </tr>
                        <tr>
                            <td colspan="2"><textarea name="descripcion_negocio" class="txtArea_desc"></textarea></td>
                        </tr>
                    </table>
                </div>
                <input type="submit" value="Aceptar">
            </form>
        </div>
    </div>
</body>

</html>