<?php
include("../../controllers/auth.php");
include("../../controllers/connection.php");
$idProject = $_SESSION["id_project"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
    <?php
    include("../template/link_head.php");
    ?>
</head>

<body>
    <?php
    include("../template/header.php");
    include("../template/proyecto.php");
    ?>
    <div class="container">
        <div class="content-info-project">
            <form action="../../controllers/project/p-variables.php" method="post">
                <div class="content-form">
                    <table>
                        <tr>
                            <td width="400" align="center" style="font-size: 23px; font-weight: bold;">Síntomas</td>
                            <td width="50"></td>
                            <td width="400" align="center" style="font-size: 23px; font-weight: bold;">Causas</td>
                        </tr>
                        <tr>
                            <td align="center" rowspan="3">
                                <br>
                                <textarea class="txtArea_desc" name="" id="" style="width: 80%; height: 250px; resize: none; border-radius: 8px; outline: none; cursor: auto;" placeholder="<?php for ($i = 1; $i <= 4; $i++) echo "Sintoma $i" . "\n" ?>" readonly><?php
                                                                                                                                                                                                                                                                $sql = "SELECT*FROM aporte WHERE aporte.idproyecto = $idProject";
                                                                                                                                                                                                                                                                $fila = mysqli_query($cn, $sql);
                                                                                                                                                                                                                                                                while ($r = mysqli_fetch_assoc($fila)) {
                                                                                                                                                                                                                                                                    if ($r["idtipoaporte"] == 1) {
                                                                                                                                                                                                                                                                        echo "- " . $r["descripcion"] . "\n";
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                ?></textarea>
                            </td>
                            <td></td>
                            <td align="Center" rowspan="3">
                                <br>
                                <textarea class="txtArea_desc" id="" style="width: 80%; height: 250px; resize: none; border-radius: 8px; outline: none; cursor: auto;" placeholder="<?php for ($i = 1; $i <= 4; $i++) echo "Causa $i" . "\n" ?>" readonly><?php
                                                                                                                                                                                                                                                        $sql = "SELECT*FROM aporte WHERE aporte.idproyecto = $idProject";
                                                                                                                                                                                                                                                        $fila = mysqli_query($cn, $sql);
                                                                                                                                                                                                                                                        while ($r = mysqli_fetch_assoc($fila)) {
                                                                                                                                                                                                                                                            if ($r["idtipoaporte"] == 2) {
                                                                                                                                                                                                                                                                echo "- " . $r["descripcion"] . "\n";
                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                        ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td align="center" style="font-size: 17px; font-weight: bold;"><br>VARIABLE DEPENDIENTE (Y)</td>
                            <td></td>
                            <td align="center" style="font-size: 17px; font-weight: bold;"><br>VARIABLE INDEPENDIENTE (X)</td>
                        </tr>
                        <tr>
                            <?php
                            $sqlVar = "SELECT * FROM variable va INNER JOIN tipovariable tv ON va.idtipovariable = tv.idtipovariable WHERE idproyecto = $idProject
                                            ORDER BY tv.nomtipovariable ASC";
                            $filaVar = mysqli_query($cn, $sqlVar);
                            $array = array();
                            $descDep = "";
                            $descInd = "";
                            if (isset($filaVar)) {
                                while ($r = mysqli_fetch_assoc($filaVar)) {
                                    if (isset($r["nomtipovariable"])) {
                                        $array[] = $r["descripcion"];
                                    }                                    
                                }
                                $descDep = $array[0];
                                $descInd = $array[1];
                            }
                            ?>
                            <td align="center">
                                <br><input type="text" name="var_dep" placeholder="Variable dependiente..." required class="inp_var" value="<?php echo $descDep; ?>">
                            </td>
                            <td></td>
                            <td align="center">
                                <br><input type="text" name="var_indep" placeholder="Variable independiente..." required class="inp_var" value="<?php echo $descInd; ?>">
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
                <center>
                    <input class="btn_gdata" type="submit" value="Aceptar">
                </center>
            </form>
        </div>
</body>

</html>