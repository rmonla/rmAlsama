<?php
if(isset($_POST["agregar"]))
{
$seccion = $_POST["nombre"];

require("conectar.php");
$codigo = $_GET["codigo"];
$inser = "update seccion set nombre_seccion='$seccion' where cod_seccion=$codigo";

if(mysql_query($inser))
	{
		header("location: ver_seccion.php");
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
$sel_seccion = "select * from seccion where cod_seccion=$codi";
$eje_seccion = mysql_query($sel_seccion);
$ver_seccion = mysql_fetch_array($eje_seccion);
?>
<style type="text/css">
<!--
.letra {
	font-family: "Comic Sans MS";
	font-size: 24px;
	text-align: center;
}
.new {
	font-family: "Comic Sans MS";
	text-align: right;
}
-->
</style>
<form name="form1" method="post" action="">
  <table width="500" border="0" align="center">
    <tr>
      <td width="245">&nbsp;</td>
      <td width="245">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="letra"><p>Actualizar Seccion</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="new">Nombre de la Seccion:</td>
      <td><label>
        <input name="nombre" type="text" id="nombre" size="40" value="<?php echo $ver_seccion["nombre_seccion"]; ?>">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="letra"><label>
        <input type="submit" name="agregar" id="agregar" value="Actualizar Seccion">
      </label></td>
    </tr>
  </table>
</form>
<?php
}
?>