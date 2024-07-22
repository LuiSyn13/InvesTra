<?php
    include("../../controllers/auth.php");
    $idpro = $_GET["idpro"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizacion</title>
    <?php
    include("../template/link_head.php");
    ?>
    <link rel="stylesheet" href="../../css/asesor/document.css">
</head>

<body>
    <?php
    include("../template/header.php");
    ?>
    <div class="container">
        <div class="content_ver">
            <div class="readver_pdf">
                <embed src="../../database/pdf/pdf-project/<?php echo $idpro.".pdf";?>" type="application/pdf">
            </div>
        </div>
    </div>
</body>

</html>