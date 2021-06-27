<?php

require("conectar.php");

$sel_per = "select * from periodo";
$eje_per = mysql_query($sel_per);
$ver_per = mysql_fetch_array($eje_per);

if($ver_per["estado_periodo"]=="Activo")
{
?>
<script>
alert('Tiene Un Periodo Abierto, Cierrelo');
</script>
<?php
}
else
{
if(isset($_POST["agregar"]))
{
$nombre 	= $_POST["nombre"];
$duracion	= $_POST["duracion"];
$estado		= $_POST["estado"];



$inser = "insert into periodo values(NULL,'$nombre','$duracion','$estado')";

if(mysql_query($inser))
{
	header("location: index.php");
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
<style>
.centro
{
	font-family:BATAVIA;
	text-align:center;
}

.left
{
	font-family:"Comic Sans MS";
	text-align:right;
}
.otra
{
	font-family:"Comic Sans MS";
	font-size:24px;
	text-align:center;
}
</style>
<form name="form1" method="post" action="">
  <table width="700" border="0" align="center">
    <tr>
      <td width="345">&nbsp;</td>
      <td width="345">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="otra">Agregar Periodo</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left">Nombre del Periodo:</td>
      <td><label>
        <input type="text" name="nombre" id="nombre">
      </label></td>
    </tr>
    <tr>
      <td class="left">Duracion:</td>
      <td><label>
        <input name="duracion" type="text" id="duracion" size="40">
      </label></td>
    </tr>
    <tr>
      <td class="left">Estado:</td>
      <td><label>
        <select name="estado" id="estado">
          <option value="Activo">Activo</option>
          <option value="Inactivo">Inactivo</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="centro"><label>
        <input type="submit" name="agregar" id="agregar" value="Agregar Periodo">
      </label></td>
    </tr>
  </table>
</form>
<?php
}
}
?>