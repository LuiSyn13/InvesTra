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
    <link rel="stylesheet" href="../../css/cuadro_diagnostico.css">
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
                    <thead>
                        <tr>
                            <th>Síntomas</th>
                            <th>Causas</th>
                            <th>Pronóstico</th>
                            <th>Control de Pronóstico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            
                            <td>
                                <textarea name="sintomas" class="textArea" readonly>
                                <?php
                                // Consulta para obtener los síntomas
                                $sql = "SELECT descripcion FROM aporte WHERE idproyecto = $idProject AND idtipoaporte = 1";
                                $result = mysqli_query($cn, $sql);
                                if ($result === false) {
                                    die('Error en la consulta SQL: ' . mysqli_error($cn));
                                }
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "- " . htmlspecialchars($row["descripcion"]) . "\n";
                                }
                                ?>
                                </textarea>
                            </td>
                            
                            <td>
                                <textarea name="causas" class="textArea" 
                                placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "Causas 0$i" . "\n"; ?>"><?php
                                    $sql = "SELECT*FROM aporte WHERE aporte.idproyecto = $idProject";
                                    $fila = mysqli_query($cn, $sql);
                                    while($r = mysqli_fetch_assoc($fila)) {
                                        if($r["idtipoaporte"] == 2) {
                                            echo "- ".$r["descripcion"]."\n";
                                        }
                                    }
                                ?></textarea>
                            </td>
                            <td>
                                <textarea name="pronostico" class="textArea" 
                                placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "Pronóstico 0$i" . "\n"; ?>"><?php
                                    $sql = "SELECT*FROM aporte WHERE aporte.idproyecto = $idProject";
                                    $fila = mysqli_query($cn, $sql);
                                    while($r = mysqli_fetch_assoc($fila)) {
                                        if($r["idtipoaporte"] == 3) {
                                            echo "- ".$r["descripcion"]."\n";
                                        }
                                    }
                                ?></textarea>
                            </td>
                            <td>
                                <textarea name="control" class="textArea" 
                                placeholder="<?php for ($i = 1; $i <= 9; $i++) echo "Control de pronóstico 0$i" . "\n"; ?>"><?php
                                    $sql = "SELECT*FROM aporte WHERE aporte.idproyecto = $idProject";
                                    $fila = mysqli_query($cn, $sql);
                                    while($r = mysqli_fetch_assoc($fila)) {
                                        if($r["idtipoaporte"] == 4) {
                                            echo "- ".$r["descripcion"]."\n";
                                        }
                                    }
                                ?></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </fieldset>
                <div class="btn_gdata_card">
                    <a class="btn_gdata" href="mostrar_realidad.php">Obtener descripción de la realidad problemática</a>
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