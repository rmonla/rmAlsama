<?php
require("conectar.php");
$sel_per = "select * from periodo";
  $eje_per = mysql_query($sel_per);
  $con_per = mysql_num_rows($eje_per);
  $ver_per = mysql_fetch_array($eje_per);
  
  if($ver_per["estado_periodo"] == "Activo")
  {


require("conectar.php");

$sel_doc = "select * from docente order by cod_docente";
$eje_doc = mysql_query($sel_doc);
$con_doc = mysql_num_rows($eje_doc);
?>
<style type="text/css">
<!--
.LETRA {
	font-family: BATAVIA;
	text-align: center;
}
.letras
{
	text-align:center;
	font-family:"Comic Sans MS";
	font-size:14px;
}
-->
</style>
<table width="700" border="1" cellpadding="0" cellspacing="0" align="center" bordercolor="#000000">
  <tr class="LETRA">
    <td bgcolor="#0099CC">NOMBRE COMPLETO</td>
    <td bgcolor="#0099CC">DIRECCION</td>
    <td bgcolor="#0099CC">TELEFONO</td>
    <td bgcolor="#0099CC">ACCIONES</td>
  </tr>
<?php
if($con_doc >0)
{
	while($ver_doc = mysql_fetch_array($eje_doc))
	{
?>
  <tr>
    <td>
    	<font face="Comic Sans MS" size="-1"><?php echo $ver_doc["nombre_doc"]." ".$ver_doc["apellido_doc"]; ?></font>
    </td>
    <td>
    	<font face="Comic Sans MS" size="-1"><?php echo $ver_doc["direccion_doc"]; ?></font>
    </td>
    <td>
    	<font face="Comic Sans MS" size="-1"><?php echo $ver_doc["telefono_doc"]; ?></font>
    </td>
    <td>
    	<a href="agre_mat_docente.php?codigo=<?php echo $_GET["codigo"]; ?>&cod_doc=<?php echo $ver_doc["cod_docente"]; ?>" class="letras" onclick="return confirm('Desea Agregar esta Materia a Este Profesor')">[Agregar Materia]
    	</a>
    </td>
  </tr>
<?php
	}
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