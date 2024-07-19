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
            Proyectos compartidos:
            <br>
            <br>
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
                                    $sql_c = "SELECT p.*, a.*,r.*
                                            FROM proyecto p, asesor a, revision r
                                            WHERE p.idproyecto = r.idproyecto
                                            AND p.dni = $idUser";

                                    $fila = mysqli_query($cn, $sql_c);
                                    $r_c = mysqli_fetch_assoc($fila);
                                ?>
                            
                            <tr>
                                <td>
                                <?php 
                                    $size_nome = strlen($r_c["nomproyecto"]);
                                    if($size_nome > 50) {
                                    $nomePro = substr($r_c["nomproyecto"], 0, 47).'...';
                                    } else {
                                    $nomePro = $r_c["nomproyecto"];
                                    }
                                    echo $nomePro; 
                                ?>
                                </td>
                                <td><?php echo $r_c["nombre"]." ".$r_c["apaterno"]." ".$r_c["amaterno"]?></td>
                                <td>
                                    <?php echo $r_c["estado"];?>
                                </td>
                                <td><?php echo $r_c["fechaenvio"]; ?></td>
                                <td><?php echo $r_c["fecharevision"];?></td>
                                <td>
                                    <?php                                    
                                        if($r_c["estado"] == "Pendiente"){
                                            $button = "Cancelar envío";
                                    ?>
                                    <br>
                                    <div class="boton-modal">
                                        <center>
                                            <label for="btn-modal" class="btn-1"><?php echo $button; ?></label>
                                        </center>
                                    </div>

                                <input type="checkbox" id="btn-modal">
                                <div class="container-modal">
                                    <div class="content-modal">
                                        <h2 align="center"><?php echo $nomePro?></h2>
                                        <p align="center">¿Estás seguro que deseas cancelar el envío?</p>
                                        <div class="btn">
                                            <label for="btn-modal" class="cancelar">Cancelar</label>
                                            <label for="btn-modal" class="aceptar" type="submit">
                                                Aceptar
                                                <?php
                                                $sql_del = "DELETE FROM revision WHERE idproyecto = $idUser";
                                                mysqli_query($cn,$sql_del);
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <label for="btn-modal" class="cerrar-modal"></label>
                                </div>
                            <?php
                            } else if ($r_c["estado"] == "Revisado") {
                                $button = "Visualizar";
                            ?>
                                <br>
                                <div class="boton-modal">
                                    <center>
                                        <label for="btn-modal" class="btn-2"><?php echo $button; ?></label>
                                    </center>
                                </div>

                                <input type="checkbox" id="btn-modal">
                                <div class="container-modal">
                                    <div class="content-modal">
                                        <h4 align="center"><?php echo $r_c["nomproyecto"]?></h4>
                                        <p align="justify">
                                            Asesor: <?php echo $r_c["nombre"]." ".$r_c["apaterno"]." ".$r_c["amaterno"]?><br>
                                            Estado: <?php echo $r_c["estado"];?><br>
                                            Fecha de revisión: <?php echo $r_c["fecharevision"]; ?><br>
                                            Recomendaciones: <br>
                                            <?php echo $r_c["recomendaciones"]; ?>
                                        </p>
                                        <div class="btn-2">
                                            <center>
                                                <label for="btn-modal" class="aceptar">Aceptar</label>
                                            </center>
                                        </div>
                                    </div>
                                    <label for="btn-modal" class="cerrar-modal"></label>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </center>
        </div>
    </div>
</body>

</html>