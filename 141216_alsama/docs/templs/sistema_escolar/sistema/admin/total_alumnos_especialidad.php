<?php
include("funciones.php");
nologin();
include("conexion.php");
$especialidad=$_POST['especialidad'];
$total=0;
$registros=mysql_query("select nombre,apellido,nro_documento,id from alumno where especialidad='$especialidad'",$conexion);
echo "<table align='center' border='1' cellspacing=0 cellpadding=4 bordercolor='#oea8dc'><tr><td>NOMBRE:</td><td>APELLIDO:</td><td>DNI:</td></tr>";
while($alumno=mysql_fetch_array($registros)){
	$total=$total+1;
	echo "<tr><td>".$alumno['nombre']."</td><td>".$alumno['apellido']."</td><td>".$alumno['nro_documento']." "."<a href='total_alumnos_detalle.php?id_alumno=".$alumno['id']."'>Ver Detalles</a></td></tr>";
}
echo "</table> <hr> Total de Alumnos en ".$especialidad.":".$total;
?>
