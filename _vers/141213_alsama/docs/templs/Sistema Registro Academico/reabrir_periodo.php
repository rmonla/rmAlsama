<?php
require("validar.php");
require("conectar.php");

$sel_per = "update periodo set estado_periodo = 'Activo'";

if(mysql_query($sel_per))
{
	header("location: ver_periodo.php");
	exit;
}
else
{
	echo mysql_error();
}

?>