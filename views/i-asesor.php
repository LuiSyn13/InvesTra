<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Investigador(a)</title>
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
        <form action="../views/i-datosesp.php" method="post">
        <table align="center" border="0" style="width: 650px">
        <tr>
            <td colspan="2">
                <b><label class="txt_input">Complete sus datos personales, investigador(a):</label></b><br><br>
            </td>
        </tr>
        <tr>
            <td>
            <div class="input-card4" style="margin-right:10px;">
                <label class="txt_input">DNI</label>
                <input type="input" class="form__field" name="txtdni" placeholder="Ingrese su DNI" required>
            </div>
            </td>
            <td>
            <div class="input-card4" style="margin-left:10px">
                <label class="txt_input">DINA</label>
                <input type="input" class="form__field" name="txtdina" placeholder="Ingrese su DINA" required>
            </div>            
            </td>
        </tr>
        <tr>
            <td>
            <div class="input-card4" style="margin-right:10px">
            <label class="txt_input">Nombres</label>
            <input type="input" class="form__field" name="txtnombres" placeholder="Ingrese sus nombres" required>
            </div>
            </td>
            <td>
            <div class="input-card4" style="margin-left:10px;">
                <label class="txt_input">Apellido paterno</label>
                <input type="input" class="form__field" name="txtpaterno" placeholder="Ingrese su apellido paterno" required>
            </div>            
            </td>
        </tr>
        <tr>
            <td>
            <div class="input-card4" style="margin-right:10px">
            <label class="txt_input">Apellido materno</label>
            <input type="input" class="form__field" name="txtmaterno" placeholder="Ingrese su apellido materno" required>
            </div>
            </td>
            <td>
            <div class="input-card4" style="margin-left:10px">
                <label class="txt_input">Especialidad</label>
                <div class="select">
                    <select name="lstespecialidad" required>
                    <option value="" disabled selected>Seleccione su esp.</option>
                    <option value="Est">Est</option>
                    <option value="Bach">Bach</option>
                    <option value="MAg">Mag</option>
                    <option value="Dr">Dr</option>
                    </select>
                </div>
            </div>            
            </td>
        </tr>
        <tr>
            <td align="center" colspan="3">
                <input type="submit" class="aceptar fondo" style="width: 50%" value="Aceptar">
            </td>
        </tr>
        </table>
        </form>
        </div>
</div>
</body>

</html>