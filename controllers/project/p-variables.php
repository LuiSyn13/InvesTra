<?php
    include("../auth.php");
    include("../connection.php");
    $idProject = $_SESSION["id_project"];

    $var_dep = $_POST["var_dep"];
    $var_indep = $_POST["var_indep"];

    $sql = "SELECT * FROM variable WHERE idproyecto = $idProject";
    $fila = mysqli_query($cn, $sql);
    $val = mysqli_fetch_assoc($fila);
    if($val == null) {
        $sqlVarD = "INSERT INTO variable (idtipovariable, descripcion, idproyecto) VALUES (1, '$var_dep', $idProject)";
        $sqlVarI = "INSERT INTO variable (idtipovariable, descripcion, idproyecto) VALUES (2, '$var_indep', $idProject)";
    } else {
        $sqlVarD = "UPDATE variable SET descripcion = '$var_dep' WHERE idtipovariable = 1 AND idproyecto = $idProject";
        $sqlVarI = "UPDATE variable SET descripcion = '$var_indep' WHERE idtipovariable = 2 AND idproyecto = $idProject";
    }
    mysqli_query($cn, $sqlVarD);
    mysqli_query($cn, $sqlVarI);

    header("Location: ../../views/project/variables.php")
?>