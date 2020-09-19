<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {


require("conectar.php");

$sel_car = "select * from carrera order by cod_carrera";

$eje_car = mysql_query($sel_car);

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
    <td bgcolor="#0099CC">NOMBRE DE LA CARRERA</td>
    <td colspan="2" bgcolor="#0099CC">ACCIONES</td>
  </tr>
<?php
while($ver_car = mysql_fetch_array($eje_car))
{
?>  
  <tr class="comics">
    <td align="left">
    	<?php echo $ver_car["nombre_carrera"]; ?>
    </td>
    <td width="30" class="centerd">
    	<a href="editar_carrera.php?codigo=<?php echo $ver_car["cod_carrera"];?>">
    		<img src="iconos/edi.png" width="30" height="30" border="0">
    	</a>
    </td>
    <td width="30" class="centerd">
    	<a href="eliminar_carrera.php?codigo=<?php echo $ver_car["cod_carrera"]; ?>" onclick="return confirm('Desea Eliminar esta Seccion')">
    		<img src="iconos/eliminar.png" width="30" height="30" border="0">
    	</a>
    </td>
  </tr>
<?php
}
?>
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