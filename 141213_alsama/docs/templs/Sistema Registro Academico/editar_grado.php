<?php
if(isset($_POST["agregar"]))
{
require("conectar.php");
$nombre = $_POST["nombre"];
$codigo = $_GET["codigo"];

$inser = "update grado set nombre_grado = '$nombre' where cod_grado = $codigo";

if(mysql_query($inser))
	{
		header("location: ver_grado.php");
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
$sel_grado = "select * from grado where cod_grado = $codi";
$eje_grado = mysql_query($sel_grado);
$ver_grado = mysql_fetch_array($eje_grado);
?>
<style type="text/css">
<!--
.centro {
	text-align: center;
	font-family: "Comic Sans MS";
	font-size: 24px;
}
.letra {
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
      <td colspan="2" bgcolor="#0099CC" class="centro">Actualizar Grado</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="letra">Nombre del Grado:</td>
      <td><label>
        <input name="nombre" type="text" id="nombre" size="40" value="<?php echo $ver_grado["nombre_grado"]; ?>">
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="centro"><label>
        <input type="submit" name="agregar" id="agregar" value="Actualizar Grado">
      </label></td>
    </tr>
  </table>
</form>
<?php
}
?>