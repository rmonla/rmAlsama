<?php
require("validar.php");
require("conectar.php");

$niv = $_SESSION["nivel"];

switch($niv)
{
case '0':
header("location: index_admin.php");
exit;
break;

case '3':
header("location: index_alumno.php");
exit;
break;

case '5':
header("location: index_docente.php");
exit;
}
?>