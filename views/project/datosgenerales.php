<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idUser = $_SESSION["user"];
$idProject = $_SESSION["id_project"];
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
            <form id="dataForm" action="../../controllers/project/p-datosgenerales.php" method="post">
                <div class="content-form">
                    <?php
                    if ($idProject != 0) {
                        $sql = "SELECT*FROM proyecto WHERE idproyecto = '$idProject' AND dni = '$idUser'";
                        $fila = mysqli_query($cn, $sql);
                        $dato = mysqli_fetch_assoc($fila);

                        $nomPro = $dato["nomproyecto"];
                        $nomEmp = $dato["nomempresa"];
                        $dirEmp = $dato["direccion"];
                        $per = $dato["periodo"];
                        $fecInt = substr($per, 0, 10);
                        $fecFin = substr($per, 13, 10);
                        $desEmp = $dato["descripcion"];

                        $tQuery = "edit";
                    } else {
                        $nomPro = "";
                        $nomEmp = "";
                        $dirEmp = "";
                        $fecInt = date("Y-m-d");
                        $fecFin = "";
                        $desEmp = "";

                        $tQuery = "new";
                    }
                    ?>
                    <table>
                        <tr>
                            <td>Nombre del proyecto:</td>
                            <td><input type="text" name="nombre_proyecto" value="<?php echo $nomPro; ?>" placeholder="Nombre del proyecto..." class="ip_gdata"></td>
                        </tr>
                        <tr>
                            <td>Nombre de la Empresa:</td>
                            <td><input type="text" name="nombre_empresa" value="<?php echo $nomEmp; ?>" placeholder="Nombre de la empresa..." class="ip_gdata"></td>
                        </tr>
                        <tr>
                            <td>Dirección de la Empresa:</td>
                            <td><input type="text" name="direccion_empresa" value="<?php echo $dirEmp; ?>" placeholder="Dirección de la empresa..." class="ip_gdata"></td>
                        </tr>
                        <tr>
                            <td>Periodo de la Investigación:</td>
                            <td>
                                <input type="date" name="fecha_inicio" value="<?php echo $fecInt; ?>">
                                a
                                <input type="date" name="fecha_fin" value="<?php echo $fecFin; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">Breve descripción del negocio:</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <textarea name="descripcion_negocio" class="txtArea_desc" placeholder="Agrega la descripción"><?php echo $desEmp; ?></textarea>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="btn_gdata_card">
                    <input type="hidden" name="tipo_consulta" value="<?php echo $tQuery; ?>">
                    <input type="hidden" name="id_proyecto" value="<?php echo $idProject; ?>">
                    <input type="button" id="acceptButton" value="Aceptar" class="btn_gdata">
                </div>
            </form>
        </div>
    </div>

    <div id="confirmationModal" class="modal-confirm">
        <div class="modal-content-confirm">
            <h3><p><b>Guardado exitoso</b></p></h3>
            <p><img src="../../img/icons_register/registrado.png" alt="" width="90px"></p>
        </div>
    </div>
</body>
<script src="../../js/modal-confirm.js"></script>

</html>