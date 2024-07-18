<?php
    include("auth.php");
    include("connection.php");
    $idUser = $_SESSION["user"];
    $tuser = $_SESSION["tuser"];

    $nombre = $_POST["nombre"];
    $paterno = $_POST["apellido-paterno"];
    $materno = $_POST["apellido-materno"];

    switch ($tuser) {
        case 'asesor':
            $dina = $_POST["dina"];
            $especialidad = $_POST["Especialidad"];

            $sql="UPDATE $tuser SET dina = '$dina', nombre = '$nombre', apaterno = '$paterno', 
                        amaterno = '$materno', idespecialidad = '$especialidad'
                    WHERE dni = '$idUser';";

            mysqli_query($cn,$sql);
            mysqli_close($cn);

            header("location: ../views/investigador/datos_personales.php");

            break;
        
        case 'investigador':
            $carrera = $_POST["carrera"];
            $condicion = $_POST["condicion"];
            $denominacion = $_POST["denominacion"];

            $sql="UPDATE $tuser SET nombre = '$nombre', apaterno = '$paterno', amaterno = '$materno', idcarrera = '$carrera',
                        idcondicion = '$condicion', iddenominacion = '$denominacion' 
                    WHERE dni = '$idUser';";

            mysqli_query($cn,$sql);
            mysqli_close($cn);

            header("location: ../views/investigador/datos_personales.php");

            break;
            
    }
?>