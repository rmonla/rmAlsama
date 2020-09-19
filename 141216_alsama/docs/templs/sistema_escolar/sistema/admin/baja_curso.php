<?php
include("funciones.php");
nologin();
include("conexion.php");

$id_curso=$_REQUEST['curso_del'];
$select="select * from curso where id_curso='$id_curso'";
$registros=mysql_query($select,$conexion);
if ($curso=mysql_fetch_array($registros))
{
	mysql_query("delete from curso where id_curso='$id_curso'",$conexion);
	header("Location: f_baja_curso.php");
}
?>
