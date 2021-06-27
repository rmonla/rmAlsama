<?php
include("funciones.php");
nologin();
include("conexion.php");

$registros=mysql_query("select * from alumno where nro_curso='$_POST[curso]'",$conexion);
while($alumno=mysql_fetch_array($registros)){
	echo "<a href='subidas_alumno.php?nom_alumno=".$alumno['nombre']."&ape_alumno=".$alumno['apellido']."&dir_alumno=uploads/".$alumno['nro_curso']."/".$alumno['nro_documento']."'>".$alumno['nombre']." ".$alumno['apellido']."</a><br>";
}
mysql_close($conexion);

?>
