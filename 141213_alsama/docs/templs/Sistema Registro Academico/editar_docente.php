<?php
if(isset($_POST["agregar"]))
{
$nombre		= $_POST["nombre"];
$apellido	= $_POST["apellido"];
$direccion	= $_POST["direccion"];
$telefono	= $_POST["telefono"];
$sexo		= $_POST["sexo"];
$correo		= $_POST["correo"];
$codigo		= $_GET["codigo"];

require("conectar.php");

$inser = "update docente
		  set
		  nombre_doc 	= '$nombre',
		  apellido_doc	= '$apellido',
		  direccion_doc	= '$direccion',
		  telefono_doc	= '$telefono',
		  sexo_doc		= '$sexo',
		  correo		= '$correo'
		  where cod_docente = $codigo";

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
require("conectar.php");
$codi = $_GET["codigo"];
$sel_doc = "select * from docente where cod_docente = $codi";
$eje_doc = mysql_query($sel_doc);
$ver_doc = mysql_fetch_array($eje_doc);
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
.sss {
	text-align: center;
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
      <td colspan="2" bgcolor="#0099CC" class="letra">Actualizar Docente.</td>
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
                <input type="text" name="nombre" id="nombre" value="<?php echo $ver_doc["nombre_doc"]; ?>">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Apellido:</td>
              <td><label>
                <input type="text" name="apellido" id="apellido" value="<?php echo $ver_doc["apellido_doc"]; ?>">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Direccion:</td>
              <td><label>
                <textarea name="direccion" id="direccion" cols="45" rows="5"><?php echo $ver_doc["direccion_doc"]; ?></textarea>
              </label></td>
              </tr>
            <tr>
              <td class="DER">Telefono:</td>
              <td><label>
                <input type="text" name="telefono" id="telefono" value="<?php echo $ver_doc["telefono_doc"]; ?>">
              </label></td>
              </tr>
            <tr>
              <td class="DER">Sexo:</td>
              <td><label>
                <select name="sexo" id="sexo"><option><?php echo $ver_doc["sexo_doc"]; ?></option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </label></td>
              </tr>
            <tr>
              <td class="DER">Correo:</td>
              <td><label>
                <input name="correo" type="text" id="correo" size="40" value="<?php echo $ver_doc["correo"]; ?>">
              </label></td>
              </tr>
            <tr>
              <td colspan="2" class="DER">&nbsp;</td>
              </tr>
            </table>
          </div>
      </div></td>
</tr>
    <tr>
      <td colspan="2" class="sss"><span class="DER"><span class="letra">
        <input type="submit" name="agregar" id="agregar" value="Actualizar Docente" />
      </span></span></td>
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
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
</script>
<?php
}
?>