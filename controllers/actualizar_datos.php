<?php
    include("auth.php");
    include("connection.php");
    $idUser = $_SESSION["user"];
    $tuser = $_SESSION["tuser"];

    $tipo = $_POST["tipo"];

    switch ($tipo) {
        case 1:
            $nombre = $_POST["nombre"];
            $paterno = $_POST["apellido-paterno"];
            $materno = $_POST["apellido-materno"];

            if ($nombre == "" || $paterno == "" || $materno == "") {
                mysqli_close($cn);
                $mensaje = "Rellene todos los campos correctamente.";
                header("location: ../views/user/datos_usuario.php?tpo=$tipo&msj=$mensaje");
            } else {

            switch ($tuser) {
                case 'asesor':
                    $dina = $_POST["dina"];
                    $especialidad = $_POST["Especialidad"];

                    $sql="UPDATE $tuser SET dina = '$dina', nombre = '$nombre', apaterno = '$paterno', 
                                amaterno = '$materno', idespecialidad = '$especialidad'
                            WHERE dni = '$idUser';";

                    break;
                
                case 'investigador':
                    $carrera = $_POST["carrera"];
                    $condicion = $_POST["condicion"];
                    $denominacion = $_POST["denominacion"];

                    $sql="UPDATE $tuser SET nombre = '$nombre', apaterno = '$paterno', amaterno = '$materno', idcarrera = '$carrera',
                                idcondicion = '$condicion', iddenominacion = '$denominacion' 
                            WHERE dni = '$idUser';";

                    break;
                    
            }
        }
            break;
        
        case 2:
            $celular = $_POST["celular"];
            $correo = $_POST["correo"];
            $direccion = $_POST["direccion"];

            $sql="UPDATE datosespecificos SET celular = '$celular', correo = '$correo', direccion = '$direccion'
                    WHERE dni = '$idUser';";

            break;

        case 3:
            $archivo=$_FILES["archivo"]["tmp_name"];
            $nombre=$_FILES["archivo"]["name"];

            list($n,$e)=explode(".",$nombre);

            if($e != 'jpg'){
                if ($e != 'png') {
                    mysqli_close($cn);
                    $mensaje = "No se ha podido realizar el cambio. Verifique su tipo de archivo.";
                    header("location: ../views/user/datos_usuario.php?tpo=$tipo&msj=$mensaje");
                } else {
                    move_uploaded_file($archivo, "../img/profile/".$idUser.".png");
                }
            } else {
                move_uploaded_file($archivo, "../img/profile/".$idUser.".jpg");
            }

            mysqli_close($cn);
            header("location: ../views/user/datos_usuario.php?tpo=$tipo");
            break;
        case 4:
            $actual = $_POST["actual"];
            $nuevo = $_POST["nuevo"];
            $confirm = $_POST["confirmar"];

            $sqlver = "select * from usuario where dni = '$idUser' and password = '$actual';";
            $filaver = mysqli_query($cn,$sqlver);
            $datover = mysqli_fetch_assoc($filaver);

            if (isset($datover)) {
                if ($nuevo == $confirm) {
                    $sql = "update usuario set password = '$nuevo' where dni = '$idUser';";
                } else {
                    mysqli_close($cn);
                    $mensaje = "Las contraseñas ingresadas no coinciden.";
                    header("location: ../views/user/datos_usuario.php?tpo=$tipo&msj=$mensaje");
                }
            } else {
                mysqli_close($cn);
                $mensaje = "La contraseña que ha ingresado es incorrecta.";
                header("location: ../views/user/datos_usuario.php?tpo=$tipo&msj=$mensaje");
            }

            break;
    }

    mysqli_query($cn,$sql);
    mysqli_close($cn);

    header("location: ../views/user/datos_usuario.php?tpo=$tipo");

?>