<?php
include("conexion_config.php");
$conexion=mysql_connect("$host","$user","$pass");
mysql_select_db("$db",$conexion);
?>
