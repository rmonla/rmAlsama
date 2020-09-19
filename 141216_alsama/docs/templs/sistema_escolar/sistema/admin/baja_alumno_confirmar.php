<?php
/* Inicio Verificador de Login */
session_start();
if(empty($_SESSION['usuario']) && empty($_SESSION['clave'])){
	header("Location: index.php");
}
/* Fin Verificador de Login */

include("conexion.php");
$dni=$_POST['dni'];
$registros=mysql_query("select * from alumno where nro_documento='$dni'",$conexion);

if ($reg=mysql_fetch_array($registros))
{
  echo "<form action='baja_alumno.php' method='post'>";
  echo "Esta seguro que desea eliminar a: <br>";
  echo "<b>".$reg['nombre']." ".$reg['apellido'];
  echo "</b><br>DNI: <input type=text name='dni' value='$dni'>";
  echo "<br>del sistema?";
  echo "<input type='submit' value='SI'> ";
  echo " <a href='f_baja_alumno.php'>NO</a>";
  echo "</form>";
}
else
{
  echo "No existe un alumno con ese DNI";
  header('refresh 3; url=f_baja_alumno.php');
}
mysql_close($conexion);
?>
</body>
