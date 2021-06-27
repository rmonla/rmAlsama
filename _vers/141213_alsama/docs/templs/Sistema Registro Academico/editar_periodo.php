<?php

require("conectar.php");
/*
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
{*/
if(isset($_POST["agregar"]))
{
$nombre 	= $_POST["nombre"];
$duracion	= $_POST["duracion"];
$codigo		= $_GET["codigo"];

$inser = "update periodo set
		  nombre_periodo = '$nombre',
		  duracion	     = '$duracion'
		  where cod_periodo = $codigo";

if(mysql_query($inser))
{
	header("location: ver_periodo.php");
	exit;
}
else
{
	echo mysql_error();
}
}
else
{
$codigo = $_GET["codigo"];
$sel_peri = "select * from periodo where cod_periodo = $codigo";
$eje_peri = mysql_query($sel_peri);
$ver_peri = mysql_fetch_array($eje_peri);
?>
<style>
.centro
{
	font-family:"Comic Sans MS";
	text-align:left;
	font-size:16px;
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
      <td colspan="2" bgcolor="#0099CC" class="otra">Actualizar Periodo</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="left">Nombre del Periodo:</td>
      <td><label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $ver_peri["nombre_periodo"]; ?>">
      </label></td>
    </tr>
    <tr>
      <td class="left">Duracion:</td>
      <td><label>
        <input name="duracion" type="text" id="duracion" size="40" value="<?php echo $ver_peri["duracion"]; ?>">
      </label></td>
    </tr>
    <tr>
      <td class="left">Estado:</td>
      <td class="centro"><?php echo $ver_peri["estado_periodo"]; ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="otra"><label>
        <input type="submit" name="agregar" id="agregar" value="Actualizar Periodo">
      </label></td>
    </tr>
  </table>
</form>
<?php
}
//}
?>