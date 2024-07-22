<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idProject = $_SESSION["id_project"];
$idUser = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compartidos</title>
    <link rel="stylesheet" href="../css/proyecto.css">
    <link rel="stylesheet" href="../../css/compartidos.css">
    <link rel="stylesheet" href="../../css/documentos.css">
    <?php
    include("../template/link_head.php");
    ?>
</head>

<body>
    <?php
    include("../template/header.php");
    ?>
    <div class="container">
        <?php
        include("../template/principal.php")
        ?>
        <div class="content_info">
            <h2><label style="font-family: Arial, Helvetica, sans-serif;">Proyectos compartidos:</label></h2>
            <br>
            <center>
                <div class="table-container">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <td>Título</td>
                                <td>Asesor</td>
                                <td>Estado</td>
                                <td>F. de envío</td>
                                <td>F. de revisión</td>
                                <td>Opciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql_c = "SELECT p.idproyecto as idproyecto, p.*, a.*,r.*
                                    FROM proyecto p, asesor a, revision r
                                    WHERE p.idproyecto = r.idproyecto
                                    AND r.dniasesor = a.dni
                                    AND p.dni = '$idUser'";

                            $fila = mysqli_query($cn, $sql_c);
                            while ($r_c = mysqli_fetch_assoc($fila)) {
                            ?>

                                <tr>
                                    <td>
                                        <?php
                                        $size_nome = strlen($r_c["nomproyecto"]);
                                        if ($size_nome > 50) {
                                            $nomePro = substr($r_c["nomproyecto"], 0, 47) . '...';
                                        } else {
                                            $nomePro = $r_c["nomproyecto"];
                                        }
                                        echo $nomePro;
                                        ?>
                                    </td>
                                    <td><?php echo $r_c["nombre"] . " " . $r_c["apaterno"] . " " . $r_c["amaterno"] ?></td>
                                    <td>
                                        <?php if($r_c["estado"] == "Proceso" ||$r_c["estado"] == "Pendiente" || $r_c["estado"] == "Enviado") {
                                            $est = "Pendiente";
                                            echo $est;
                                        } else {
                                            echo $r_c["estado"];
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $r_c["fechaenvio"]; ?></td>
                                    <td><?php echo $r_c["fecharevision"]; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-edit">
                                        <?php
                                        if ($r_c["estado"] != "Revisado") {
                                            $button = "Cancelar envío";
                                            echo $button;
                                        } else {
                                            echo "Visualizar";
                                        }
                                        ?>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>

                    </table>
                </div>
            </center>
        </div>
    </div>
</body>

</html>