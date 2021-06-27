<?php
require("conectar.php");

$upda = "update periodo set estado_periodo='Inactivo' where estado_periodo='Activo'";
if(mysql_query($upda))
{
	header("location: ver_periodo.php");
	exit;
}
else
{
	echo mysql_error();
}

?>