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
    <title>Cuadro diagnóstico</title>
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
            <div class="table-container">

                <table>
                    <tr>
                        <th style="background: #d3d3d3; color: black" height="50">
                            <center>Síntomas</center>
                        </th>
                        <th style="background: #d3d3d3; color: black">
                            <center>Causas</center>
                        </th>
                        <th style="background: #d3d3d3; color: black">
                            <center>Pronóstico</center>
                        </th>
                        <th style="background: #d3d3d3; color: black">
                            <center>Control de pronóstico</center>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="descripcion-container">
                            </div>
                            <textarea name="sintomas" class="txtArea_desc" placeholder="Sintoma 1&#10;Sintoma 2&#10;Sintoma 3&#10;Sintoma 4"></textarea>
                        </td>
                        <td>
                            <div class="descripcion-container">

                            </div>
                            <textarea name="causas" class="txtArea_desc" placeholder="Causa 1&#10;Causa 2&#10;Causa 3&#10;Causa 4"></textarea>
                        </td>
                        <td>
                            <div class="descripcion-container">

                            </div>
                            <textarea name="pronostico" class="txtArea_desc" placeholder="Ingrese el pronóstico aquí..."></textarea>
                        </td>
                        <td>
                            <div class="descripcion-container">

                            </div>
                            <textarea name="control" class="txtArea_desc" placeholder="Ingrese el control aquí..."></textarea>
                        </td>
                    </tr>
                </table>
                </fieldset>
                <div class="btn_gdata_card">
                    <button class="btn_gdata" onclick="submitForm()">Obtener descripción de la realidad problemática</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal">
        <div class="modal-content" id="modalContent">
            <label style="font-weight: bold;"><i>Guía rápida:</i></label>
            <p><i>Para insertar los datos, escriba en los campos correspondientes y presione el botón "Obtener descripción de la realidad problemática".</i></p>
        </div>
    </div>

    <script>
        function submitForm() {
            const sintomas = document.querySelector('[name="sintomas"]').value;
            const causas = document.querySelector('[name="causas"]').value;
            const pronostico = document.querySelector('[name="pronostico"]').value;
            const control = document.querySelector('[name="control"]').value;

            alert(`Síntomas: ${sintomas}\nCausas: ${causas}\nPronóstico: ${pronostico}\nControl: ${control}`);
        }
    </script>
</body>

</html>