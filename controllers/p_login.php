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
            
            header('Location: ../views/investigador/inicio.php');
            exit();
        }
    } else {
        echo "Error en la consulta a la base de datos.";
    }
} else {
    echo "Por favor, complete los campos de usuario y contraseña.";
}
?>
