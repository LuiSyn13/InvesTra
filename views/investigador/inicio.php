<?php
    include("../../controllers/auth.php");
    $idUser = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/inicio.css">
</head>

<body>
    <?php include("../template/header.php"); ?>
    <div class="container">
        <?php include("../template/principal.php"); ?>
        <div class="content_info">
            <a href="../project/datosgenerales.php" class="a_new_project"><img src="../../img/icons_document/new_project.png"
                    class="icon-nav" alt="">Nuevo proyecto</a>
            <br><br>
            <div class="table-container">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Asesor</th>
                            <th>Estado</th>
                            <th>Abierto por última vez</th>
                            <th>Fecha de creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT p.nomproyecto as titulo, r.dniasesor as asesor, r.estado as estado, p.fechamodificacion as abierto, 
                                            p.fechacreacion as creacion
                                    FROM asesor a INNER JOIN revision r on a.dni = r.dniasesor RIGHT JOIN proyecto p on r.idproyecto = p.idproyecto
                                    WHERE p.dni = '$idUser'
                                    ORDER BY abierto DESC";
                        $fila = mysqli_query($cn, $sql);
                        while ($r = mysqli_fetch_assoc($fila)) {
                        ?>
                        <tr>
                            <td><?php echo $r["titulo"] ?></td>
                            <td>
                            <?php 
                            if(isset($r["asesor"])){
                                echo $r["asesor"];
                            } else { ?>
                            
                             <i>Sin asignar</i>

                            <?php } ?>
                            </td>
                            <td><?php 
                            if(isset($r["estado"])){
                                echo $r["estado"];
                            } else { ?>
                            
                             <i>Asigne un asesor</i>

                            <?php } ?>
                            </td>
                            <td><?php echo $r["abierto"] ?></td>
                            <td><?php echo $r["creacion"] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>