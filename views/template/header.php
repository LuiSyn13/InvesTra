<header>
    <div>
        <a href="../../controllers/project/p-cerrar_proyecto.php" class="a-main"><span>Inves<span class="twoTextLogo">Tra</span></span></a>
    </div>
    <div class="cont_search">
        <?php
        include("../../controllers/connection.php");
        $idProject = $_SESSION["id_project"];
        $sql = "SELECT*FROM proyecto WHERE idproyecto = $idProject";
        $filaProject = mysqli_query($cn, $sql);
        $dateProject = mysqli_fetch_assoc($filaProject);
        if ($idProject != 0) {
            $titleProject = $dateProject["nomproyecto"];
        } else if ($idProject == 0) {
            $titleProject = "";
        }

        $idUser = $_SESSION["user"];
        $tuser = $_SESSION["tuser"];
        ?>
        <input type="text" class="search_nav" placeholder="Buscar proyecto..." value="<?php echo $titleProject; ?>">
    </div>
    <div class="icon_opt">
        <img src="../../img/icons_header/notification.png" class="icon-nav">
    </div>
    <div class="user_nav">
        <?php
        $sql = "SELECT*FROM $tuser WHERE dni = '$idUser'";
        $fila = mysqli_query($cn, $sql);
        $date = mysqli_fetch_assoc($fila);
        $info_date = $date["nombre"] . ' ' . $date["apaterno"] . ' ' . $date["amaterno"];
        $len = strlen($info_date);
        if ($len > 20) {
            $dateUser = substr($info_date, 0, 17) . '...';
        } else {
            $dateUser = $info_date;
        }
        $fnome = $date["nombre"][0];
        $fape = $date["apaterno"][0];

        $file_path = "../../img/profile/$idUser.jpg";

        if(file_exists($file_path)){
        ?>
            <img src="../../img/profile/<?php echo $idUser; ?>.jpg" class="user_icon" id="user_icon" width="80" height="80">
        <?php
        } else {
            $file_path = "../../img/profile/$idUser.png";
            if(file_exists($file_path)){
                ?>
                    <img src="../../img/profile/<?php echo $idUser; ?>.png" class="user_icon" id="user_icon" width="80" height="80">
                <?php
                } else {
                ?>
                <div class="user_icon" style="font-family: Arial, Helvetica, sans-serif;" id="user_icon">
                    <?php echo $fnome.$fape; ?></a>
                </div>
                <?php    
            }
        }
        ?>
        <div class="cont_subuserOff" id="content_subuser">
            <div class="submenu_user">
                <div class="date_per_user">
                    <?php
                    $file_path = "../../img/profile/$idUser.jpg";

                    if(file_exists($file_path)){
                    ?>
                        <img src="../../img/profile/<?php echo $idUser; ?>.jpg" class="user_icon" id="user_icon">
                    <?php
                    } else {
                        $file_path = "../../img/profile/$idUser.png";
                        if(file_exists($file_path)){
                            ?>
                                <img src="../../img/profile/<?php echo $idUser; ?>.png" class="user_icon" id="user_icon">
                            <?php
                            } else {
                            ?>
                            <div class="user_icon" style="cursor: default; font-family: Arial, Helvetica, sans-serif;" id="user_icon">
                                <?php echo $fnome.$fape; ?></a>
                            </div>
                            <?php    
                        }
                    }
                    ?>
                    <div class="info_user">
                        <span class="info_user_txt"><?php echo $dateUser; ?></span>
                    </div>
                </div>
                <a class="nav_user" href="../user/datos_usuario.php">Datos Personales</a>
                <a class="nav_user" href="../user/datos_usuario.php?tpo=3">Cambiar Foto de Perfil</a>
                <a class="nav_user" href="../user/datos_usuario.php?tpo=4">Cambiar contraseña</a>
                <a class="nav_user" href="../../index.php">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</header>
<script src="../../js/header.js"></script>