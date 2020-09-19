<?php
require("validar.php");
require("conectar.php");

$codigo = $_GET["codigo"];

$del = "delete from alumno where cod_alumno = $codigo";

if(mysql_query($del))
{
	header("location: ver_alumno.php");
	exit;
}
else
{
	echo mysql_error();
}
?>