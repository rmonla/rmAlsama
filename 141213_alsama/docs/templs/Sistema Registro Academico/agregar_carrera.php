<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
	$cod_periodo = $ver_per['cod_periodo'];
  if($ver_per["estado_periodo"] == "Activo")
  {

if(isset($_POST["agregar"]))
{
$carrera = $_POST["carrera"];

require("conectar.php");
$inser = "insert into carrera (nombre_carrera, cod_periodo) values('$carrera', '$cod_periodo')";
//var_dump($inser);
if(mysql_query($inser))
	{
		header("location: ver_carrera.php");
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
.a {
	text-align: right;
}
.a {
	font-family: "Comic Sans MS";
}
.asi {
	text-align: center;
	font-family: "Comic Sans MS";
	font-size: 24px;
}
-->
</style>
<form name="form1" method="post" action="">
  <table width="607" border="0" align="center">
    <tr>
      <td width="290">&nbsp;</td>
      <td width="300">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" bgcolor="#0099CC" class="asi">Agregar Carrera</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="a">Nombre de la Carrera:</td>
      <td><label>
        <textarea name="carrera" id="carrera" cols="45" rows="3"></textarea>
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="asi"><label>
        <input type="submit" name="agregar" id="agregar" value="Agregar Carrera">
      </label></td>
    </tr>
  </table>
</form>
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