<?php
include("funciones.php");
nologin();
include("conexion.php");

$registros=mysql_query("select * from alumno where nro_curso='$_POST[curso]'",$conexion);
while($alumno=mysql_fetch_array($registros)){
		echo "<br>";
echo "<a href='subidas_alumno.php?nom_alumno=".$alumno['nombre']."&ape_alumno=".$alumno['apellido']."&dir_alumno=uploads/".$alumno['nro_curso']."/".$alumno['nro_documento']."'><img src='../net/uploads/".$alumno['nro_curso']."/".$alumno['nro_documento']."/img_perfil/perfil.gif' height=40px width=40px>".$alumno['nombre']." ".$alumno['apellido']."</a>";
}
mysql_close($conexion);

?>
