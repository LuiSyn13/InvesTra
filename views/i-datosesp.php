<?php
session_start(); 
$datos = $_SESSION['datos'];
$tipo = $datos['tipo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Datos Especificos</title>
  <link rel="icon" href="../img/icons_document/InvesTra.png">
  <link rel="stylesheet" href="../css/register.css">
</head>

<body>
<div class="screen-2" style="width: 700px">
        <div class="logo">
            <img src="../img/icons_document/InvesTra.png" alt="">
        </div>
        <div class="titleform">
            <span>Inves<span class="twoTextLogo">Tra</span></span>
        </div>
        <div class="input-card3"  style="width: 700px">
        <form action="../controllers/p_datosesp.php" method="post">
        <table align="center" border="0" style="width: 650px">
        <tr>
            <td colspan="2">
                <b><label class="txt_input">Complete sus datos personales, <?php echo $tipo; ?>(a):</label></b><br><br>
            </td>
        </tr>
        <tr>
            <td>
            <div class="input-card4" style="margin-right:10px;">
                <label class="txt_input">Celular (opcional)</label>
                <input type="input" class="form__field" name="txtcelular" placeholder="Ingrese su número de celular">
            </div>
            </td>
            <td>
            <div class="input-card4" style="margin-left:10px">
                <label class="txt_input">Correo (opcional)</label>
                <input type="email" class="form__field" name="txtcorreo" placeholder="Ingrese su correo electrónico">
            </div>            
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <div class="input-card4">
            <label class="txt_input">Direccion (opcional)</label>
            <input type="input" class="form__field" name="txtdireccion" placeholder="Ingrese su direccion"/>
            </div>
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" class="aceptar fondo" style="width: 100%" value="Aceptar">
            </td>
            <td align="center">
                <a href="../controllers/p_usuario.php" class="aceptar omitir" style="width: 90%">Omitir</a>
            </td>
        </tr>
        </table>
        </form>
        </div>
</div>
</body>

</html>