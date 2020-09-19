<?php
include("funciones.php");
nologin();
include("conexion.php");
if($_POST['clave1'] != $_POST['clave2']){
	echo "Las claves no coinciden";
}else{
	$registros=mysql_query("update docente set nro_rand='$_REQUEST[clave2]' where nro_rand='$_REQUEST[clave_actual]'",$conexion);
	echo "Clave Cambiada";
}
?>
