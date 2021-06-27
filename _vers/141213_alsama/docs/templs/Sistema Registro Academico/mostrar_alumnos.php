<?php
$materia = $_GET["materia"];
$seccion = $_GET["seccion"];
/*
if(isset($_POST["agregarr"]))
{
$nota1 	 = $_POST["nota1"];
$nota2 	 = $_POST["nota2"];
$nota3 	 = $_POST["nota3"];
$cod_alumno = $_POST["cod_alumno"];

header("location: agregar_notas.php?materia=$materia&nota1=$nota1&nota2=$nota2&nota3=$nota3&cod_alumno=$cod_alumno");
exit;
}
else
{
	echo mysql_error();
}
*/
?>

<style type="text/css">
<!--
.letra {
	text-align: center;
	font-family: BATAVIA;
}
-->
</style>

  <table width="700" border="1" align="center" cellspacing="0" cellpadding="0" bordercolor="#000000">
    <tr class="BATAVIA">
      <td width="330" rowspan="2" bgcolor="#0099CC" class="letra"><span class="letra">NOMBRE COMPLETO</span></td>
      <td bgcolor="#0099CC" class="letra"><span class="letra">NOTA 1</span></td>
      <td bgcolor="#0099CC" class="letra"><span class="letra">NOTA 2</span></td>
      <td bgcolor="#0099CC" class="letra"><span class="letra">NOTA 3</span></td>
      <td rowspan="2" bgcolor="#0099CC" class="letra">&nbsp;</td>
    </tr>
    <tr class="BATAVIA">
      <td bgcolor="#0099CC" class="letra"><span class="letra">35%</span></td>
      <td bgcolor="#0099CC" class="letra"><span class="letra">35%</span></td>
      <td bgcolor="#0099CC" class="letra"><span class="letra">30%</span></td>
    </tr>
    <?php
require("conectar.php");


$_pagi_sql = "select * from carrera as a, grado as b, seccion as c, alumno as d, usuario as e, responsable as f
			 where a.cod_carrera = b.cod_carrera and b.cod_grado = c.cod_grado and c.cod_seccion = d.cod_seccion
			 and d.cod_alumno = f.cod_alumno and e.usuario = d.usuario and d.cod_seccion=$seccion";

$_pagi_cuantos = 6;
require("paginator.inc.php");
$eje_alum = mysql_query($_pagi_sql);

$con_alum = mysql_num_rows($eje_alum);
if($con_alum>0)
{
	while($ver_alum = mysql_fetch_array($_pagi_result))
	{
?>
<form id="form1" name="form1" method="post" action="agregar_notas.php">
    <tr>
      <td><font face="Comic Sans MS" size="-1"><?php echo $ver_alum["nombre_alum"]." ". $ver_alum["apellido_alum"]; ?></font></td>
      <td width="96" class="BATAVIA" align="center">

        <input type="hidden" name="cod_alumno" value="<?php echo $ver_alum["cod_alumno"]; ?>"/>
        <input type="hidden" name="cod_materia" value="<?php echo $materia; ?>"/>
        <input name="nota1" type="text" id="nota1" value="1" size="4" maxlength="4"/>
      </td>
      <td width="78" class="BATAVIA" align="center">
        <input name="nota2" type="text" id="nota2" value="1" size="4" maxlength="4" />
      </td>
      <td width="84" class="BATAVIA" align="center">
        <input name="nota3" type="text" id="nota3" value="1" size="4" maxlength="4" />
      </td>
      <td width="100" class="BATAVIA" align="center">
      <input type="submit" name="agregarr" id="agregarr" value="Agregar Notas" /></td>
    </tr>
</form>
    <?php
	}
}
else
{
 ?>
    
    <tr>
      <td colspan="5" class="letra"><font color="#FF0000">La Consulta no Ha Generado Resultados.</font></td>
    </tr>
    <tr>
      <td colspan="5" class="letra"><font color="#FF0000"><a href="ver_alumno2.php">[Regresar]</a></font></td>
    </tr>
    <?php
}
 ?>
 <tr>
      <td colspan="5" align="center"><?php echo $_pagi_navegacion ?></td>
    </tr>
  </table>

