<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {


require("conectar.php");

$_pagi_sql = "select * from carrera as a, grado as b, seccion as c
				where a.cod_carrera = b.cod_carrera and
				b.cod_grado = c.cod_grado";
$_pagi_cuantos = 6;
require("paginator.inc.php");
//$eje_seccion = mysql_query($sel_seccion);

?>
<style type="text/css">
<!--
.BATAVIA {
	font-family: BATAVIA;
	text-align: center;
}
.centerd {
	text-align: center;
}
.comics {
	font-family: "Comic Sans MS";
	font-size: 14px;
}
-->
</style>
<table width="700" border="1" align="center" cellspacing="0" cellpadding="0" bordercolor="#000000">

  <tr class="BATAVIA">
    <td bgcolor="#0099CC">SECCION</td>
    <td bgcolor="#0099CC">GRADO</td>
    <td bgcolor="#0099CC">CARRERA</td>
    <td colspan="2" bgcolor="#0099CC">ACCIONES</td>
  </tr>
<?php
while($ver_seccion = mysql_fetch_array($_pagi_result))
{
?>  
  <tr class="comics">
    <td align="center"><?php echo $ver_seccion["nombre_seccion"]; ?></td>
    <td align="left"><?php echo $ver_seccion["nombre_grado"]; ?></td>
    <td align="left"><?php echo $ver_seccion["nombre_carrera"]; ?></td>
    <td width="50" class="centerd"><a href="editar_seccion.php?codigo=<?php echo $ver_seccion["cod_seccion"];?>"><img src="iconos/edi.png" width="30" height="30" border="0"></a></td>
    <td width="52" class="centerd"><a href="eliminar_seccion.php?codigo=<?php echo $ver_seccion["cod_seccion"]; ?>" onclick="return confirm('Desea Eliminar esta Seccion')"><img src="iconos/eliminar.png" width="30" height="30" border="0"></a></td>
  </tr>
  
<?php
}
?>
<tr class="comics">
    <td colspan="5" align="center"><?php echo $_pagi_navegacion ?></td>
  </tr>
</table>
<?php
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