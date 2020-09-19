<?php
include("funciones.php");
nologin();

$id_docente=$_GET['id'];
include("conexion.php");

$registros=mysql_query("select * from docente where id='$id_docente'",$conexion);

echo "<h3><img src='img/grafico.gif'><img src='img/curso.gif'><a href='total_docentes.php'>Volver</a></h3>";

echo "<table align='center' border='1' cellspacing=0 cellpadding=4 bordercolor='#oea8dc'>";
echo "<tr>";
echo "<td><b>ID</b></td><td><b>NOMBRE</b></td><td><b>APELLIDO</b></td><td><b>FECHA NAC</b></td><td><b>DIRECCION</b></td><td><b>CIUDAD</b></td><td><b>DNI</b></td><td><b>EMAIL</b></td><td><b>TEL</b></td>";
echo "</tr>";
while ($docente=mysql_fetch_array($registros))
{
  echo "<tr>";
  echo "<td>".$docente['id']."</td>"."<td>".$docente['nombre']."</td>"."<td>".$docente['apellido']."</td>"."<td>".$docente['fecha_nacimiento']."</td><td>".$docente['direccion']."</td><td>".$docente['ciudad']."</td><td>".$docente['nro_documento']."</td><td>".$docente['email']."</td><td>".$docente['telefono']."</td>";
  echo "</tr>";
}
echo "</table>";
mysql_close($conexion);

?>
