<?php
/*
	el fichero conexion.php realiza
	la conexion a la base de datos con los parametros
	ingresados en conexion_config.php
*/
include("conexion_config.php");
$conexion=mysql_connect("$host","$user","$pass");
mysql_select_db("$db",$conexion);
?>
