<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idProject = $_SESSION["id_project"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antecedentes</title>
    <link rel="stylesheet" href="../../css/antecedentes.css">
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
        <div class="content-info-project" style="width: 95%">
            <center>
                <form action="" style="width: 1250px">
                    <div class="content-form">
                        <table>
                            <tr>
                                <td width="500px">
                                    Tipo de antecedente:
                                    <select name="">
                                        <option value="" disabled selected>
                                            Seleccione el tipo de antecedente
                                        </option>
                                        <option value="">Nacional</option>
                                        <option value="">Internacional</option>
                                        <option value="">Local</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="" style="background-color: #FFB800; border-radius: 10px; padding: 10px 15px; font-weight: bold; cursor: pointer; border: none;">
                                        Mostrar los antecedentes en PDF
                                        <img src="../../img/pdf.png" alt="" width="20px" height="25px" style="margin-left: 7px; vertical-align: middle;">
                                    </a>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <fieldset style="border-radius: 10px">
                            <table style="Width: 100%">
                                <tr>
                                    <td>Apellidos y nombres del autor:</td>
                                    <td colspan="2" width="250px">Título de la Investigación:</td>
                                    <td>Año de la Investigación:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="" id="" style="width: 95%">
                                    </td>
                                    <td colspan="2">
                                        <input type="text" name="" id="" style="width: 95%">
                                    </td>
                                    <td>
                                        <input type="date" name="" id="" style="width: 95%">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Grado o título obtenido:</td>
                                    <td>Universidad:</td>
                                    <td>Nacionalidad:</td>
                                    <td>Muestra:</td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="" id="" style="width: 100%">
                                            <option value="" disabled selected>
                                                Seleccione el grado o título
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" name="" id="" style="width: 95%">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="" style="width: 95%">
                                    </td>
                                    <td>
                                        <input type="text" name="" id="" style="width: 95%">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Objetivo general:</td>
                                    <td colspan="2">Recomendaciones de la Investigación:</td>
                                    <td>Conclusiones:</td>
                                </tr>
                                <tr>
                                    <td rowspan="2">
                                        <textarea name="" id="" style="width: 95%; height: 150px; resize: none; border-radius: 10px; background-color: #EEEEEE; border: 0"></textarea>
                                    </td>
                                    <td rowspan="2" colspan="2">
                                        <textarea name="" id="" style="width: 95%; height: 150px; resize: none; border-radius: 10px; background-color: #EEEEEE; border: 0"></textarea>
                                    </td>
                                    <td rowspan="2">
                                        <textarea name="" id="" style="width: 95%; height: 150px; resize: none; border-radius: 10px; background-color: #EEEEEE; border: 0"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <center>
                                            <input type="submit" value="ACEPTAR" style="background-color: #14FF00; border-radius: 10px; padding: 10px 15px; font-weight: bold; cursor: pointer; border: none;">
                                        </center>
                                    </td>
                                </tr>
                            </table>
            </center>
            </fieldset>
        </div>
        </form>
    </div>
    </div>
</body>

</html>