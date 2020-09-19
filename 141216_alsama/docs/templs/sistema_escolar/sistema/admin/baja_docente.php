<?php
	include("conexion.php");
	include("funciones.php");
	nologin();
$registros=mysql_query("select * from docente where nro_documento='$_POST[dni]'",$conexion);

if ($reg=mysql_fetch_array($registros))
{
  mysql_query("delete from docente where nro_documento='$_POST[dni]'",$conexion);
  echo "<h3>El docente fue dado de baja</h3>";
}
else
{
  echo "No existe un docente con ese DNI";
  header('refresh 3; url=f_baja_docente.php');
}
mysql_close($conexion);
?>
