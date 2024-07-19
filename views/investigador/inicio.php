<?php
    include("../../controllers/auth.php");
    include("../../controllers/connection.php");
    $idUser = $_SESSION["user"];
    $tuser = $_SESSION["tuser"];

    $sql = "select inv.nombre, inv.apaterno, inv.amaterno, car.nomcarrera, den.nomdenominacion, 
		            con.nomcondicion, dat.celular, dat.correo, dat.direccion
            from investigador as inv, carrera as car, denominacion as den, condicion as con, datosespecificos as dat
            where inv.idcarrera = car.idcarrera and inv.iddenominacion = den.iddenominacion and 
		            inv.idcondicion = con.idcondicion and inv.dni = dat.dni and inv.dni = $idUser";
    $fila = mysqli_query($cn, $sql);
    $dato = mysqli_fetch_assoc($fila);
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
            <div class="welcome">
            <?php
            $file_path = "../../img/profile/$idUser.jpg";
            
            if(file_exists($file_path)){
            ?>
                <img src="../../img/profile/<?php echo $idUser; ?>.jpg" class="user_icon_welcome">
            <?php
            } else {
                $file_path = "../../img/profile/$idUser.png";
                if(file_exists($file_path)){
                    ?>
                        <img src="../../img/profile/<?php echo $idUser; ?>.png" class="user_icon_welcome">
                    <?php
                    } else {
                    ?>
                    <div class="user_icon_welcome" >
                        <?php echo $fnome.$fape; ?></a>
                    </div>
                    <?php    
                }
            }
            ?>
            <table style="width: 85%;">
                <tr style="font-size: 28px;">
                    <td colspan="3">¡Bienvenid@, <?php echo $tuser." ".$dato["nombre"]." ".$dato["apaterno"]." ".$dato["amaterno"]; ?>!</td>
                </tr>
                <tr>
                    <td>DNI: <?php echo $idUser ?></td>
                    <td>Carrera: <?php echo $dato["nomcarrera"] ?></td>
                    <td>Condicion: <?php echo $dato["nomcondicion"] ?></td>
                </tr>
                <tr>
                    <td>Celular: <?php echo $dato["celular"] ?></td>
                    <td>Correo: <?php echo $dato["correo"] ?></td>
                    <td>Direccion: <?php echo $dato["direccion"] ?></td>
                </tr>
                <tr style="font-size: 20px;">
                    <td colspan="3">¿Qué vamos a hacer hoy?</td>
                </tr>
            </table>
            </div>
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
                                    ORDER BY abierto DESC
                                    LIMIT 5";
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