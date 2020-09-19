<?php
include("funciones.php");
nologin();

include("conexion.php");

$select="select nombre,apellido,nro_documento,id from docente";
$registro=mysql_query($select,$conexion);
echo "<h2><img src='img/grafico.gif'> <img src='img/p1.gif' width='48px' height='48px'> Total Docentes</h2>";  

$total=0;
while ($docente=mysql_fetch_array($registro))
{
	$total=$total+1;
	echo "<a href='total_docentes_detalle.php?id=".$docente['id']."'>";
	echo $docente['nombre']." ".$docente['apellido']." ".$docente['nro_documento']."</a><br>";
}
	echo "<hr>";
	echo "Total: ".$total;
mysql_close($conexion);

?>
