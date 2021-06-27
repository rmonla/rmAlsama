<?php
require("validar.php");
require("conectar.php");

$usuario = $_SESSION["usuario"];
$sel_alum = "select * from periodo as h, carrera as a, grado as b, seccion as c, alumno as d, usuario as e, materia as f, nota as g
			 where h.cod_periodo = a.cod_periodo and a.cod_carrera = b.cod_carrera and b.cod_grado = c.cod_grado
			 and c.cod_seccion = d.cod_seccion and d.usuario = e.usuario and f.cod_materia = g.cod_materia
			 and d.cod_alumno = g.cod_alumno and e.usuario = '$usuario'";
$eje_alum = mysql_query($sel_alum);
$ver_alum = mysql_fetch_array($eje_alum);
?>
<style>
.centro{
	font-family:BATAVIA;
	text-align:center
}
.left{
	text-align:right;
	font-family:"Comic Sans MS";
}
.CNN {
	text-align: center;
}
.letra
{
	font-family:"Comic Sans MS";
	font:small;
}
</style>
<table width="700" border="0" align="center">
  <tr>
    <td width="93">&nbsp;</td>
    <td width="402">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class="left">Nombre:</td>
    <td><font face="Comic Sans MS" size="-1"><?php echo "<u>".$ver_alum["nombre_alum"]; echo " "; echo $ver_alum["apellido_alum"]."</u>";?></font></td>
    <td width="58" class="left">Periodo:</td>
    <td width="129"><font face="Comic Sans MS" size="-1"><?php echo "<u>".$ver_alum["nombre_periodo"]."</u>"; ?></font></td>
  </tr>
  <tr>
    <td class="left">Bachillerato:</td>
    <td><font face="Comic Sans MS" size="-1"><?php echo "<u>".$ver_alum["nombre_carrera"]."</u>"; ?></font></td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td class="left">Grado:</td>
    <td><font face="Comic Sans MS" size="-1"><?php echo "<u>".$ver_alum["nombre_grado"]."</u>"; ?></font></td>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>

<?php
require("conectar.php");
$cod_alum = $ver_alum["cod_alumno"];
$sel_mat = "select * from materia as a, nota as b, alumno as c
			where a.cod_materia = b.cod_materia and c.cod_alumno = b.cod_alumno and c.cod_alumno = $cod_alum";
$eje_mat = mysql_query($sel_mat);

?>
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="236" rowspan="2" class="CNN"><span class="centro">MATERIA</span></td>
    <td width="77" class="CNN"><span class="centro">NOTA 1</span></td>
    <td width="73" class="CNN"><span class="centro">NOTA 2</span></td>
    <td width="85" class="CNN"><span class="centro">NOTA 3</span></td>
    <td width="114" rowspan="2" class="CNN"><span class="centro">PROMEDIO FINAL</span></td>
    <td width="101" rowspan="2" class="CNN"><span class="centro">ESTADO</span></td>
  </tr>
  <tr class="centro">
    <td>35 %</td>
    <td>35%</td>
    <td>30%</td>
  </tr>
<?php
while($ver_mat = mysql_fetch_array($eje_mat))
{
	$nota1 = $ver_mat["nota_1"];
	$nota2 = $ver_mat["nota_2"];
	$nota3 = $ver_mat["nota_3"];
	$pro = $nota1 + $nota2 + $nota3;
	$promedio = $pro / 3;
?>
  <tr>
    <td><font face="Comic Sans MS" size="-1"><?php echo $ver_mat["nombre_materia"]; ?></font></td>
    <td align="center"><font face="Comic Sans MS" size="-1"><?php echo $ver_mat["nota_1"]; ?></font></td>
    <td align="center"><font face="Comic Sans MS" size="-1"><?php echo $ver_mat["nota_2"]; ?></font></td>
    <td align="center"><font face="Comic Sans MS" size="-1"><?php echo $ver_mat["nota_3"]; ?></font></td>
    <td align="center"><font face="Comic Sans MS" size="-1"><?php echo round($promedio,2); ?></td>
    <td align="center">
    <?php
	if($promedio <7)
		echo "<font face='Comic Sans MS' size='-1' color=red>Reprobado</font>";
	else
	echo "<font face='Comic Sans MS' size='-1' color=blue>Aprobado</font>";
    ?>
    </td>
  </tr>
 <?php
}
 ?> 
</table>
<p>&nbsp;</p>
