<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compartidos</title>
    <link rel="stylesheet" href="../css/proyecto.css">
    <link rel="stylesheet" href="../../css/compartidos.css">
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
                        <table border="1" cellspacing="0" style="width: 85%; border-color: lightgrey;">
                            <tr style="background-color: lightgrey;">
                                <td align="center">Título</td>
                                <td align="center">Asesor</td>
                                <td align="center">Estado</td>
                                <td align="center">F. de envío</td>
                                <td align="center">F. de revisión</td>
                                <td align="center">Opciones</td>
                            </tr>
                            <tr>
                                <td>Título de la investigación</td>
                                <td>Nombre del Asesor</td>
                                <td>
                                    <?php 
                                        $estado = "Pendiente";
                                        echo $estado; 
                                    ?>
                                </td>
                                <td>Fecha en la cual fue enviada</td>
                                <td>Fecha en la cual fue revisada</td>
                                <td>
                                    <?php                                    
                                        if($estado == "Pendiente"){
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
                                            <h2 align="center">*Título del Proyecto A*</h2>
                                            <p align="center">¿Estás seguro que deseas cancelar el envío?</p>
                                            <div class="btn">
                                                <label for="btn-modal" class="cancelar">Cancelar</label>
                                                <label for="btn-modal" class="aceptar">Aceptar</label>
                                            </div>
                                        </div>
                                        <label for="btn-modal" class="cerrar-modal"></label>
                                    </div>
                                    <?php
                                        }else if($estado == "Revisado"){
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
                                        <h2 align="center">*Título del Proyecto A*</h2>
                                        <p align="justify">
                                            Asesor:  *Asesor 2*<br>
                                            Estado:  Revisado<br>
                                            Fecha de revisión: dd/mm/aa hh:mm<br>
                                            Recomendaciones:    <br>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
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
                        </table>
                    </center>
        </div>
    </div>
</body>

</html>