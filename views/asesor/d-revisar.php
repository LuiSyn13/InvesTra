<?php
    include("../../controllers/auth.php");
    $idUser = $_SESSION["user"];
    $idre = $_GET["idre"];
    $idpro = $_GET["idpro"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisar</title>
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
        <div class="content_rev">
            <div class="read_pdf">
                <embed src="../../database/pdf/pdf-project/<?php echo $idpro.".pdf";?>" type="application/pdf">
            </div>
            <div class="desc_pdf">
                <span>Añadir comentario:</span>
                <form action="../../controllers/asesor/p-revisar_proyecto.php" method="post">
                    <textarea name="recomendacion" class="textA_rev"><?php
                    $sql = "SELECT*FROM revision WHERE idrevision = $idre AND idproyecto = $idpro AND dniasesor = '$idUser'";
                    $fila = mysqli_query($cn, $sql);
                    $contenido = mysqli_fetch_assoc($fila);
                    echo $contenido["recomendaciones"];
                    ?></textarea>
                    <input type="hidden" name="idre" value="<?php echo $idre;?>">
                    <input type="hidden" name="idpro" value="<?php echo $idpro;?>">
                    <div class="btn_opt">
                        <a href="documentos.php" class="btn btn_doc">Regresar</a>
                        <input class="btn btn_submit" type="submit" value="Aceptar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>