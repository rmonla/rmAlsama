<?php
	include("conexion.php");
	include("funciones.php");
	nologin();

$dni=$_POST['dni'];
$registros=mysql_query("select * from docente where nro_documento='$dni'",$conexion);

if ($reg=mysql_fetch_array($registros))
{
  echo "<form action='baja_docente.php' method='post'>";
  echo "Esta seguro que desea eliminar a: <br>";
  echo "<b>".$reg['nombre']." ".$reg['apellido'];
  echo "</b><br>DNI: <input type=text name='dni' value='$dni'>";
  echo "<br>del sistema?";
  echo "<input type='submit' value='SI'> ";
  echo " <a href='f_baja_docente.php'>NO</a>";
  echo "</form>";
}
else
{
  echo "No existe un docente con ese DNI";
  header('refresh 3; url=f_baja_docente.php');
}
mysql_close($conexion);
?>
</body>
