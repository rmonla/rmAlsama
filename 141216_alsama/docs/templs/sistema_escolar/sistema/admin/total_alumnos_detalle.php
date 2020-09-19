<?php
include("funciones.php");
nologin();
include("conexion.php");
$id_alumno=$_GET['id_alumno'];
$next=$id_alumno+1;
$previous=$id_alumno-1;

$comando="select * from alumno where id='$id_alumno'";
$registro=mysql_query($comando,$conexion);
echo "<table border=1 cellspacing=0 cellpadding=4 bordercolor='#oea8dc'><tr>";
if($alumno=mysql_fetch_array($registro)){
	echo "<td>Nombre:</td><td>".$alumno['nombre']."</td>";
	echo "</tr><tr><td>Apellido:</td><td>".$alumno['apellido']."</td>";
	echo "</tr><tr><td>DNI:</td><td>".$alumno['nro_documento']."</td>";
	echo "</tr><tr><td>Direccion:</td><td>".$alumno['direccion'].", ".$alumno['ciudad']."</td>";
	echo "</tr><tr><td>Email y Telefono:</td><td>".$alumno['email']."/".$alumno['telefono']."</td>";
	echo "</tr><tr><td>Curso:</td><td>".$alumno['nro_curso']." de ".$alumno['especialidad'];
}
else{
	echo " <h3> Registro Vacio </h3> ";
}
echo "</tr></table>";
echo "<a href='total_alumnos_detalle.php?id_alumno=1'> << Primero </a>";
echo "<a href='total_alumnos_detalle.php?id_alumno=".$previous."'> < Anterior </a>";
echo "<a href='total_alumnos_detalle.php?id_alumno=".$next."'> Siguiente > </a>";
echo "<a href='#'> Ultimo >></a>";

mysql_close($conexion);
?>
