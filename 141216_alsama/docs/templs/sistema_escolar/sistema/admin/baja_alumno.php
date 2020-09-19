<?php
/* Inicio Verificador de Login */
session_start();
if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
	header("Location: index.php");
}
/* Fin Verificador de Login */

include("conexion.php");
$registros=mysql_query("select * from alumno where nro_documento='$_POST[dni]'",$conexion);

if ($reg=mysql_fetch_array($registros))
{
  mysql_query("delete from alumno where nro_documento='$_POST[dni]'",$conexion);
  echo "<h3>El alumno fue dado de baja</h3>";
}
else
{
  echo "No existe un alumno con ese DNI";
  header('refresh 3; url=f_baja_alumno.php');
}
mysql_close($conexion);
?>
