<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idUser = $_SESSION["user"];
$tuser = $_SESSION["tuser"];

$sql = "select * from $tuser where dni = '$idUser';";
$fila = mysqli_query($cn, $sql);
$dato = mysqli_fetch_assoc($fila);

$sqle = "select * from datosespecificos where dni = '$idUser';";
$filae = mysqli_query($cn, $sqle);
$datoe = mysqli_fetch_assoc($filae);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Generales</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/datos_personales.css">
</head>

<body>
    <?php
    include("../template/header.php");
    ?>
    <div class="container">
        <div class="sidebar">
            <img src="https://via.placeholder.com/80" alt="Profile Picture">
            <a href="#" class="change-photo-link">Cambiar foto de perfil</a>
            <h2>
                <center><?php echo $dato["apaterno"]." ".$dato["amaterno"]." ".$dato["nombre"]; ?></center>
            </h2>
            <p>
                <?php 
                if(isset($datoe["correo"])){
                    echo $datoe["correo"];
                } else { ?> 
                   <i>
                    <?php
                   echo "Correo electrónico pendiente";
                   ?>
                   </i>
                   <?php
                }
                ?>
            </p>
            <a href="../investigador/datos_personales.php?tpo=1">
                <div class="nav-link <?php echo (!isset($_GET['tpo']) || $_GET['tpo'] == 1) ? 'selected' : ''; ?>">
                    <img src="../../img/icons_user/personales.png" class="icon-nav" alt="">Datos Personales
                </div>
            </a>
            <a href="../investigador/datos_personales.php?tpo=2">
                <div class="nav-link <?php echo (isset($_GET['tpo']) && $_GET['tpo'] == 2) ? 'selected' : ''; ?>">
                    <img src="../../img/icons_user/especificos.png" class="icon-nav" alt="">Datos Específicos
                </div>
            </a>
        </div>
        <?php
        if (isset($_GET["tpo"])) {
            $tipo = $_GET["tpo"];
            switch($tipo) {
                case 1: $titulo = "Datos Personales"; break;
                case 2: $titulo = "Datos Específicos"; break;
            }
        } else {
            $tipo = 1;
            $titulo = "Datos Personales";
        }
        ?>
        <div class="main-content">
            <h1><?php echo $titulo; ?></h1>
            <br>
            <form id="dataForm" action="../../controllers/actualizar_datos.php" method="post">
                <?php 
                switch ($tipo) {
                    case 1:
                ?>
                        <div class="form-group">
                            <label for="dni">DNI:</label>
                            <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI" value="<?php echo $dato['dni']; ?>" disabled>
                        </div>
                        <?php if($tuser == "asesor"){?>
                        <div class="form-group">
                            <label for="dni">DINA:</label>
                            <input type="text" id="dina" name="dina" placeholder="Ingrese su DINA" value="<?php echo $dato['dina']; ?>" required>
                        </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="nombre">Nombres:</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombres" value="<?php echo $dato['nombre']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido-paterno">Apellido Paterno:</label>
                            <input type="text" id="apellido-paterno" name="apellido-paterno" placeholder="Ingrese su apellido paterno" value="<?php echo $dato['apaterno']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="apellido-materno">Apellido Materno:</label>
                            <input type="text" id="apellido-materno" name="apellido-materno" placeholder="Ingrese su apellido materno" value="<?php echo $dato['amaterno']; ?>" required>
                        </div>
                        <?php 
                        switch ($tuser) {
                            case 'asesor':
                                ?>
                                <div class="form-group">
                                    <label for="Especialidad">Especialidad:</label>
                                    <select id="Especialidad" name="Especialidad" required>
                                        <option value="" disabled selected>Seleccione su especialidad</option>
                                        <?php 
                                            $sqle = "select * from especialidad";
                                            $fila=mysqli_query($cn,$sqle);

                                            while ($r=mysqli_fetch_assoc($fila)) {
                                            ?>
                                            <option value="<?php echo $r["idespecialidad"]; ?>" 
                                            <?php if($dato["idespecialidad"] == $r["idespecialidad"]){ ?> selected <?php } ?>> 
                                            <?php echo $r["nomespecialidad"];?> </option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                break;
                            case 'investigador':
                                ?>
                                <div class="form-group">    
                                    <label for="carrera">Carrera:</label>
                                    <select id="carrera" name="carrera" required>
                                        <option value="" disabled selected>Seleccione su carrera</option>
                                        <?php
                                            $sqlc = "select * from carrera";
                                            $fila = mysqli_query($cn, $sqlc);

                                            while ($r = mysqli_fetch_assoc($fila)) {
                                            ?>
                                                <option value="<?php echo $r["idcarrera"]; ?>"
                                                <?php if($dato["idcarrera"] == $r["idcarrera"]){ ?> selected <?php } ?>> 
                                                <?php echo $r["nomcarrera"];?> </option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="condicion">Condición:</label>
                                    <select id="condicion" name="condicion" required>
                                        <option value="" disabled selected>Seleccione su condición</option>
                                        <?php
                                            $sqlco = "select * from condicion";
                                            $fila = mysqli_query($cn, $sqlco);

                                            while ($r = mysqli_fetch_assoc($fila)) {
                                            ?>
                                                <option value="<?php echo $r["idcondicion"]; ?>"
                                                <?php if($dato["idcondicion"] == $r["idcondicion"]){ ?> selected <?php } ?>> 
                                                <?php echo $r["nomcondicion"];?> </option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="denominacion">Denominación:</label>
                                    <select id="denominacion" name="denominacion" required>
                                        <option value="" disabled selected>Seleccione su denominación</option>
                                        <?php
                                            $sqld = "select * from denominacion";
                                            $fila = mysqli_query($cn, $sqld);

                                            while ($r = mysqli_fetch_assoc($fila)) {
                                            ?>
                                                <option value="<?php echo $r["iddenominacion"]; ?>"
                                                <?php if($dato["iddenominacion"] == $r["iddenominacion"]){ ?> selected <?php } ?>> 
                                                <?php echo $r["nomdenominacion"];?> </option>
                                            <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                                <?php
                                break;
                        } ?>
                <?php
                        break;
                    case 2:
                ?>
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" id="celular" name="celular" placeholder="Ingrese su número de celular" value="<?php echo $datoe['celular']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico" value="<?php echo $datoe['correo']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección" value="<?php echo $datoe['direccion']; ?>" required>
                        </div>
                <?php
                        break;
                }
                ?>
                <center>
                <div>
                    <input type="hidden" name="tipo" value="<?php echo $tipo;?>">
                    <button type="button" id="acceptButton" class="btn-save">Guardar cambios</button>
                </div>
                </center>
            </form>
        </div>
    </div>

    <div id="confirmationModal" class="modal-confirm">
        <div class="modal-content-confirm">
            <h3><p><b>Guardado exitoso</b></p></h3>
            <p><img src="../../img/icons_register/registrado.png" alt="" width="90px"></p>
        </div>
    </div>

    <script src="../../js/modal-confirm.js"></script>
</body>

</html>
