<header>
    <div>
        <a href="inicio.php" class="a-main"><span>Inves<span class="twoTextLogo">Tra</span></span></a>
    </div>
    <div class="cont_search">
        <input type="text" class="search_nav" placeholder="Buscar proyecto...">
    </div>
    <div class="icon_opt">
        <img src="../../img/icons_header/notification.png" class="icon-nav">
    </div>
    <div class="user_nav">
        <div class="user_icon" id="user_icon">
            <span class="icon_user_txt">MN</span>
        </div>
        <div class="cont_subuserOff" id="content_subuser">
            <div class="submenu_user">
                <?php
                include("../../controllers/connection.php");
                $sql = "SELECT*FROM investigador WHERE dni = '70982942'";
                $fila = mysqli_query($cn, $sql);
                $date = mysqli_fetch_assoc($fila);
                $info_date = $date["nombre"] . ' ' . $date["apaterno"] . ' ' . $date["amaterno"];
                $len = strlen($info_date);
                if($len > 20) {
                    $dateUser = substr($info_date, 0, 17).'...';
                } else {
                    $dateUser = $info_date;
                }
                ?>
                <div class="date_per_user">
                    <div class="user_icon" id="user_icon">
                        <a href="fotoperfil.php" class="icon_user_txt">MN</a>
                    </div>
                    <div class="info_user">
                        <span class="info_user_txt"><?php echo $dateUser; ?></span>
                    </div>
                </div>
                <a class="nav_user" href="../investigador/datos_personales.php">Datos Personales</a>
                <a class="nav_user" href="#">Cambiar Foto de Perfil</a>
                <a class="nav_user" href="../asesor/inicio.php">Cambiar contraseña</a>
                <a class="nav_user" href="../../index.php">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</header>
<script src="../../js/header.js"></script>