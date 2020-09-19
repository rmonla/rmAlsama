<?php
include("funciones.php");
nologin();

$nro_curso=$_GET['nroc'];
include("conexion.php");

echo "<h3><img src='img/grafico.gif'><img src='img/curso.gif'><a href='total_cursos.php'>Volver</a></h3>";
///////////////////////////////////////
$registros=mysql_query("select id_preceptor from curso where curso='$nro_curso'",$conexion);
if($curso=mysql_fetch_array($registros))
{
	$id_preceptor=$curso['id_preceptor'];
}
///////////////////////////////////////
$registros=mysql_query("select * from docente where id='$id_preceptor'",$conexion);

echo "<table align='center' border='1' cellspacing=0 cellpadding=4 bordercolor='#oea8dc'>";
echo "<tr>";
echo "<td><b>ID</b></td><td><b>NOMBRE</b></td><td><b>APELLIDO</b></td><td><b>FECHA NAC</b></td><td><b>DIRECCION</b></td><td><b>CIUDAD</b></td><td><b>DNI</b></td><td><b>EMAIL</b></td><td><b>TEL</b></td>";
echo "</tr>";
if($docente=mysql_fetch_array($registros))
{
  echo "<tr>";
  echo "<td>".$docente['id']."</td>"."<td>".$docente['nombre']."</td>"."<td>".$docente['apellido']."</td>"."<td>".$docente['fecha_nacimiento']."</td><td>".$docente['direccion']."</td><td>".$docente['ciudad']."</td><td>".$docente['nro_documento']."</td><td>".$docente['email']."</td><td>".$docente['telefono']."</td>";

  echo "</tr>";
}
echo "</table>";
echo "<br>";
$nro_curso=$_GET['nroc'];
///////////////////////////////////////
$reg=mysql_query("select * from alumno where nro_curso='$nro_curso'",$conexion);
$total_alumnos=0;
echo "<table align='center' border='1' cellspacing=0 cellpadding=4 bordercolor='#oea8dc'>";
echo "<tr>";
echo "<td><b>ID</b></td><td><b>NOMBRE</b></td><td><b>APELLIDO</b></td><td><b>FECHA NAC</b></td><td><b>DIRECCION</b></td><td><b>CIUDAD</b></td><td><b>DNI</b></td><td><b>SEXO</b></td><td><b>EMAIL</b></td><td><b>ESPECIALIDAD</b></td><td><b>CURSO</b></td>";
echo "</tr>";
while ($alumno=mysql_fetch_array($reg))
{
  $total_alumnos=$total_alumnos+1;
  echo "<tr>";
  echo "<td>".$alumno['id']."</td>"."<td>".$alumno['nombre']."</td>"."<td>".$alumno['apellido']."</td>"."<td>".$alumno['fecha_nacimiento']."</td>"."<td>".$alumno['direccion']."</td>"."<td>".$alumno['ciudad']."</td>"."<td>".$alumno['nro_documento']."</td>"."<td>".$alumno['sexo']."</td>"."<td>".$alumno['email']."</td>"."<td>".$alumno['especialidad']."</td>"."<td>".$alumno['nro_curso']."</td>";
  echo "</tr>";
}
echo "</table>";
echo "<hr>Total Alumnos: ".$total_alumnos;
mysql_close($conexion);
//////////////////////////////////////
?>
