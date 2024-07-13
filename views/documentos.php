<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <?php include("template/link_head.php"); ?>
    <style>
        .content_info {
            margin-bottom: 20px;
        }

        .table-container {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container th, .table-container td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        .table-container th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            padding: 5px 10px;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-view {
            background-color: #00bfff;
            color: white;
        }

        .btn-edit {
            background-color: #ffbf00;
            color: white;
        }

        .btn-delete {
            background-color: #ff6347;
            color: white;
        }

        .btn-visualize {
            background-color: #00bfff;
            color: white;
        }

        .btn-send {
            background-color: #00ff00;
            color: white;
        }
    </style>
</head>
<body>
    <?php include("template/header.php"); ?>
    <div class="container">
        <?php include("template/principal.php"); ?>
        <div class="content_info">
            <a href="generaldata.php" class="a_new_project">
                <img src="../img/icons_document/new_project.png" class="icon-nav" alt=""> Nuevo proyecto
            </a>
            <div class="table-design-content">
                <label for="">Investra</label>
            </div>
        </div>
    </div>
</body>
</html>