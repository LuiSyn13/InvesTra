<?php
    include("../../controllers/auth.php");
    $idUser = $_SESSION["user"];
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
            <h2>Apellidos y Nombres</h2>
            <p>dato@email.com</p>
            <a href="#" class="nav-link">Datos generales</a>
            <a href="#" class="nav-link">Datos específicos</a>
        </div>
        <div class="main-content">
            <h1>Datos Generales:</h1>
            <form action="">
                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombres:</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombres">
                </div>
                <div class="form-group">
                    <label for="apellido-paterno">Apellido Paterno:</label>
                    <input type="text" id="apellido-paterno" name="apellido-paterno" placeholder="Ingrese su apellido paterno">
                </div>
                <div class="form-group">
                    <label for="apellido-materno">Apellido Materno:</label>
                    <input type="text" id="apellido-materno" name="apellido-materno" placeholder="Ingrese su apellido materno">
                </div>
                <div class="form-group">
                    <label for="carrera">Carrera:</label>
                    <select id="carrera" name="carrera">
                        <option value="">Seleccione su carrera</option>
                        <option value="carrera1">Carrera 1</option>
                        <option value="carrera2">Carrera 2</option>
                        <option value="carrera3">Carrera 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="condicion">Condición:</label>
                    <select id="condicion" name="condicion">
                        <option value="">Seleccione su Condición</option>
                        <option value="condicion1">Condición 1</option>
                        <option value="condicion2">Condición 2</option>
                        <option value="condicion3">Condición 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="denominacion">Denominación:</label>
                    <select id="denominacion" name="denominacion">
                        <option value="">Seleccione su denominación</option>
                        <option value="denominacion1">Denominación 1</option>
                        <option value="denominacion2">Denominación 2</option>
                        <option value="denominacion3">Denominación 3</option>
                    </select>
                </div>
                <center>
                <div >
                    <button type="submit" class="btn-save">Guardar cambios</button>
                </div>
                </center>
            </form>
        </div>
    </div>
</body>

</html>