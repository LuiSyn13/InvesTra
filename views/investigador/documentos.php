<?php
    include("../../controllers/auth.php");
    $idUser = $_SESSION["user"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos</title>
    <?php include("../template/link_head.php"); ?>
    <link rel="stylesheet" href="../../css/documentos.css">
</head>
<body>
    <?php include("../template/header.php"); ?>
    <div class="container">
        <?php include("../template/principal.php"); ?>
        <div class="content_info">
            <a href="../project/datosgenerales.php" class="a_new_project"><img src="../../img/icons_document/new_project.png"
                    class="icon-nav" alt="">Nuevo proyecto</a>
            <br><br>
            <div class="table-container">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Empresa</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                            <th>C. de diagnóstico</th>
                            <th>Enviar revisión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT*FROM proyecto WHERE dni = '$idUser'";
                        $fila = mysqli_query($cn, $sql);
                        while ($r = mysqli_fetch_assoc($fila)) {
                        ?>
                        <tr>
                            <td>
                            <?php 
                            $size_nome = strlen($r["nomproyecto"]);
                            if($size_nome > 50) {
                                $nomePro = substr($r["nomproyecto"], 0, 47).'...';
                            } else {
                                $nomePro = $r["nomproyecto"];
                            }
                            echo $nomePro; 
                            ?>
                            </td>
                            <td>
                            <?php
                            $size_emp = strlen($r["nomempresa"]);
                            if($size_emp > 35) {
                                $nomeEmp = substr($r["nomempresa"], 0, 32).'...';
                            } else {
                                $nomeEmp = $r["nomempresa"];
                            }
                            echo $nomeEmp; 
                            ?>
                            </td>
                            <td><?php 
                            
                            $sqle = "SELECT COUNT(*) as cantidad FROM antecedentes WHERE idproyecto = $r[idproyecto]";
                            $filae = mysqli_query($cn, $sqle);
                            $re = mysqli_fetch_assoc($filae);
                            if ($re['cantidad'] >= '2') {
                                ?>Completo<?php
                            } else {
                                ?>Incompleto<?php
                            }
                            ?>
                            </td>
                            <td>
                                <a href="../project/descargar_proyecto.php" class="btn btn-view">Ver</a>
                                <a href="../../controllers/project/e-datosgenerales.php?ipt=<?php echo $r["idproyecto"];?>" class="btn btn-edit">Editar</a>
                                <a href="#" class="btn btn-delete" id="btn-abrir-modal2" data-nomproyecto2="<?php echo $r['nomproyecto'];?>" data-idproyecto2 = "<?php echo $r["idproyecto"];?>">Eliminar</a>

                                <div id="modal2">
                                    <h2><center id="modal-nomproyecto2"></center></h2>
                                    <form action="../../controllers/project/el-proyecto.php" method="post">
                                        
                                        <label><center><h2>¿Estás seguro que quieres eliminar el proyecto?</h2></center></label>
                                        <input type="hidden" name="idproject" id="idproject2">
                                        <input type="hidden" name="usuario" value="<?php echo $idUser;?>">
                                        
                                        <div class="modal-buttons">
                                            <input type="submit" class="btn btn-send" style="font-weight: bold; border-radius: 10px">
                                            <a href="#" class="btn btn-delete" style="font-weight: bold; border-radius: 10px" id="btn-cerrar-modal2">Cancelar</a>
                                        </div>
                                    </form>
                                    
                                </div>
                                <div class="modal-background" id="modal-background2"></div>
                            </td>
                            <td><a href="Visualizar.php?idproyecto=<?php echo $r['idproyecto']; ?>" class="btn btn-view">Visualizar</a></td>
                            <td>
                                <a href="#" class="btn btn-send" id="btn-abrir-modal" data-nomproyecto="<?php echo $r['nomproyecto'];?>" data-idproyecto = "<?php echo $r["idproyecto"];?>">Enviar</a>

                                <div id="modal">
                                    <h2><center id="modal-nomproyecto"></center></h2>
                                    <form action="../../controllers/project/p-enviar_proyecto.php" method="post">
                                        <div class="form-group">
                                        <label for="cboasesor">Asesor:</label>
                                        <input type="hidden" name="idproject" id="idproject">
                                        <select name="cboasesor" id="idasesor">
                                            <!--<option value="" disabled selected>Seleccione al asesor</option>-->
                                            <?php
                                                $sqlAsesor = "SELECT*FROM asesor ase INNER JOIN especialidad es ON ase.idespecialidad = es.idespecialidad";                                                
                                                $filaAsesor = mysqli_query($cn, $sqlAsesor);
                                                while($ra = mysqli_fetch_assoc($filaAsesor)) {
                                                    ?>
                                                        <option value="<?php echo $ra["dni"];?>"><?php echo $ra["apaterno"]." ".$ra["amaterno"]." ".$ra["dni"]." - ".$ra["nomespecialidad"];?></option>
                                                    <?php
                                                }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="modal-buttons">
                                            <input type="submit" class="btn btn-send" style="font-weight: bold; border-radius: 10px">
                                            <a href="#" class="btn btn-delete" style="font-weight: bold; border-radius: 10px" id="btn-cerrar-modal">Cancelar</a>
                                        </div>
                                    </form>
                                    
                                </div>
                                <div class="modal-background" id="modal-background"></div>
                            </td>
                           
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br><br>
                <?php
                    if(isset($_GET["msj"])){
                        $mensaje=$_GET["msj"];
                        echo "<center><h2 id='titulo'>$mensaje</h2></center>";
                    }
                    ?>
            </div>
        </div>
    </div>
</body>

<script src="../../js/modal_doc.js"></script>

</html>
