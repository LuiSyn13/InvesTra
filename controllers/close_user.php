<?php
    session_start();

    if (isset($_SESSION['user'])) {
        // Eliminar todas las variables de sesión específicas del usuario
        session_unset(); // Esto elimina todas las variables de sesión
    
        // Destruir la sesión actual
        session_destroy();
    
        // Eliminar la cookie de sesión del navegador
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    
        echo "Sesión del usuario cerrada y variables destruidas.";
    } else {
        echo "No hay una sesión activa para este usuario.";
    }
    header("Location: ../../index.php");
    exit();
?>