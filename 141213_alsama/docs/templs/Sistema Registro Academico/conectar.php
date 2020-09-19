<?php
/*
$servidor 	= "server35.000webhost.com";
$usuarios	= "a4422244";
$passwords	= "denny2010";
$database	= "a4422244_nahum";
*/
$servidor 	= "localhost";
$usuarios	= "root";
$passwords	= "";
$database	= "registro";

mysql_connect($servidor,$usuarios,$passwords);
mysql_select_db($database);
?>