<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Generales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #f1f1f1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-right: 1px solid #ccc;
        }

        .sidebar img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar h2 {
            font-size: 18px;
            margin: 10px 0;
        }

        .sidebar p {
            font-size: 14px;
            color: #777;
        }

        .sidebar .nav-link {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            text-align: center;
            text-decoration: none;
            color: black;
            background-color: #ccc;
            border-radius: 5px;
        }

        .sidebar .nav-link:hover {
            background-color: #bbb;
        }

        .main-content {
            flex: 1;
            padding: 40px;
        }

        .main-content h1 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: normal;
        }

        .form-group {
            display: flex;
            margin-bottom: 15px;
        }

        .form-group label {
            width: 200px;
            text-align: right;
            padding-right: 10px;
            font-size: 16px;
        }

        .form-group input,
        .form-group select {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="text"] {
            width: calc(100% - 30px);
        }

        .form-group select {
            width: 100%;
            background-color: #333;
            color: white;
        }

        .form-group select option {
            color: black;
        }

        .btn-save {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: limegreen;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-save:hover {
            background-color: green;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <img src="https://via.placeholder.com/80" alt="Profile Picture">
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
                <div>
                    <button type="submit" class="btn-save">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>