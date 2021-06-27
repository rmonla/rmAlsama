<?php
require("validar.php");
require("conectar.php");

$codigo = $_GET["codigo"];

$del = "delete from grado where cod_grado = $codigo";

if(mysql_query($del))
{
	header("location: ver_grado.php");
	exit;
}
else
{
	echo mysql_error();
}
?>