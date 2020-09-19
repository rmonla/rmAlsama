<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {

if(isset($_POST["agregar"]))
{
$nombre    = $_POST["nombre"];
$apellido  = $_POST["apellido"];
$direccion = $_POST["direccion"];
$telefono  = $_POST["telefono"];
$sexo      = $_POST["sexo"];
$correo    = $_POST["correo"];
$usuario   = $_POST["usuario"];
$password  = $_POST["password"];
$imagen    = $_FILES["imagen"]["name"];

require("conectar.php");

copy($_FILES["imagen"]["tmp_name"],"imagen_usuario/".$_FILES["imagen"]["name"]);

$insert = "insert into usuario values('$usuario','$password','5','$imagen','$nombre $apellido')";
mysql_query($insert);

$inser = "insert into docente values(NULL,'$nombre','$apellido','$direccion','$telefono','$sexo','$correo','$usuario')";

if(mysql_query($inser))
{
	header("location: ver_docente.php");
	exit;
}
else
{
	echo mysql_error();
}

}
else
{
?>
<style type="text/css">
<!--
.letra {
	font-size: 24px;
	font-family: "Comic Sans MS";
}
.letra {
	text-align: center;
}
.DER {
	text-align: right;
	font-family: "Comic Sans MS";
}
-->
</style>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css">
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="700" border="0" align="center">
    <tr>
      <td width="345">&nbsp;</td>
      <td width="345">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="letra">Agregar Docente.</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div id="CollapsiblePanel1" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0">DATOS DEL DOCENTE</div>
        <div class="CollapsiblePanelContent">
          <table width="700" border="0">
            <tr>
              <td width="345" class="DER"><p>Nombre:</p></td>
              <td width="345"><label>
                <input type="text" name="nombre" id="nombre">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Apellido:</td>
              <td><label>
                <input type="text" name="apellido" id="apellido">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Direccion:</td>
              <td><label>
                <textarea name="direccion" id="direccion" cols="45" rows="5"></textarea>
              </label></td>
              </tr>
            <tr>
              <td class="DER">Telefono:</td>
              <td><label>
                <input type="text" name="telefono" id="telefono">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Sexo:</td>
              <td><label>
                <select name="sexo" id="sexo">
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </label></td>
              </tr>
            <tr>
              <td class="DER">Correo:</td>
              <td><label>
                <input name="correo" type="text" id="correo" size="40">
              </label></td>
              </tr>
            </table>
          </div>
      </div></td>
</tr>
    <tr>
      <td colspan="2"><div id="CollapsiblePanel2" class="CollapsiblePanel">
        <div class="CollapsiblePanelTab" tabindex="0">DATOS DEL USUARIO</div>
        <div class="CollapsiblePanelContent">
          <table width="700" border="0">
            <tr>
              <td width="342" class="DER">Usuario</td>
              <td width="348"><label>
                <input type="text" name="usuario" id="usuario">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Password</td>
              <td><label>
                <input type="text" name="password" id="password">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Imagen</td>
              <td><label>
                <input type="file" name="imagen" id="imagen">
              </label></td>
              </tr>
            <tr>
              <td colspan="2" class="letra"><label>
                <input type="submit" name="agregar" id="agregar" value="Agregar Docente">
                </label></td>
              </tr>
            </table>
          </div>
      </div></td>
</tr>
    <tr> </tr>
    <tr> </tr>
  </table>
</form>
<table width="700" border="0" align="center">
  <tr>  </tr>
  <tr>  </tr>
</table>
<script type="text/javascript">
<!--
var CollapsiblePanel2 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel2");
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
</script>
<?php
}
  }
  else
  {
	  	  ?>
	  <script>
      alert('El Periodo ya esta Cerrado, Abra uno Nuevo');
      </script>
	  <?php
  }
?>