<?php  
session_start();
include("connection.php");

if (isset($_POST["user"]) && isset($_POST["password"])) {
    $user = $_POST["user"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM usuario WHERE dni = '$user' AND password = '$pass';";
    $fila = mysqli_query($cn, $sql);

    if ($fila) {
        $r = mysqli_fetch_assoc($fila);
        $valor = $r["dni"];

        if ($valor == null) {
            header('Location: ../index.php');
            exit();
        } else {         
            $_SESSION["user"] = $valor;
            $_SESSION["auth"] = 1;
            $_SESSION["id_project"] = 0;

            $sqli = "SELECT * FROM investigador WHERE dni = '$user';";
            $filai = mysqli_query($cn, $sqli);
            $ri = mysqli_fetch_assoc($filai);
            
            if(isset($ri["dni"])){
                $_SESSION["tuser"] = "investigador";
                header('Location: ../views/investigador/inicio.php');
            } else{
                /*$sqla = "SELECT * FROM asesor WHERE dni = '$user';";
                $filaa = mysqli_query($cn, $sqla);
                $ra = mysqli_fetch_assoc($filaa);
                if (isset($ra["dni"])){*/
                    $_SESSION["tuser"] = "asesor";
                    header('Location: ../views/asesor/inicio.php');
                /*} else {
                    echo "Ha ocurrido un error. La cuenta no está registrada correctamente.";
                }*/
            }
            
            exit();
        }
    } else {
        echo "Error en la consulta a la base de datos.";
    }
} else {
    echo "Por favor, complete los campos de usuario y contraseña.";
}
?>
