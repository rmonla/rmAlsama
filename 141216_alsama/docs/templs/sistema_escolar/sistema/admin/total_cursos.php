<?php
include("funciones.php");
nologin();

include("conexion.php");

$select="select id_curso,curso,especialidad,id_preceptor from curso";
$registro=mysql_query($select,$conexion);
echo "<h2><img src='img/grafico.gif'> <img src='img/curso.gif' width='48px' height='48px'> Total Cursos</h2>";  

$total=0;
while ($curso=mysql_fetch_array($registro))
{
	$total=$total+1;
	echo "<a href='total_cursos_detalle.php?nroc=".$curso['curso']."'>";
	echo $curso['curso']." ".$curso['especialidad']."</a><br>";
}
	echo "<hr>";
	echo "Total: ".$total;
mysql_close($conexion);

?>
